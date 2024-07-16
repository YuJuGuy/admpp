<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;

class Contact extends BaseController
{
    public function index()
    {
        $data['title'] = 'Contact Us';

        return view('templates/header', $data)
            . view('contact/index')
            . view('templates/footer');
    }

    public function submit()
    {
        helper(['form', 'url']);
        
        $validation = \Config\Services::validation();

        $validation->setRules([
            'name' => 'required',
            'email' => 'required|valid_email',
            'message' => 'required',
            'contact_method' => 'required'
        ]);

        if ($validation->withRequest($this->request)->run() == FALSE) {
            return view('templates/header', ['title' => 'Contact Us'])
                . view('contact/index', ['validation' => $this->validator])
                . view('templates/footer');
        } else {
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $message = $this->request->getPost('message');
            $contact_method = $this->request->getPost('contact_method');

            if ($contact_method == 'whatsapp') {
                // Prepare data for POST request
                $data = [
                    'name' => $name,
                    'email' => $email,
                    'message' => $message
                ];

                // Send POST request to custom API
                $client = \Config\Services::curlrequest();
                $response = $client->post('https://example.com/api/contact', [
                    'form_params' => $data
                ]);

                if ($response->getStatusCode() == 200) {
                    $data['success'] = "Thank you for contacting us via WhatsApp!";
                } else {
                    $data['error'] = "There was an error submitting your request. Please try again.";
                }
            } else if ($contact_method == 'email') {
                // Send email
                $emailService = \Config\Services::email();
                $emailService->setFrom($email, $name);
                $emailService->setTo('your-email@example.com');
                $emailService->setSubject('Contact Us Form Submission');
                $emailService->setMessage($message);

                if ($emailService->send()) {
                    $data['success'] = "Thank you for contacting us via Email!";
                } else {
                    $data['error'] = "There was an error sending your email. Please try again.";
                }
            }

            return view('templates/header', ['title' => 'Contact Us'])
                . view('contact/index', $data)
                . view('templates/footer');
        }
    }
}
?>
