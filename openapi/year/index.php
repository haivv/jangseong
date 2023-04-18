<?php

// Connect to MySQL database
$conn = mysqli_connect("localhost", "root", "", "jangseong");

$result = mysqli_query($conn, "SELECT date FROM member");

// Create empty array for JSON data
$json_data = array();

$a = array();
// Loop through result set and convert to associative array
while ($row = mysqli_fetch_assoc($result)) {
  $row["date"] = explode("-", $row["date"]);
  $row["date"] = $row["date"][0];

  array_push($a,$row["date"]);

 // $json_data[] = $row;

}
$finalitem = count($a);

// echo $finalitem;
$b = array();

$dem=0;
for($i = 0; $i<$finalitem; $i++){
  //echo $a[$i];
  if(count($b)==0)
  {
    array_push($b,$a[0]);
  }

  if (in_array($a[$i], $b))
  {
  //echo "Match found";
  }
else
  {
    array_push($b,$a[$i]);
  }

}

//$json_data[] = $b;

 for ($c =0; $c<count($b); $c++){
   //echo "year":$b[$c];
   $json_data[] = $b[$c];
 }
 
 sort($json_data);


// Convert PHP array to JSON
$json_output = json_encode($json_data);

echo $json_output;

// Write JSON data to file
//$json_file = fopen("data2.json", "w");

//fwrite($json_file, $json_output);

//fclose($json_file);

// Close MySQL connection
mysqli_close($conn);


?>
