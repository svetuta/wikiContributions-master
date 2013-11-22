<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

    <head>
        <title>Grisou | Durée Intervention Article </title>
        <link rel="stylesheet" href="css/style3.css" />
        <script src="script/jquery-1.8.2.min.js"></script>
        <script src="script/contributions-script.js"></script>
    </head>
    <body>
        <header>
            <h1>Survie d'une intervention!</h1>
        </header>
        <nav>
            <ul>
                <li><a href="./index.html">Accueil</a></li>
                <li>Link 2 </li>
                <li>Link 2 </li>
                <li/>
            </ul>
        </nav>
        
        <section id="question">
		<form method="post">
            <h2>Entrer le titre de l'article : <input type="text"  name="q" id="title"/></h2>
         </Form>


<?php
$title = $_POST["q"];
$wikiurl = 'fr.wikipedia.org';
$withoutSlash = explode('/', $wikiurl);
$url = $withoutSlash[0];
$completeUrl = "http://";
$completeUrl.= $url;
include_once( dirname(__FILE__) . '/diffFunctions.php');

function showGoogleDiff($text1, $text2) {
	$result = getDiff($text1, $text2); //Return an array of Diff objects
	$output = prettyHtml($result, strlen(utf8_decode($text1)));
	return $output;
}

// A user agent is required by MediaWiki API
//ini_set('user_agent', 'ProjetGrisou/1.1 (http://grisou.uqam.ca; grisou.science@gmail.com)');


///////////////////////////////////////////////////////Articles//////////////////////////////////////////////////////////////////////////////////////////
$jsonurl = $completeUrl."/w/api.php?action=query&list=search&format=json&srsearch=Canda&srprop=timestamp";

$json = file_get_contents($jsonurl, true);

$obj = json_decode($json, true);

$queries = $obj['query'];
$result = "";

$result = '<h1>Articles which '.$title.' contributed to</h1>
            <table>
				<tr>            
					<th>Articles from '.$completeUrl.'</th>
					<th>Has the contribution survived?</th>
					<th>Edits</th>
					<th>What is the value of the contribution?</th>					
				</tr>';
				
	
	
print $result;


