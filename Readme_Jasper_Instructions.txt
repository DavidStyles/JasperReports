Instructions for Running sample jasper_report_test.jrxml Jasper Report in Tomcat server:
<Owen, 2012-11-14>


1.  Put jasper_report_test.jrxml and report-test.php file into Tomcat\webapps\JavaBridge
2.	Add additional libraries into Tomcat\lib directory
	commons-beanutils-1.8.2.jar
	commons-collections-3.2.1.jar
	commons-digester-2.1.jar
	commons-logging-1.1.1.jar
	groovy-all-1.7.5.jar
	jasperreports-4.7.0.jar
	mysql-connector-java-5.1.21-bin.jar
3. Request report-test.php page on Tomcat server port.
4.  PDF report should be returned