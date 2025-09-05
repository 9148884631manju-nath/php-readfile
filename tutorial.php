<?php
require_once "php-readfile.php";

use PhpReadFile\ReadTextFile;

echo "get_data_in_string<br/>";
$get_string = new ReadTextFile("textfile.txt");
$get_string_data= $get_string->readFile("get_data_in_string",null);
echo $get_string_data;
echo "<hr/>";

echo "get_data_by_line_in_array<br/>";
$get_data_by_line_in_array = $get_string->readFile("get_data_by_line_in_array",null);
var_dump($get_data_by_line_in_array);
echo "<hr/>";

echo "get_array_data_by_num_key<br/>";
$get_array_data_by_num_key = $get_string->readFile("get_array_data_by_num_key",0);
echo $get_array_data_by_num_key;
echo "<hr/>";

echo "get_csv_data<br/>";
$read_csv = new ReadTextFile("csvdata.csv");
$get_csv_data = $read_csv->readFile("get_csv_data",null);
var_dump($get_csv_data);
echo "<hr/>";

echo "get_data_in_json_string<hr/>";
$get_json = new ReadTextFile("Jsondata.txt");
$get_data_in_json_string = $get_json->readFile("get_data_in_json_string",null);
echo $get_data_in_json_string;
echo "<hr/>";

echo "get_json_object_by_key<hr/>";
$get_json_object_by_key = $get_json->readFile("get_json_object_by_key","batters");
echo $get_json_object_by_key;

$toJsonArray = json_decode($get_json_object_by_key);
var_dump($toJsonArray);

echo "<hr/>";

?>