<?php 
require( '../../../wp-config.php' );
global $wpdb;

 $dbname =  DB_NAME;
 $dbpass = DB_PASSWORD;
 $dbuser = DB_USER;
 $dbhost = DB_HOST; 
 
global $wpdb;

//your MySQL Database Name of which database to use this 
$tablename = "wp_contactus"; //your MySQL Table Name which one you have to create excel file 
// your mysql query here , we can edit this for your requirement 

$sql = "Select * from $tablename"; 
//create  code for connecting to mysql 
$Connect = @mysql_connect($dbhost, $dbuser, $dbpass) 
or die("Couldn't connect to MySQL:<br>" . mysql_error() . "<br>" . mysql_errno()); 
//select database 
$Db = @mysql_select_db($dbname, $Connect) 
or die("Couldn't select database:<br>" . mysql_error(). "<br>" . mysql_errno()); 
//execute query 
$result = @mysql_query($sql,$Connect) 
or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno()); 

error_reporting(E_ALL);


$host_name = $_SERVER['DOCUMENT_ROOT'];
$filename = 'exportfile';

$file_ending = "xls";

//header info for browser
//header("Content-Type: text/x-csv");   // For Csv  
header("Content-Type:  application/xls");    //For xls
//header('Content-Disposition: attachment; filename="Export-'.date('d-m-Y').'.csv"');   // For Csv  
header('Content-Disposition: attachment; filename="Export-'.date('d-m-Y').'.xls"');    //For xls
header("Pragma: no-cache"); 
header('Cache-Control: max-age=0'); 
header("Expires: 0");
/*******Start of Formatting for Excel*******/   
//define separator (defines columns in excel & tabs in word)
$sep = "\t"; //tabbed character (for xml file upload)
//$sep = ","; //tabbed character (for Csv character)
//start of printing column names as names of MySQL fields
/*
for ($i = 1; $i < mysql_num_fields($result); $i++) {
echo mysql_field_name($result,$i) . "\t";
}
*/
$out = '"First name","last name","phone number","Eamil","msg"';
$headers = explode(',', str_replace('"', '',$out));
echo  implode( $sep, $headers ) . $sep;
print("\n");    
//end of printing column names  
//start while loop to get data
    while($row = mysql_fetch_row($result))
    {
        $schema_insert = "";
        for($j=1; $j<mysql_num_fields($result);$j++)
        {
            if(!isset($row[$j]))
                $schema_insert .= "NULL".$sep;
            elseif ($row[$j] != "")
                $schema_insert .= "$row[$j]".$sep;
            else
                $schema_insert .= "".$sep;
        }
        $schema_insert = str_replace($sep."$", "", $schema_insert);
        $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
        $schema_insert .= "\t";
        print(trim($schema_insert));
        print "\n";
  }   