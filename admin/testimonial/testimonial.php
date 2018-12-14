<?php
    global $wpdb; 
    $tbl_name ="wp_testimonial"; 
    if(isset($_POST['submit']))
    {
        $selected_val = $_POST['delete'];
        if($selected_val == delete){
            //  echo $selected_val ; die(test);
            $cnt=array();
            $cnt=count($_POST['checkbox']);
            //  echo $cnt ; die('vikas');
            for($i=0;$i<$cnt;$i++)
            {
                $del_id = $_POST['checkbox'][$i];
                // echo  $del_id ;die('vikas');
                $wpdb->query("DELETE FROM $tbl_name WHERE id = ".$del_id );   
                //   $wpdb->query("DELETE FROM $table_name WHERE id = ".$del_id );   
            }
            echo "<script>alert('Data is Deleted!');</script>"; 
            echo "<script type=text/javascript>";
            echo "location.href='admin.php?page=testimonial'";
            echo "</script>";   
        }else{
            //  echo $selected_val ; die(test2);
            //   echo "<script>alert('Please Select A option !');</script>"; 
            echo "<script type=text/javascript>";
            echo "location.href='admin.php?page=testimonial'";
            echo "</script>";
        }
    }
?> 
<html>
    <head>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.11.3.min.js" type="text/javascript"></script> 
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->
        <link href="<?php echo get_template_directory_uri(); ?>/admin/admin_style.css" rel="stylesheet" type="text/css">     
    </head>
    <body>
        <div class="wrap">
            <h1 style="width: 50%; float: left;">
                <b> Testimonial </b> 
                <?php  if($_GET['action'] == 'edit'){ ?>
                    <a class="add-new-h2" href="admin.php?page=testimonial_form&action=testimonial">Add New</a>
                    <?php }else{ ?>
                    <a class="add-new-h2" id="add_new_slider" href="admin.php?page=testimonial_form&action=testimonial">Add New</a>
                    <?php } ?>
            </h1> 
                                                                                                                         
        </div> 
        <?php
            // Delete
            if(isset($_REQUEST['deleteId']) && $_REQUEST['deleteId']!='')
            {                 
                global $wpdb;
                $id = $_GET['deleteId'];

                $tbl_name = "wp_testimonial"; 
                $delete = "delete from $tbl_name where id=".$id;
                // echo $delete;die;               
                $del = $wpdb->query($delete);
                echo "<script type=text/javascript>";
                echo "location.href='admin.php?page=testimonial'";
                echo "</script>";
            }       
        ?>
        <form action="" method="post">  
            <div class="tablenav top" style="margin-top: 30px;">       
                <select name="delete" id="catgory_name" class="regular-text">
                    <option selected="" value="">Bulk Action</option>
                    <option value="delete">Delete</option>
                </select>
                <input  type="submit" name="submit" id="delete" value="Apply" class="button action"/>
            </div>   
            <div class="table"  id="result" style="margin-top: 20px;">
                <div id="upper1"></div>
                <div id="upper">       
                    <div class="head"  id="table_table">
                        <table   class="wp-list-table widefat fixed posts" cellpadding="0" cellspacing="0" id="table">
                            <thead>
                                <tr class="tr">
                                    <th class="min"><input style="margin: 0px;" type="checkbox" id="select_all"/></th>
                                    <th class="min">No.</th>
                                    <th class="min">Name </th>
                                    <th class="min">Designation </th>
                                    <th class="min">Description </th> 
                                    <th class="min">Images </th>
                                    <th class="min">Action </th>
                                </tr>
                            </thead>  
                            <tbody >
                                <?php
                                    global $wpdb,$table_prefix;                     
                                    $tbl_name = "wp_testimonial";
                                    $pagenum = isset( $_GET['pagenum'] ) ? absint( $_GET['pagenum'] ) : 1;
                                    $limit = 10;
                                    $user_id = get_current_user_id();
                                    $offset = ( $pagenum - 1 ) * $limit;
                                    if($user_id==1)
                                    {
                                        $sql ="select * from $tbl_name order by id desc LIMIT $offset, $limit";
                                    }else{
                                        $sql ="select * from $tbl_name order by id desc order by id DESC LIMIT $offset, $limit";
                                    }
                                    $count = 1;
                                    $i = (($pagenum-1)*$limit)+1;
                                     // $i = 1;    
                                    $result = $wpdb->get_results($sql);
                                    if(count($result) > 0)
                                    { 
                                        foreach ( $result as $print )   
                                        {
                                        ?>   
                                        <tr class="body" > 
                                            <td><input class="checkboxcheck" name="checkbox[]" type="checkbox" id="checkbox" value="<?php echo $print->id;  ; ?>"/></td>
                                            <!-- <td><input name="checkbox[]" type="checkbox" id="checkbox[]" value="<?php echo $id  ; ?>"/></td>-->
                                            <td><?php echo $i; ?> </td>      
                                            <td><?php echo $print->name; ?> </td>      
                                            <td><?php echo $print->designation; ?> </td>      
                                            <td><?php echo $print->description; ?> </td>      
                                            <td><img src="<?php echo $print->image; ?>" width="100" height="60" > </td>   
                                            <td> <a href="admin.php?page=testimonial_edit&action=edit_ord&id=<?php echo $print->id; ?>" class="ord_edit" title="Click To Edit">Edit</a> | 
                                            <a href="admin.php?page=testimonial&action=delete_ord&deleteId=<?php echo $print->id; ?>" class="ord_delete" title="Click To Delete" onclick="return confirm('Are You Sure To Delete ?');">  Delete </a></td> </tr>
                                        <?php
                                        $i++;
                                        } ?>
                                    <?php
                                    }
                                    else{ 
                                    ?>
                                    <tr>
                                        <td colspan="4">No Record Found.</td>
                                    </tr>
                                    <?php } ?>
                                <?php 
                                    $total_class = $wpdb->get_var( "SELECT COUNT(`id`) FROM $tbl_name" ); 
                                    if($total_class < $limit)
                                    {
                                        $cnt = $total_class; 
                                    }else
                                    {
                                        $cnt = $limit; 
                                    }
                                ?>   
                            </tbody>
                        </table>
                        <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to <?php echo $cnt; ?> of <?php echo $total_class; ?> entries</div>
                        <?php
                            $total = $wpdb->get_var( "SELECT COUNT(`id`) FROM $tbl_name" );
                            $num_of_pages = ceil( $total / $limit );
                            $page_links = paginate_links(array(
                            'base' => add_query_arg( array('pagenum'=>'%#%', 'searchlocation' => $_POST['searchlocation'], 'txtlocation_name' => $_POST['txtlocation_name'], 'view_status' => $_POST['view_status']) ),
                            'format' => '',
                            'prev_text' => __( '&laquo;', 'aag' ),
                            'next_text' => __( '&raquo;', 'aag' ),
                            'total' => $num_of_pages,
                            'current' => $pagenum
                            ) );
                            if( $page_links ) {
                            ?>
                            <?php
                                echo '<div class="tablenav"><div class="tablenav-pages" style="margin: 1em 0; float:left;">' . $page_links . '</div></div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </form>  
         
        
        <script type="text/javascript">
            $(document).ready(function(){ 
                $("#select_all").change(function(){
                    $(".checkboxcheck").prop("checked", $(this).prop("checked"));
                });
            });     
        </script> 
      
    </body>
</html>
