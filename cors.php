<?php
if (isset($_GET['searchterm'])) { //check for search term
	$baseurl = "http://lx2.loc.gov:210/LCDB?operation=searchRetrieve&version=1.1&maximumRecords=10&recordSchema=mods&query=dc.title%3d";
	$searchterm = $_GET['searchterm'];
	$url = $baseurl . "\"" . $searchterm . "\"";
	$xml = simplexml_load_file($url); //retrieve URL and parse XML content

	if ($xml){
		header('Content-type: text/xml');
		header('Access-Control-Allow-Origin: *');
		echo $xml->asXML();
	}
}else{
	echo "<H1>HTTP Error 400</H1>";
	http_response_code(400);
}
?>
