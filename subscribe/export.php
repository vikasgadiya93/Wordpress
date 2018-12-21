<?php 


require( '../../../wp-config.php' );


 $dbname =  DB_NAME;
 $dbpass = DB_PASSWORD;
 $dbuser = DB_USER;
 $dbhost = DB_HOST; 
global $wpdb;

//your MySQL Database Name of which database to use this 
$tablename = "wp_subscribe"; //your MySQL Table Name which one you have to create excel file 
// your mysql query here , we can edit this for your requirement 
//global $wpdb;
$sql = "Select * from $tablename "; 
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
/*global $wpdb;
$tablename = "wp_health_cover_reg";
$data = "Select * from $tablename "; 
$data1= $wpdb->get_results($data);*/
//echo "<pre>";print_r($data1);die;
  $host_name = $_SERVER['DOCUMENT_ROOT'];   
  $dir = plugin_dir_path( __FILE__ );
//echo $dir; die('tets');

require_once $dir . '/classes/PHPExcel.php'; 

//require_once $host_name.'/wordpress/wp-content/plugins/subscribe_settings/Classes/PHPExcel.php';
//require_once('http://therightlifecover.co.uk/wp-content/themes/health_cover/admin/Classes/PHPExcel.php');
//echo "asdsad";die;
$objPHPExcel = new PHPExcel();

// Set the active Excel worksheet to sheet 0 

$objPHPExcel->setActiveSheetIndex(0);  

// Initialise the Excel row number 

$rowCount = 1;  


//start of printing column names as names of MySQL fields  

$column = 'A';

$col_name=array('Email','Timestamp');
//echo $col_name[0];die;
for ($i = 0; $i < count($col_name); $i++)  
{   
    $objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, $col_name[$i]);    
    $column++;
}

//end of adding column names  
//start while loop to get data  

$rowCount = 2;  

while($row = mysql_fetch_row($result))  
{
    $column = 'A';
    //$data= json_decode($result['data'], true);

    for($j=1; $j<mysql_num_fields($result);$j++)  
    {

        if(!isset($row[$j]))  

            $value = NULL;  

        elseif ($row[$j] != "")  

            $value = strip_tags($row[$j]);  
        else  
            $value = "";  


        $objPHPExcel->getActiveSheet()->setCellValue($column.$rowCount, $value);
        $column++;
    }  

    $rowCount++;
} 

// Redirect output to a client’s web browser (Excel5) 
header("Content-type: text/x-csv"); 
header('Content-Disposition: attachment;filename="Export-'.date('d-m-Y').'.csv"'); 
header('Cache-Control: max-age=0'); 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV'); 
$objWriter->save('php://output');