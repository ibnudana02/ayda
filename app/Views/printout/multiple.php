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
$pdf->MultiCell(35, 5, "DEBET :", 'LTR', 'L', false, 0, '', '', true, 0, false, false, 5, 'M', false);
$pdf->MultiCell(0, 5, "Nama Rekening :", 'LRT', 'L', false, 1, '', '', true, 0, false, false, 5, 'M', false);
$pdf->SetFont('helvetica', 'B', 11);
// $dnorek = explode(';',$data['dnorek']);
$nom = array_filter(explode(';', $data['nominal_dr']));
$dnom = 0;
for ($i = 0; $i < count($nom); $i++) {
    $dnom += (float) $nom[$i];
}
$drow = count(array_filter(explode(';', $data['dnorek'])));
$dr = ($drow > 1) ? ($drow * 8) : 18;
$pdf->MultiCell(35, $dr, parse_multi($data['dnorek']), 'LB', 'C', false, 0, '', '', true, 0, false, false, 18, 'M', false);
$pdf->MultiCell(0, $dr, parse_multi($data['dnama'], (count($nom) > 1) ? $data['nominal_dr'] : ''), 'LRB', 'L', false, 1, '', '', true, 0, false, false, 18, 'M', false);
// $pdf->MultiCell(0, $dr, $dr, 'LRB', 'L', false, 1, '', '', true, 0, false, false, 18, 'M', false);
$pdf->SetFont('helvetica', 'BI', 12);
// $pdf->MultiCell(135, 20, "## " . $data['terbilang'] . " ##", 'LTRB', 'L', false, 0, '', '', true, 0, false, false, 20, 'M', false);
$pdf->MultiCell(135, 20, "## " . terbilangdesimal($dnom) . " ##", 'LTRB', 'L', false, 0, '', '', true, 0, false, false, 20, 'M', false);
$pdf->SetFont('helvetica', 'B', 12);
$pdf->MultiCell(55, 20, fullnominal($dnom), 'LTRB', 'C', false, 1, '', '', true, 1, false, false, 20, 'M', false);
$pdf->SetFont('helvetica', '', 10);
$pdf->MultiCell(100, 5, "Keterangan :", 'LT', 'L', false, 0, '', '', true, 1, false, false, 5, 'M', false);
$pdf->MultiCell(90, 5, "", 'TR', 'L', false, 1, '', '', true, 1, false, false, 5, 'M', false);
$pdf->SetFont('helvetica', 'B', 12);
$pdf->MultiCell(140, 20, "  " . $data['ket'], 'LB', 'L', false, 0, '', '', true, 1, false, false, 20, 'M', false);
$style = array('width' => 0.25, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
$pdf->Line(155, 95, 200, 95, $style);
$pdf->MultiCell(50, 20, "", 'RB', 'L', false, 1, '', '', true, 1, false, false, 20, 'M', false);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->MultiCell(35, 5, "KREDIT :", 'LTR', 'L', false, 0, '', '', true, 0, false, false, 5, 'M', false);
$pdf->MultiCell(110, 5, "Nama Rekening :", 'LTR', 'L', false, 0, '', '', true, 0, false, false, 5, 'M', false);
$pdf->MultiCell(15, 0, "M", 'LTRB', 'C', false, 0, '', '', true, 0, false, false, 0, 'M', false);
$pdf->MultiCell(15, 0, "C", 'LTRB', 'C', false, 0, '', '', true, 0, false, false, 0, 'M', false);
$pdf->MultiCell(15, 0, "A", 'LTRB', 'C', false, 1, '', '', true, 0, false, false, 0, 'M', false);
$row = count(array_filter(explode(';', $data['cnorek'])));
$pb = ($row > 1) ? ($row * 6) : 18;
$pdf->SetFont('helvetica', 'B', 11);
$pdf->MultiCell(35, $pb, parse_multi($data['cnorek']), 'LRB', 'C', false, 0, '', '', true, 0, false, false, $pb, 'M', false);
$pdf->MultiCell(110, $pb, parse_multi($data['cnama'], ($row > 1) ? $data['nominal_cr'] : ''), 'LRB', 'L', false, 0, '', '', true, 0, false, false, $pb, 'M', false);
$pdf->MultiCell(15, $pb, "", 'LTRB', 'C', false, 0, '', '', true, 0, false, false, $pb, 'M', false);
$pdf->MultiCell(15, $pb, "", 'LTRB', 'C', false, 0, '', '', true, 0, false, false, $pb, 'M', false);
$pdf->MultiCell(15, $pb, "", 'LTRB', 'C', false, 1, '', '', true, 0, false, false, $pb, 'M', false);

$pdf->Output("Debet Intern {$data['dnama']}.pdf", 'I');
