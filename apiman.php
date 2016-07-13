<?php

    //Action for allowed IP Addresses
	if (isset($_GET['searchterm'])) { //check for search term
		$baseurl = "http://eit.ebscohost.com/Services/SearchService.asmx/Search?prof=kwokcy.onboarding.eit&pwd=ebs2819&db=asx&query=";
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