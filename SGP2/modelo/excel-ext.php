<?php
function createExcel($filename, $arrydata) {
	$excelfile = "xlsfile://".$filename; 
       
	$fp = fopen($excelfile, "wb");  
	if (!is_resource($fp)) {  
		die("Error al crear $excelfile");  
	}  
	fwrite($fp, serialize($arrydata));  
	fclose($fp);
	header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");  
	header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");  
	header ("Cache-Control: no-cache, must-revalidate");  
	header ("Pragma: no-cache");  
	header('Content-type: application/vnd.ms-excel');
	header ("Content-Disposition: attachment; filename=\"" . $filename . "\"" );
       
       header("Expires: 0");
	readfile($excelfile);  
}
?>