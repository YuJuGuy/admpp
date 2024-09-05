<?php

namespace App\Controllers;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Home extends BaseController
{
    public function index(): string
    {
        // Load the Excel file
        $spreadsheet = IOFactory::load(FCPATH . '/static/reviews.xlsx');
        $sheet = $spreadsheet->getActiveSheet();
        $data = $sheet->toArray();

        // Parse the data into an array of reviews
        $reviews = [];
        foreach ($data as $row) {
            // Skip the header row (assuming the first row is the header)
            if ($row === $data[0]) continue;

            $reviews[] = [
                'author_title' => $row[0],
                'review_rating' => (int)$row[1],
                'review_text' => $row[2],
                'author_image' => $row[3],  // Assuming this is the URL
            ];
        }

    
    {
        return view('pagetemplates/header')
        .view('home/index', ['reviews' => $reviews])
        . view('pagetemplates/footer');
    }
}
}
