     <?php
   
    parse_str($_POST['data'], $_POST);
    global $wpdb;
    $tbl_name ="wp_testimonial";
    global $data; 
    if(isset($_POST)){ 
        $search_name=$_POST['search_name']; 
        $data ="select * from `$tbl_name` WHERE category LIKE '%$search_name%'";
        $data1= $wpdb->get_results($data);
        //  print_r($data1);  die('vikas');?>
          <div id="upper1">
          <div class="head" id="table_table1">
                    <table   class="wp-list-table widefat fixed posts" cellpadding="0" cellspacing="0" id="table">
                    <thead>
                        <tr class="tr">
                            <th class="min"><input style="margin: 0px;" type="checkbox" id="select_all"/></th>  
                            <th class="min">No.</th>
                            <th class="min">Name </th>
                            <th class="min">Description </th> 
                            <th class="min">Category</th> 
                            <th class="min">Images </th>
                            <th class="min">Status </th>
                            <th class="min">Action </th>
                        </tr>
                    </thead>  
                
                 
                    <tbody >
        <?php   
                             if(count($data1) > 0)
                            { 
        
                                foreach ($data1 as $print)   
                                {
                                ?>   

                

                                <tr class="body"> 
                                    <td><input class="checkboxcheck" name="checkbox[]" type="checkbox" id="checkbox" value="<?php echo $print->id;  ; ?>"/></td>
                                    <!-- <td><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $id  ; ?>"/></td>-->
                                    <td><?php echo $print->id; ?> </td>      
                                    <td><?php echo $print->name; ?> </td>      
                                    <td><?php echo $print->description; ?> </td>      
                                    <td><?php echo $print->category; ?> </td>      

                                    <td><img src="<?php echo $print->image; ?>" width="100" height="60" > </td>   
                                    <td><?php if($print->state == 1){ echo "active";}else{echo "not active";}  ?> </td>       
                                    <td> <a href="admin.php?page=testimonial_edit&action=edit_ord&id=<?php echo $print->id; ?>" class="ord_edit" title="Click To Edit">Edit</a> | 
                                    <a href="admin.php?page=testimonial&action=delete_ord&deleteId=<?php echo $print->id; ?>" class="ord_delete" title="Click To Delete" onclick="return confirm('Are You Sure To Delete ?');">  Delete </a></td> 
                                    </tr>
                                    
                                <?php } 
                            }else{
                            ?>
                            <tr>
                                <td colspan="4">No Record Found.</td>
                            </tr>
                            <?php } 
    }  ?>
      </tbody>
      </table>
   </div>
   </div>
    <script type="text/javascript">
            $(document).ready(function(){ 
                $("#select_all").change(function(){
                    $(".checkboxcheck").prop("checked", $(this).prop("checked"));
                });
            });     
        </script>         