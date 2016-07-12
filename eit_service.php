<?php
// This is to check if the request is coming from a specific domain
$ref = $_SERVER['HTTP_REFERER'];
$refData = parse_url($ref);

if($refData['host'] !== 'gss.ebscohost.com') {
  // Output string and stop execution
  echo "<H1>HTTP Error 403</H1>";
  http_response_code(403);
  //die("Hotlinking not permitted");
}
else{
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
}
?>