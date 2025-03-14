<?php

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8');

// echo "<pre>";
// print_r($data);
// echo "</pre>";

$pdf->setCreator('GVoc');
$pdf->setAuthor($data['created_by']);
$pdf->setTitle("Debet Intern");
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
$pdf->SetMargins(10, 10, 10);
$pdf->SetHeaderMargin(10);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, 15);
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->setFontSubsetting(true);
$pdf->AddPage('P', 'A4');
$pdf->SetFont('times', 'B', 12);
// Logo
$image_file = ROOTPATH . "public\uploads\aplikasi\\{$app['logo_cetakan']}";
$ext = pathinfo($image_file, PATHINFO_EXTENSION);
$pdf->Image($image_file, '', '', 40, '', $ext);
$pdf->MultiCell(45, 6, '<b>DEBET INTERN</b>', 0, 'C', false, 1, 155, '', false, 0, 1, false, 0, 'M', false);
$pdf->SetFont('helvetica', '', 10);
$pdf->MultiCell(45, 5, '<i>Perintah Pembukuan</i>', 'LTRB', 'C', false, 1, 155, '', false, 0, 1, false, 0, 'M', false);
$pdf->setY(25);
$pdf->SetFont('helvetica', 'B', 12);
$pdf->MultiCell(10, 5, 'Tgl. ', 0, 'L', false, 0, 155, '', false, 0, 1, false, 0, 'M', false);
$pdf->MultiCell(35, 5, date("d / m / Y", strtotime($data['tgltrn'])), 'B', 'L', false, 1, 165, '', false, 0, 1, false, 0, 'M', false);
$pdf->Ln(7);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->MultiCell(30, 5, "DEBET :", 'LTR', 'L', false, 0, '', '', true, 0, false, false, 5, 'M', false);
$pdf->MultiCell(0, 5, "Nama Rekening :", 'LRT', 'L', false, 1, '', '', true, 0, false, false, 5, 'M', false);
// $pdf->MultiCell(45, 5, "", 'TR', 'L', false, 1, '', '', true, 0, false, false, 5, 'M', false);
$pdf->SetFont('helvetica', 'B', 11);
$pdf->MultiCell(30, 18, $data['dnorek'], 'LB', 'C', false, 0, '', '', true, 0, false, false, 18, 'M', false);
$pdf->MultiCell(0, 18, $data['dnama'], 'LRB', 'L', false, 1, '', '', true, 0, false, false, 18, 'M', false);
// $pdf->MultiCell(45, 18, "", 'RB', 'C', false, 1, '', '', true, 0, false, false, 18, 'M', false);
$pdf->SetFont('helvetica', 'BI', 12);
// $pdf->MultiCell(145, 20, "## " . $data['terbilang'] preg_replace('!\s+!', ' ', $input). " ##", 'LTRB', 'L', false, 0, '', '', true, 0, false, false, 20, 'M', false);
$pdf->MultiCell(145, 20, "## " . terbilangdesimal($data['nominal']) . " ##", 'LTRB', 'L', false, 0, '', '', true, 0, false, false, 20, 'M', false);
$pdf->SetFont('helvetica', 'B', 12);
$pdf->MultiCell(45, 20, fullnominal($data['nominal']), 'LTRB', 'C', false, 1, '', '', true, 1, false, false, 20, 'M', false);
$pdf->SetFont('helvetica', '', 10);
$pdf->MultiCell(100, 5, "Keterangan :", 'LT', 'L', false, 0, '', '', true, 1, false, false, 5, 'M', false);
$pdf->MultiCell(90, 5, "", 'TR', 'L', false, 1, '', '', true, 1, false, false, 5, 'M', false);
$pdf->SetFont('helvetica', 'B', 12);
$pdf->MultiCell(140, 20, "  " . $data['ket'], 'LB', 'L', false, 0, '', '', true, 1, false, false, 20, 'M', false);
$style = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
$pdf->Line(155, 100, 200, 100, $style);
$pdf->MultiCell(50, 20, "", 'RB', 'L', false, 1, '', '', true, 1, false, false, 20, 'M', false);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->MultiCell(30, 5, "KREDIT :", 'LTR', 'L', false, 0, '', '', true, 0, false, false, 5, 'M', false);
$pdf->MultiCell(115, 5, "Nama Rekening :", 'LTR', 'L', false, 0, '', '', true, 0, false, false, 5, 'M', false);
$pdf->MultiCell(15, 0, "M", 'LTRB', 'C', false, 0, '', '', true, 0, false, false, 0, 'M', false);
$pdf->MultiCell(15, 0, "C", 'LTRB', 'C', false, 0, '', '', true, 0, false, false, 0, 'M', false);
$pdf->MultiCell(15, 0, "A", 'LTRB', 'C', false, 1, '', '', true, 0, false, false, 0, 'M', false);
$pdf->SetFont('helvetica', 'B', 12);
$pdf->MultiCell(30, 18, $data['cnorek'], 'LRB', 'C', false, 0, '', '', true, 0, false, false, 18, 'M', false);
$pdf->MultiCell(115, 18, $data['cnama'], 'LRB', 'L', false, 0, '', '', true, 0, false, false, 18, 'M', false);
$pdf->MultiCell(15, 18, "", 'LTRB', 'C', false, 0, '', '', true, 0, false, false, 18, 'M', false);
$pdf->MultiCell(15, 18, "", 'LTRB', 'C', false, 0, '', '', true, 0, false, false, 18, 'M', false);
$pdf->MultiCell(15, 18, "", 'LTRB', 'C', false, 1, '', '', true, 0, false, false, 18, 'M', false);

$pdf->Output("Debet Intern {$data['dnama']}.pdf", 'I');
