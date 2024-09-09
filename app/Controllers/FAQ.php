<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\IOFactory;
use CodeIgniter\Controller;

class FAQ extends BaseController
{
    public function index(): string
{

    // require autoload dynamically from vendor folder

    require_once APPPATH . '../vendor/autoload.php';

    $filePath = FCPATH . 'static/questions.xlsx';
    $spreadsheet = IOFactory::load($filePath);
    $sheet = $spreadsheet->getActiveSheet();

    $faqData = [];
    foreach ($sheet->getRowIterator() as $rowIndex => $row) {
        if ($rowIndex === 1) {
            // Skip header row
            continue;
        }

        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);

        $faq = [];
        foreach ($cellIterator as $cellIndex => $cell) {
            $value = $cell->getValue();
            switch ($cellIndex) {
                case 'A':
                    $faq['question'] = $value;
                    break;
                case 'B':
                    $faq['answer'] = $value;
                    break;
                case 'C':
                    $category = $value;
                    break;
                case 'D':
                    $faq['icon'] = $value;
                    break;
            }
        }

        if (!isset($faqData[$category])) {
            $faqData[$category] = [];
        }
        $faqData[$category][] = $faq;
    }

    return view('pagetemplates/header')
        . view('faq/index', ['faqData' => $faqData])
        . view('pagetemplates/footer');
}

}
