<?php

namespace App\Http\Controllers;

use App\Console\Commands\ExcelCommand;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Symfony\Component\Filesystem\Exception\IOException;

class ExcelController extends Controller
{
    public function index(){
        return
    }
    public function export(){
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $header = ['cat'];
        $sheet->fromArray($header,null,'A1');
        
        $styleArray = [];
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; charset=utf-8; filename="neko.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = IOFactory::createWriter($spreadsheet,'Xlsx');
        $writer->save('php://output');
        exit;
    }
}
