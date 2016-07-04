<?php


if (isset($_GET['searchterm'])) {
	$baseurl = "http://dpswebprd1.tp.edu.sg:1801/delivery/sru?version=1.2&operation=searchRetrieve&query=IE.dc.title%3d";
	$searchterm = $_GET['searchterm'];
	$url = $baseurl . "\"" . $searchterm . "\"";
	$xml = simplexml_load_file($url); //retrieve URL and parse XML content

	if ($xml){
		header('Content-type: text/xml');
		header('Access-Control-Allow-Origin: *');
		echo $xml->asXML();
	}
}else{
	echo "Missing search term";
}

?>