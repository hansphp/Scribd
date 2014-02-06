<?php
include('../config.php');
header('Content-Type: application/xml; charset=utf-8');
//if(isset($_POST['collections']) && !empty($_POST['collections']))
	$file = file_get_contents('http://api.scribd.com/api?method=docs.getList&api_key='.H_API_KEY);
//else if(isset($_POST['collection_id']) && !empty($_POST['collection_id']))
	//$file = file_get_contents("http://api.scribd.com/api?method=docs.getList&api_key=".H_API_KEY);
//else
	//die('Error');

echo str_replace(']]>','', str_replace('<![CDATA[','', $file ));
