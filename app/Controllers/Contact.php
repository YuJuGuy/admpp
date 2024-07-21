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
                    "session" => "Madhi"
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
                // Send email
                $emailService = \Config\Services::email();
                $emailService->setFrom($contact_info, $name);
                $emailService->setTo('your-email@example.com');
                $emailService->setSubject('Contact Us Form Submission');
                $emailService->setMessage($message);

                if ($emailService->send()) {
                    $data['success'] = "Thank you for contacting us via Email!";
                } else {
                    $data['error'] = "There was an error sending your email. Please try again.";
                }
            }

            return view('pagetemplates/header', ['title' => 'Contact Us'])
                . view('contact/index', $data)
                . view('pagetemplates/footer');
        }
    }
}
?>
