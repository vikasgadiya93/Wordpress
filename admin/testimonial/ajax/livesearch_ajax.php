     <?php
   
    parse_str($_POST['data'], $_POST);
    global $wpdb;
   $tbl_name ="wp_testimonial";
    global $data; 
    if(isset($_POST)){ 
        $keyword=$_POST['keyword']; 
         $data ="select * from `$tbl_name` WHERE category LIKE '%$keyword%'";
          $data1= $wpdb->get_results($data);
        //  print_r($data1);  die('vikas');
               foreach ($data1 as $print)   
                                {
          ?>
      
                                    <td><?php echo $print->category; ?> </td>      
          <?php  } 
    }?> 
                               
     
   </div>
   </div>
    