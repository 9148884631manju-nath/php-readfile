<?php
//Aug 2025
//Read Text / Data in different formats from the external file .txt and .csv
//Designed and Programmed by K Manjunath, 9343945143
namespace PhpReadFile;
class ReadTextFile
{
 private $fileName='';
 private $errors=array("FILE READ ERROR");
 public function __construct($fileName){
  $this->fileName = $fileName;
 }  public function readFile($data_for,$key){
  $res="";
  $error=$this->errors;
  if(file_exists($this->fileName)){
   $fo=fopen($this->fileName,"r");
   if($fo){
    switch($data_for){
     case "get_data_in_string":
      while(!feof($fo)){
       $res.=fgets($fo);
      }
      break;
      case "get_data_by_line_in_array":
       $res=array();
       while(!feof($fo)){
        $res[]=rtrim(fgets($fo));
       }
       break;
      case "get_array_data_by_num_key":
       $xres=array();
       while(!feof($fo)){
        $xres[]=rtrim(fgets($fo));
       }
       $res = isset($xres[$key])?$xres[$key]:"Invalid Key";
      break;
      case "get_data_in_json_string":
       while(!feof($fo)){
        $res.=fgets($fo);
       }
       $res=json_encode($res);
      break;
      case "get_json_object_by_key":
       while(!feof($fo)){
        $res.=fgets($fo);
       }
       $res = json_decode($res);
       $res=isset($res->$key)?$res->$key:$res;
       $res=json_encode($res);
      break;
      case "get_csv_data":
       $res=array();
        while(!feof($fo)){
        $res[]=fgetcsv($fo);
       }
       break;
     default:
      while(!feof($fo)){
       $res.=fgets($fo);
      }
     break;
    }
   }
   else
   {
    $res=$error[0];
   }
  }
  else
  {
   $res = $error[0]." ".$this->fileName;
  }
  return $res;
 }
}


?>