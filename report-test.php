


<?php

set_time_limit(60);
ob_start();

include_once("java/Java.inc");


try{
	java("java.lang.Class")->forName("com.mysql.jdbc.Driver");
	$driverManager = new JavaClass("java.sql.DriverManager");

	// Set jdbc connection Here
	$dbConnection = $driverManager->getConnection("jdbc:mysql://localhost/rrgdb", "root","ESPZ1n7WZ");  //AWS Connection
		
	try {
		// Open jasper report
		$compileManager = new JavaClass("net.sf.jasperreports.engine.JasperCompileManager");
		$viewer = new JavaClass("net.sf.jasperreports.view.JasperViewer");
			
		//Set .jrxml path Here
		$report = $compileManager->compileReport(realpath("jasper_report_test.jrxml"));

		$fillManager = new JavaClass("net.sf.jasperreports.engine.JasperFillManager");
			
		$jasperPrint = $fillManager->fillReport($report, $params, $dbConnection);

		$outputPath = realpath(".")."/"."output.pdf";
		java_set_file_encoding("ISO-8859-1");
		$em = java('net.sf.jasperreports.engine.JasperExportManager');

		$em-> exportReportToPdfFile($jasperPrint, $outputPath);
		header("Content-type: application/pdf");

		readfile($outputPath);
		unlink($outputPath);

	}catch(JavaException $ex) {
		// ERROR generating Report
		echo "<b>ERROR generating Report:</b><br/> ".$ex->getCause();
		// exit 1;
	}
}catch(JavaException $ex) {
	echo "<b>ERROR generating Report:</b><br/> ".$ex->getCause();
}

die();

?>