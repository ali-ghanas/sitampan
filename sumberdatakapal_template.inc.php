<?php
require_once($deflink."class/phpexcel/PHPExcel.php");

$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Nama Kapal')
            ->setCellValue('A2', 'Pelabuhan Asal')
            ->setCellValue('A3', 'Pelabuhan Tujuan')
            ->setCellValue('A4', 'Tanggal Keberangkatan')
            ->setCellValue('A5', 'Tanggal Kedatangan')
            ->setCellValue('C1', ':')
            ->setCellValue('C2', ':')
            ->setCellValue('C3', ':')
            ->setCellValue('C4', ':')
            ->setCellValue('C5', ':')
			->mergeCells('D1:I1')
			->mergeCells('D2:I2')
			->mergeCells('D3:I3')
			->mergeCells('D4:I4')
			->mergeCells('D5:I5')
            ->setCellValue('A7', 'No.')
            ->setCellValue('B7', 'Nama Penumpang')
            ->setCellValue('C7', 'L/P')
            ->setCellValue('D7', 'Tanggal Lahir')
            ->setCellValue('E7', 'Kebangsaan')
            ->setCellValue('F7', 'Nomor Passpor')
            ->setCellValue('G7', 'Tempat Penerbitan Paspor')
            ->setCellValue('H7', 'Waktu Penerbitan Paspor')
            ->setCellValue('I7', 'Keterangan');

$objPHPExcel->getActiveSheet()->getStyle('D')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDD2);
$objPHPExcel->getActiveSheet()->getStyle('H')->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_DATE_YYYYMMDD2);

$objPHPExcel->getActiveSheet()->getStyle('A7:I7')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('A7:I7')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('C1:C5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
$objPHPExcel->getActiveSheet()->getStyle('D7:H7')->getAlignment()->setWrapText(true);

$objPHPExcel->getActiveSheet()->getRowDimension('7')->setRowHeight(52);

$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(5);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(11);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(12);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(11);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(11);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(11);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(11);

$objPHPExcel->getActiveSheet()->getStyle('A1:D5')->getFont()->setBold(true);
$objPHPExcel->getActiveSheet()->getStyle('A7:I7')->getFont()->setBold(true);

$objPHPExcel->getActiveSheet()->getStyle('A7:I7')->getBorders()->getTop()->setBorderStyle(PHPExcel_Style_Border::BORDER_THIN);
$objPHPExcel->getActiveSheet()->getStyle('A7:I7')->getBorders()->getBottom()->setBorderStyle(PHPExcel_Style_Border::BORDER_DOUBLE);

$objPHPExcel->getActiveSheet()->setTitle('template');

ob_end_clean();

if ($_GET["linfiletype"]=="xls") {
	$namafile = "Template_Analisis_Data_Penumpang.xls";
	$contenttype = "application/vnd.ms-excel";
} elseif ($_GET["linfiletype"]=="xlsx") {
	$namafile = "Template_Analisis_Data_Penumpang.xlsx";
	$contenttype = "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet";
}

header("Content-Disposition: attachment; filename=".$namafile);
header("Content-type: ".$contenttype);

if ($_GET["linfiletype"]=="xls") {
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
} elseif ($_GET["linfiletype"]=="xlsx") {
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
}

ob_end_clean();

$objWriter->save('php://output');
$objPHPExcel->disconnectWorksheets();
unset($objPHPExcel);
exit;
?>