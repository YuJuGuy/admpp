<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\IOFactory;
use CodeIgniter\Controller;

class Quote extends BaseController
{
    public function index(): string
    {
        $spreadsheetPath = FCPATH . '/static/reviews.xlsx';

        if (!file_exists($spreadsheetPath)) {
            log_message('error', 'File not found: ' . $spreadsheetPath);
            return view('pagetemplates/header')
                . view('quote/index', ['reviews' => []]) // Provide empty reviews if file is not found
                . view('pagetemplates/footer');
        }

        try {
            // Load the Excel file
            $spreadsheet = IOFactory::load($spreadsheetPath);
            $sheet = $spreadsheet->getActiveSheet();
            $data = $sheet->toArray();

            // Parse the data into an array of reviews
            $reviews = [];
            foreach ($data as $index => $row) {
                // Skip the header row (assuming the first row is the header)
                if ($index === 0) continue;

                $reviews[] = [
                    'author_title' => $row[0],
                    'review_rating' => (int)$row[1],
                    'review_text' => $row[2],
                    'author_image' => $row[3],  // Assuming this is the URL
                ];
            }
        } catch (\Exception $e) {
            log_message('error', 'Error loading or parsing the Excel file: ' . $e->getMessage());
            $reviews = []; // Provide empty reviews in case of an error
        }

        // Pass the reviews data to the view
        return view('pagetemplates/header')
            . view('quote/index', ['reviews' => $reviews])
            . view('pagetemplates/footer');
    }

    public function submit()
    {
        helper(['form', 'url']);
    
        $validation = \Config\Services::validation();
    
        // Define your validation rules
        $validation->setRules([
            'brand_client' => 'required',
            'product' => 'required',
            'number' => 'required', // Validate phone number format
        ]);
    
        // Validate the form input
        if ($validation->withRequest($this->request)->run() == FALSE) {
            // If validation fails, return the errors as JSON
            return $this->response->setJSON([
                'status' => 'error',
                'errors' => $validation->getErrors()
            ]);
        } else {
            // Get all form data as an associative array
            $formData = $this->request->getPost();
    
            // Initialize variables for the file
            $fileLink = '';
            $fileName = '';
            $mimeType = '';
            $filePath = '';
    
            // Handle file upload
            if ($file = $this->request->getFile('product_image')) {
                if ($file->isValid() && !$file->hasMoved()) {
                    $newName = $file->getRandomName();
            
                    // Get the MIME type
                    $mimeType = $file->getMimeType();
            
                    // Get the file content as base64
                    $imageData = file_get_contents($file->getTempName());
                    $base64Image = base64_encode($imageData);  // Convert the image content to base64
                    
                    $fileName = $file->getName();  // Original filename
                }
            }
            
            // Prepare the message content dynamically (without the file link)
            $text = "*طلب عرض سعر جديد*\n";
            
            // Iterate over the form data to construct the message
            foreach ($formData as $key => $value) {
                $text .= "*" . ucfirst(str_replace('_', ' ', $key)) . ":* $value\n";
            }
            
            // Prepare data for POST request
            $chatId = '120363296639205911@g.us';
            
            try {
                $client = \Config\Services::curlrequest();
                
                if (isset($base64Image)) {
                    // Prepare the postData for the base64 image API request
                    $postData = [
                        "chatId" => $chatId,
                        "file" => [
                            "mimetype" => $mimeType, // MIME type retrieved from the uploaded file
                            "filename" => $fileName, // Original file name
                            "data" => $base64Image   // Base64 encoded image data
                        ],
                        "caption" => $text,
                        "session" => "default"
                    ];
            
                    // Send the image with the caption via the API
                    $response = $client->post('http://localhost:3000/api/sendImage', [
                        'headers' => [
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json'
                        ],
                        'json' => $postData
                    ]);
            
                    // Log the response for debugging purposes
                    log_message('debug', 'Curl response: ' . $response->getBody());
                    log_message('debug', 'Curl status: ' . $response->getStatusCode());
                
                } else {
                    // If no file, use the sendText API
                    $postData = [
                        "chatId" => $chatId,
                        "text" => $text,
                        "session" => "default"
                    ];
    
                    // Send the text message
                    $response = $client->post('http://localhost:3000/api/sendText', [
                        'headers' => [
                            'Content-Type' => 'application/json',
                            'Accept' => 'application/json'
                        ],
                        'json' => $postData
                    ]);
                }
    
                // Handle the response from the API
                if ($response->getStatusCode() == 200 || $response->getStatusCode() == 201) {
                    return $this->response->setJSON([
                        'status' => 'success',
                        'message' => 'تم إرسال طلب عرض السعر بنجاح!'
                    ]);
                } else {
                    log_message('error', 'API Response Error: ' . $response->getBody());
                    return $this->response->setJSON([
                        'status' => 'error',
                        'message' => 'حدث خطأ أثناء إرسال الطلب. حاول مرة أخرى.'
                    ]);
                }
            } catch (\Exception $e) {
                log_message('error', 'Exception caught: ' . $e->getMessage());
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'حدث خطأ غير متوقع. حاول مرة أخرى.'
                ]);
            }
        }
    }
}    
