<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "worddb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "database connection successfull"; 

 $jsondata = file_get_contents('api.json');
  $data = json_decode($jsondata, true);
  
   $word = $data['word'];
    $text = $data['phonetics']['text'];
    $audio = $data['phonetics']['audio'];
    $partOfSpeech = $data['meanings']['partOfSpeech'];
    $definition = $data['meanings']['definitions']['definition'];
    $example = $data['meanings']['definitions']['example'];
    $synonyms = $data['meanings']['definitions']['synonyms'];
	
	 $sql = "INSERT INTO word(word , text , audio, partOfSpeech, definition, example, synonyms)
    VALUES('$word', '$text', '$audio', '$partOfSpeech', '$definition', '$example', '$synonyms')";
    if(!mysql_query($sql,$con))
    {
        die('Error : ' . mysql_error());
    }
    
?>