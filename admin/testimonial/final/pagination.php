<?php
 global $wpdb;     
 $tbl_name = "wp_testimonial";     
 $record_per_page =2;  
 $page = '';  
 $output = '';  
 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  
 $start_from = ($page - 1)*$record_per_page;  
 $sql ="select * from $tbl_name order by id desc LIMIT $start_from, $record_per_page";
 $result = $wpdb->get_results($sql);
?>
<div class="table"  id="result" style="margin-top: 20px;">
   <table   class="wp-list-table widefat fixed posts" cellpadding="0" cellspacing="0" id="table">
           <thead>
           <tr>  
                <th class="min">id</th>  
                <th class="min">Name</th>  
                <th class="min">Description </th> 
                <th class="min">Category</th> 
                <th class="min">Images </th>
           
           </tr>
           </thead>  
            <tbody >
  <?php          
  foreach ( $result as $print )   
      { ?>  
        <tr> <td><?php echo $print->id; ?> </td>      
            <td><?php echo $print->name; ?> </td>
            <td><?php echo $print->description; ?> </td>      
            <td><?php echo $print->category; ?> </td>
            <td><img src="<?php echo $print->image; ?>" width="100" height="60" > </td>   
              
        </tr>
          
    <?php
    
} ?>  
</tbody>
</table>
</div>
</br>


   <?php
   
   $tbl_name = "wp_testimonial";
   $total = $wpdb->get_var( "SELECT COUNT(`id`) FROM $tbl_name" );
  
 $total_pages = ceil( $total / $record_per_page );
 //$page_query = "SELECT * FROM master_manufacturer ORDER BY manufacturer_id DESC";  
  
   
 for($i=1; $i<=$total_pages; $i++)  
 {  
      $output .=  "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
 }  
//$output .= '</div><br /><br />';  
 echo $output;
?>
