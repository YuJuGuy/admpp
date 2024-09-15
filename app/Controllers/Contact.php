<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;

class Contact extends BaseController
{
    public function index()
    {
        $data['title'] = 'Contact Us';

        return view('pagetemplates/header', $data)
            . view('contact/index')
            . view('pagetemplates/footer');
    }

    public function submit()
    {
        helper(['form', 'url']);
        
        $validation = \Config\Services::validation();

        $validation->setRules([
            'name' => 'required',
            'message' => 'required',
            'contact_method' => 'required',
            'contact_info' => 'required'
        ]);

        if ($validation->withRequest($this->request)->run() == FALSE) {
            return view('pagetemplates/header', ['title' => 'Contact Us'])
                . view('contact/index', ['validation' => $validation])
                . view('pagetemplates/footer');
        } else {
            $name = $this->request->getPost('name');
            $message = $this->request->getPost('message');
            $contact_method = $this->request->getPost('contact_method');
            $contact_info = $this->request->getPost('contact_info');
            $data = ['title' => 'Contact Us'];

            if ($contact_method == 'whatsapp') {
                // Prepare data for POST request
                $chatId = '120363296639205911@g.us';
                $text = 
                
                "وصلتك رسالة من 
                *$name*

                صاحب الرقم 
                $contact_info

                الرسالة 
                *$message*


                عميل جديد محتمل 😉🤑
                عجل بالرد عشان ما يروح عليك العميل
                ";



                $postData = [
                    "chatId" => $chatId,
                    "text" => $text,
                    "session" => "default"
                ];

                // Send POST request to custom API
                $client = \Config\Services::curlrequest();
                $response = $client->post('http://localhost:3000/api/sendText', [
                    'headers' => [
                        'Content-Type' => 'application/json',
                        'Accept' => 'application/json'
                    ],
                    'json' => $postData
                ]);

                if ($response->getStatusCode() == 200 || $response->getStatusCode() == 201) {
                    $data['success'] = "Thank you for contacting us via WhatsApp!";
                } else {
                    $data['error'] = "There was an error submitting your request. Please try again.";
                }
            } else if ($contact_method == 'email') {

                $messagetosend = 
                "وصلتك رسالة من 
                *$name*

                صاحب الايميل 
                $contact_info

                الرسالة 
                *$message*

                عميل جديد محتمل 😉🤑
                عجل بالرد عشان ما يروح عليك العميل
                ";
            
                // Get the email service instance
                $emailService = \Config\Services::email();
            
                // Get the configured "from" email and name from the email config
                $fromEmail = config('Email')->fromEmail;
                $fromName = config('Email')->fromName;
            
                // Set the sender's email and name from the configuration
                $emailService->setFrom($fromEmail, $fromName);
            
                // Set the recipient (retrieved from the configuration, not overwriting the service)
                $recipients = config('Email')->recipients;
                $emailService->setTo($recipients); // Use setTo() to set the recipients
            
                // Set the subject and message for the email
                $emailService->setSubject('Contact Us Form Submission');
                $emailService->setMessage($messagetosend);
            
                // Send the email and check the result
                if ($emailService->send()) {
                    $data['success'] = "Thank you for contacting us via Email!";
                } else {
                    // Get the error message from the debugger and display it
                    $data['error'] = "There was an error sending your email. Please try again.";
                    log_message('error', 'Email sending failed: ' . $emailService->printDebugger()); // Log the error for debugging purposes
                }
            }

            return view('pagetemplates/header', ['title' => 'Contact Us'])
                . view('contact/index', $data)
                . view('pagetemplates/footer');
        }
    }
}
?>
