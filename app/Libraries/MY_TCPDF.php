<?php

namespace App\Libraries;

use App\Models\AppModel;
use TCPDF;

class MY_TCPDF extends TCPDF
{
    //Page header
    public function Header()
    {
        $app_m = new AppModel();
        $app = (object) $app_m->first();
        // Logo
        $image_file = ROOTPATH . "public/uploads/aplikasi/$app->logo";
        $ext = pathinfo($image_file, PATHINFO_EXTENSION);
        /**
         * width : 50
         */
        $this->Image($image_file, '', '', 15);
        // Set font
        $this->SetFont('helvetica', 'B', 14);
        $this->setAbsXY(35, 6);
        $this->Cell(0, 2, $app->nama_pt, 0, 1, '', 0, '', 0);
        // Title
        $this->SetFont('helvetica', '', 10);
        $this->SetX(35);
        $this->Cell(0, 2, $app->alamat_pt, 0, 1, '', 0, '', 0);
        $this->SetX(35);
        $this->Cell(0, 2, $app->web_pt, 0, 1, '', 0, '', 0);

        // QRCODE,H : QR-CODE Best error correction
        $this->write2DBarcode($app->web_pt, 'QRCODE,H', 2, 5, 15, 15, ['position' => 'R'], 'N');

        $style = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
        $this->Line(15, 22, 195, 22, $style);
    }

    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // // Page number        
        $this->Cell(0, 10, 'Page ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
