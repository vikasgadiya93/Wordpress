<?php
    /*
    Template Name:vistapak_contact
    */ 
    get_header();?>
<?php
  $uploads = wp_upload_dir(); 
    $upload_dir=$uploads['basedir']; 
    $upload_dir1=$uploads['baseurl']; 
    //   echo $upload_dir."<br>";  
    $new_upload= $upload_dir."/Document/";  
    $new_upload1= $upload_dir1."/Document/";  
    //     echo $new_upload."<br>";   die;
 if(isset($_POST['submit1']))  
    {    
        $fileName=$_FILES["resume"]["name"];
        $fileSize=$_FILES["resume"]["size"];
        $fileType=$_FILES["resume"]["type"];
        $fileTmpName=$_FILES["resume"]["tmp_name"];  
        // $allowedExts = array("pdf","doc","docx");
//    $extension = end(explode(".", $_FILES["resume"]["name"]));
     //     echo "<pre>";print_r($_FILES);echo "</pre>";die;      
                //New file name
                $random=rand(1111,9999);
                $newFileName=$random.$fileName;  
                //File upload path
                $upload_dir = wp_upload_dir();
                //$uploadPath="E:/testUpload/".$newFileName;
                $uploadPath=$new_upload.$newFileName;
                $uploadPath1=$new_upload1.$newFileName;

                //function for upload file
                if(!is_dir($new_upload))
                {
                    //echo "<script>alert('dir not found ');</script>";
                    mkdir($new_upload,0755);
                }                        
                //                $target_path = 'controller/import/uploads/'.$file;
                if(file_exists($uploadPath)) {
                    @unlink($uploadPath);
                }
                //                move_uploaded_file($filename,$target_path);   

                if(move_uploaded_file($fileTmpName,$uploadPath)){
                    //                    chmod($uploadPath, 0755);

                    /*    echo "<br>Successful<BR>"; 
                    echo "File Name :".$newFileName."<BR>"; 
                    echo "File Size :".$fileSize." kb"."<BR>"; 
                    echo "File Type :".$fileType."<BR>"; 
                    echo "File Type :".$uploadPath."<BR>"; 
                    */
                    echo "<script type='text/javascript'>alert('Thank you, your application has been submitted and will be reviewed')</script>";
                }
            
    // Your code here to handle a successful verification  
        $firstname=$_POST['first_name'];
        $lastname=$_POST['last_name'];
        $email1  =$_POST['emails_id'];
        $phone = $_POST['phone'];
        $HouseNum = $_POST['HouseNum'];
        $street = $_POST['street'];
        $town = $_POST['town'];
        $Postcode = $_POST['Postcode'];
        $County = $_POST['County'];
        
        //$msg=$_POST['msg'];
        global $wpdb;
        $wpdb->insert("wp_vistacontact", array(
        "first_name" => $firstname,
        "last_name" => $lastname,
        "phone" => $phone,
        "email" => $email1,
       // "msg" => $msg ,
        "houseno" => $HouseNum,
        "street" => $street,
        "town" => $town,
        "postcode" => $Postcode,
        "country" => $County, 
        "filename" => $fileName, 
        ));
      //  echo "<script>alert('mssage was sent !');</script>"; 
        //echo "mssage sent";

       
        //   Email
         $to = get_option('admin_email');
       // $to = 'deval@redsparkinfo.com';

        $subject = "New Contact Inquiry";

        $message="<h2>Vistapak Conatct Us</h2><br />";

        $message.="<style type='text/css'>
        #sign{
        display:none;
        }
        a { color: #2D7BE0; }
        a:hover { text-decoration: none; }
        </style>
        <table style='background: #eee; padding-left:10px;' width='100%'>
        <tr>
        <th colspan='2' bgcolor='#fff' style='padding: 5px;background-color: #fff; text-align: left;' width='20%'> Name </th>
        <td bgcolor='#fff' style='padding: 5px; background-color: #fff;' align='center' width='2%'> : </td>
        <td bgcolor='#fff' style='padding: 5px;background-color: #fff; text-align: left;'>".$firstname."</td>
        </tr>

        <tr>
        <th colspan='2' bgcolor='#fff' style='padding: 5px;background-color: #fff; text-align: left;' width='20%'> Phone Number </th>
        <td bgcolor='#fff' style='padding: 5px; background-color: #fff;' align='center' width='2%'> : </td>
        <td bgcolor='#fff' style='padding: 5px;background-color: #fff; text-align: left;'>".$phone."</td>
        </tr> 

        <tr>
        <th colspan='2' bgcolor='#fff' style='padding: 5px;background-color: #fff; text-align: left;' width='20%'> Email </th>
        <td bgcolor='#fff' style='padding: 5px; background-color: #fff;' align='center' width='2%'> : </td>
        <td bgcolor='#fff' style='padding: 5px;background-color: #fff; text-align: left;'>".$email1."</td>
        </tr> 

        <tr>
        <th colspan='2' bgcolor='#fff' style='padding: 5px;background-color: #fff; text-align: left;' width='20%'> Message </th>
        <td bgcolor='#fff' style='padding: 5px; background-color: #fff;' align='center' width='2%'> : </td>
        <td bgcolor='#fff' style='padding: 5px;background-color: #fff; text-align: left;'>".$msg."</td>
        </tr> 
        </table>
        <br>"; 

        //  $headers = "From: Quest Media profile_img ";
        $headers = 'From: Vistapak <myname@example.com>' . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        wp_mail( $to, $subject, $message, $headers );
        //  $_POST['email1']=$_POST['cell1']=$_POST['fname']=$_POST['pos']=$_POST['lname']=$_POST['profile_img']="";
        $emailSent = true;
        
    
  }   
?>

<div class="container">
    <div class="row">

        <div class="col-sm-7">
            <form action="" method="POST" enctype="multipart/form-data" id="contact_reg" class="contact_reg">

            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First Name"  onblur="return valName1();">
                    <label style="display:none" generated="true" class="errorAll" id="first_name_error" for="first_name_error">&nbsp;</label>       
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last Name"  onblur="return vallastName1();">
                    <label style="display:none" generated="true" class="errorAll" id="last_name_error" for="last_name_error">&nbsp;</label>       
                </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" id="emails_id" name="emails_id" class="form-control" placeholder="Email"  onblur="return valEmail2();">  
                    <label style="display:none" generated="true" class="errorAll" id="emails_id_error1" for="emails_id_error1">&nbsp;</label>             
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone Number"  onblur="return valContact2();">
                    <label style="display:none" generated="true" class="errorAll" id="phone_error" for="phone_error">&nbsp;</label>                 
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" value="" placeholder="House/Flat number" name="HouseNum" id="HouseNum" onblur="return valhouse();" class="form-control">
                    <label style="display: none" generated="true" class="errorAll field-validation-valid" id="house_error"></label>      
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" onblur="return valstreet();" value="" placeholder="Street name" name="street" id="street"   class="form-control">
                <label style="display: none" generated="true" class="errorAll field-validation-valid" id="street_error" for="lname_error">&nbsp;</label>             </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">

                    <input type="text" onblur="return valtown();" value="" placeholder="Town" name="town" id="town"  class="form-control">
                <label style="display: none" generated="true" class="errorAll field-validation-valid" id="town_error" for="town_error">&nbsp;</label>               </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">

                    <input type="text" onblur="return valpostcode();" placeholder="Postcode" name="Postcode" id="Postcode"  class="form-control">
                <label style="display: none" generated="true" class="errorAll field-validation-valid" id="post_error" for="town_error">&nbsp;</label>               </div>
            </div>

            <div class="col-sm-12">
                <div class="form-group">
                    <input type="text" onblur="return valcounty();" value="" placeholder="County" name="County" id="County"  class="form-control">
                <label style="display: none" generated="true" class="errorAll field-validation-valid" id="County_error" for="town_error">&nbsp;</label>             </div>
            </div> 
            <div class="col-sm-12">
               <div class="form-group">
                    <input type="file"  id="resume" class="form-control" name="resume" onblur="return valfile();" >
                    <label style="display: none" generated="true" class="errorAll" id="resume_error" for="resume_error">&nbsp;</label>

                </div>
            </div>
        </div>         
        <div class="col-sm-12">
          <!--<input type="submit" name="submit" id="sub_contact_us" class="btn btn-green pull-right" onclick="return validate_contact_us();"> -->
            <input type="submit" name="submit1" id="sub_contact_us1" class="btn btn-green pull-right" onclick="return validate_contact_us();" > 
        </div> 
        </form>
    </div>  
        </div>   
    
 
<?php  ?>
<script>
   function validate_contact_us() {
        var status = true;

        if(valName1() == false){
            status = false;
        }
        if(vallastName1() == false){
            status = false;
        }
        if(valContact2() == false){
            status = false;
        }           
        if(valEmail2() == false){
            status = false;
        } 
         if(valhouse() == false){
            status = false;
        }
         if(valstreet() == false){
            status = false;
        }
         if(valtown() == false){
            status = false;
        }
         if(valpostcode() == false){
            status = false;
        }
         if(valcounty() == false){
            status = false;
        }
        if(valmessage() == false){
            status = false;
        }
        if(valfile() == false){
            status = false;
        } 

        return status;
    }  
   
    function valName1() {
        var first_name = jQuery("#first_name").val();
        var regexp = /^[a-zA-Z ]*$/; 
        if(first_name == '') {
            jQuery("#first_name").css("border","1px solid red"); 
            jQuery("#first_name_error").css("display","");
            jQuery("#first_name_error").html('Please enter name');
            return false; 
        }
        else if(first_name.search(regexp) == -1) {
            jQuery("#first_name").css("border","1px solid red");
            jQuery("#first_name_error").css("display","");
            jQuery("#first_name_error").html('Please enter valid first name');
            return false; 
        }
        else {           
            jQuery("#first_name").css("border","1px solid #ccc");       
            jQuery("#first_name_error").css("display","none");
            return true;   
        }
    }
    function vallastName1() {
        var last_name = jQuery("#last_name").val();
        var regexp = /^[a-zA-Z ]*$/; 
        if(last_name == '') {
            jQuery("#last_name").css("border","1px solid red"); 
            jQuery("#last_name_error").css("display","");
            jQuery("#last_name_error").html('Please enter last name');
            return false; 
        }
        else if(last_name.search(regexp) == -1) {
            jQuery("#last_name").css("border","1px solid red");
            jQuery("#last_name_error").css("display","");
            jQuery("#last_name_error").html('Please enter valid  name');
            return false; 
        }
        else {           
            jQuery("#last_name").css("border","1px solid #ccc");       
            jQuery("#last_name_error").css("display","none");
            return true;   
        }
    } 
    function valContact2() {
        var phone = jQuery("#phone").val();
        var regexp = /^[0-9]*$/; 
        if(phone == '') {
            jQuery("#phone").css("border","1px solid red"); 
            jQuery("#phone_error").css("display","");
            jQuery("#phone_error").html('Please enter contact number');
            return false; 
        }
        else if(phone.search(regexp) == -1) {
            jQuery("#phone").css("border","1px solid red");
            jQuery("#phone_error").css("display","");
            jQuery("#phone_error").html('Please enter valid contact number');
            return false; 
        }
        else {      
            jQuery("#phone").css("border","1px solid #ccc");             
            jQuery("#phone_error").css("display","none");
            return true;   
        }
    } 
    function valEmail2() {
        var emails_id = jQuery("#emails_id").val();
        var reg_email = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
        if(emails_id == '') {
            jQuery("#emails_id").css("border","1px solid red"); 
            jQuery("#emails_id_error1").css("display","");
            jQuery("#emails_id_error1").html('Please enter email');
            return false; 
        }
        else if(!reg_email.test(emails_id)) {
            jQuery("#emails_id").css("border","1px solid red"); 
            jQuery("#emails_id_error1").css("display","");
            jQuery("#emails_id_error1").html('Please enter valid email');
            return false; 
        }
        else {  
            jQuery("#emails_id").css("border","1px solid #ccc"); 
            jQuery("#emails_id_error1").css("display","none");
            return true;   
        }
    }

    function valfile() {
        var resume = jQuery("#resume").val();           
        if(resume == '') {
            jQuery("#resume_error").css("display","");
            jQuery("#resume_error").html('Please enter Upload Document');
            return false; 
        }   else {  
            jQuery("#resume_error").css("display","none");
            return true;   
        }
    }
    function valcounty() {
        var County = jQuery("#County").val();
        if(County == '') {
            jQuery("#County_error").css("display","");
            jQuery("#County_error").html('Please Enter Country');
            return false; 
        }

        else {  
            jQuery("#County_error").css("display","none");
            return true;   
        }
    }

    function valpostcode() {
        var Postcode = jQuery("#Postcode").val();
        if(Postcode == '') {
            jQuery("#post_error").css("display","");
            jQuery("#post_error").html('Please Enter post code');
            return false; 
        }

        else {  
            jQuery("#post_error").css("display","none");
            return true;   
        }
    }
    function valtown() {
        var town = jQuery("#town").val();
        if(town == '') {
            jQuery("#town_error").css("display","");
            jQuery("#town_error").html('Please Enter Town');
            return false; 
        }

        else {  
            jQuery("#town_error").css("display","none");
            return true;   
        }
    }
    function valstreet() {
        var street = jQuery("#street").val();
        if(street == '') {
            jQuery("#street_error").css("display","");
            jQuery("#street_error").html('Please Enter Street');
            return false; 
        }

        else {  
            jQuery("#street_error").css("display","none");
            return true;   
        }
    }

    function valhouse() {
        var HouseNum = jQuery("#HouseNum").val();
        if(HouseNum == '') {
            jQuery("#house_error").css("display","");
            jQuery("#house_error").html('Please Enter House Number');
            return false; 
        }

        else {  
            jQuery("#house_error").css("display","none");
            return true;   
        }
    }
     function valmessage() {
        var Message = jQuery("#Message").val();
        if(Message == '') {
            jQuery("#message_error").css("display","");
            jQuery("#message_error").html('Please Enter Message');
            return false; 
        }
       
        else {  
            jQuery("#message_error").css("display","none");
            return true;   
        }
    } 

</script>  
<!--END-->
<?php get_footer(); ?>