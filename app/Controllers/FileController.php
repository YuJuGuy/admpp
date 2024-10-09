<?php
namespace App\Controllers;

class FileController extends BaseController
{
    public function serve($fileName)
    {
        // Allow access only from the host (localhost)
        $clientIP = $this->request->getIPAddress();
        if (!in_array($clientIP, ['127.0.0.1', '::1', '172.17.0.0/16'])) {
            return $this->response->setStatusCode(403, 'Forbidden');
        }

        // Define the path to your uploads directory
        $filePath = WRITEPATH . 'uploads/' . $fileName;

        // Ensure the file exists before serving it
        if (file_exists($filePath)) {
            // Serve the file for server-side access only
            return $this->response->download($filePath, null);
        } else {
            // Return 404 if file not found
            throw new \CodeIgniter\Exceptions\PageNotFoundException('File not found');
        }
    }
}
