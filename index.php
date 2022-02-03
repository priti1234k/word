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
echo "database connection successfull \n"; 

 $jsondata = file_get_contents('api.json');
 
  $data = json_decode($jsondata, true);
  
   $word1 = $data['word'];
   error_reporting(0);
  foreach($data['phonetics'] as $key => $val )
{
$text2=join(array("|",$val['text']));
	$audio2 = join(array("|",$val['audio']));

   foreach($data['meanings'] as $key => $val2)
{
	$partOfSpeech2= join(array("|",$val2['partOfSpeech']));
  foreach($val2['definitions'] as $key => $val3)
{
   foreach($val3 as $key => $val4)
{ 
    $synonyms1 = join("|",$val4);
	
$definition2 = join(array("|",$val3['definition']));
    $example2 = join(array("|",$val3['example']));

	
		
	echo "$word1 $text2 $audio2 $partOfSpeech2 $definition2 $example2 $synonyms1 \n";

	
$sql = "INSERT INTO word(word , text , audio, partOfSpeech, definition, example, synonyms)
    VALUES('$word1', '$text2 ', '$audio2', '$partOfSpeech2', '$definition2', '$example2', '$synonyms1')";
  
   if ($conn->query($sql) === TRUE) {
              echo "New record created successfully \n";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }

}	
}
}
}
?>