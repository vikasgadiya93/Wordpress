<html>
    <head>
        <link href="<?php echo get_template_directory_uri(); ?>/admin/admin_style.css" rel="stylesheet" type="text/css">     
     </head>
    <body>
        <div class="wrap">
            <h2>
                <b> Slider </b> 
                <?php  if($_GET['action'] == 'edit'){ ?>
                    <a class="add-new-h2" href="admin.php?page=slider_form&action=slider">Add New</a>
                    <?php }else{ ?>
                    <a class="add-new-h2" id="add_new_slider" href="admin.php?page=slider_form&action=slider">Add New</a>
                    <?php } ?>
            </h2>
        </div> 

        <?php
            // Delete
            if(isset($_REQUEST['deleteId']) && $_REQUEST['deleteId']!='')
            {                 
                global $wpdb;
                $id = $_GET['deleteId'];
                $tbl_name = "wp_slider"; 
                $delete = "delete from $tbl_name where id=".$id;
                // echo $delete;die;               
                $del = $wpdb->query($delete);

                echo "<script type=text/javascript>";
                echo "location.href='admin.php?page=slider'";
                echo "</script>";
            }
        ?>
        <div class="table" style="margin-top: 20px;">       
            <div class="head">
                <table class="wp-list-table widefat fixed posts" cellpadding="0" cellspacing="0" id="table">
                <thead>
                    <tr class="tr">
                        <th class="min">No.</th> 
                        <th class="min">Image </th>
                        <th class="min">Caption </th>
                        <th class="min">Caption Text </th> 
                        <th class="min">URl </th> 
                        <th class="min">Action</th> 
                    </tr>
                </thead>  
            </div>
            <div>
                <tbody>
                    <?php
                        global $wpdb,$table_prefix;;                        
                        $tbl_name = "wp_slider";    
                        $sql = "select * from $tbl_name order by id desc";
                        $result = $wpdb->get_results($sql);
                        if(count($result) > 0)
                        { 
                             $i=1;
                            foreach ( $result as $print )   
                            {
                               
                            ?>   
                            <tr class="body"> 
                                <td><?php echo $i; ?> </td>  
                                <td><img src="<?php echo $print->image; ?>" width="100" height="60" > </td>   
                                
                                <td><?php echo $print->Caption; ?> </td> 
                                 <td><?php  echo $print->Caption2; ?> </td>
                                  <td><?php  echo $print->url; ?> </td>      
                                <td> <a href="admin.php?page=slider_edit&action=edit_ord&id=<?php echo $print->id; ?>" class="ord_edit" title="Click To Edit">Edit</a> | 
                                <a href="admin.php?page=slider&action=delete_ord&deleteId=<?php echo $print->id; ?>" class="ord_delete" title="Click To Delete" onclick="return confirm('Are You Sure To Delete ?');">  Delete </a></td> </tr>
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
                    </table>
                </tbody>
            </div>
        </div>
    </body>
</html>