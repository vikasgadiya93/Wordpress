<?php
    /*
    Plugin Name: Subscribe List
    Description: Listing of all subscriber with system.
    Author: ###
    Author URI: ###
    */

    ob_start();


    function my_plugin_create_db() {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'subscribe';

        $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `email` varchar(255) NOT NULL,
        `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
        PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

        require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
        dbDelta( $sql );
    }
   //add_action( 'plugins_loaded', 'my_plugin_create_db' );
      register_activation_hook(__FILE__,'my_plugin_create_db');
    add_action('admin_menu','init_subscriber_plugin');
    function init_subscriber_plugin(){	
        // add_menu_page('Setting', 'Setting', 8, 'vendor_stat_data', 'vendor_stat_data'); 
        add_menu_page('Subscribe List', 'Subscribe List', 8, 'subscriber', 'subscriber');

    }

    function subscriber()
    {
        global $wpdb;
    ?>
    <html>
        <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            <script src="<?php bloginfo('stylesheet_directory'); ?>/js/bootstrap.min.js"></script> 
            <link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/styles/bootstrap.min.css">  

         

            <style>
                body{
                    background-color: #f1f1f1 none repeat scroll 0 0;
                }
                #catgory_name{
                    width: auto;
                    float: left;
                    margin:  0 10px 0px 0;
                }
                #wpwrap > div {
                    /*  background-color: white !important; */
                }
                .th {
                    /* background:#00355f;  */
                    background:#23282d;
                    color: white !important;
                    font-weight:bold !important;
                    border: 1px solid #ccc;
                    padding: 6px;
                    text-align: left;
                    text-transform: uppercase;
                }
                .h3
                {     border-bottom: 1px solid #00234d;
                    color: #00355f;
                    display: block;
                    font-family: "roboto_condensedregular",sans-serif;
                    font-size: 20px;
                    font-weight: 700;
                    line-height: 1.2;
                    margin-bottom: 20px;
                    padding-bottom: 8px;
                    position: relative;
                    text-transform: uppercase;
                }
                label {
                    color: #0a3e66;
                    display: inline-block;
                    font-size: 14px;
                    font-weight: 400;
                }
                input[type='text']{
                    background-color: #ffffff;
                    background-image: none;
                    border: 1px solid #92b3ca;
                    border-radius: 4px;
                    box-shadow: none;
                    color: #202b33;
                    display: block;
                    font-size: 14px;
                    height: 35px;
                    line-height: 1.4;
                    padding: 5px 10px;
                    resize: vertical;
                    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
                    width: 50%;
                }
                select{
                    padding: 0px;
                    background-color: #ffffff;
                    background-image: none;
                    border: 1px solid #92b3ca;
                    border-radius: 4px;
                    box-shadow: none;
                    color: #202b33;
                    display: block;
                    font-size: 14px;
                    height: 35px;
                    line-height: 1.4;
                    padding: 5px 10px;
                    resize: vertical;
                    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
                    width: 100%;
                    height: 35px !important;
                    padding: 0px !important;
                }
                .form-control
                {
                    background-color: #ffffff;
                    background-image: none;
                    border: 1px solid #92b3ca;
                    border-radius: 4px;
                    box-shadow: none;
                    color: #202b33;
                    display: block;
                    font-size: 14px;
                    height: 35px;
                    line-height: 1.4;
                    padding: 5px 10px;
                    resize: vertical;
                    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
                    width: 50%;
                }
                .form-control.start_times {
                    width: 128px;
                }

                .form-control[disabled], fieldset[disabled] .form-control {
                    cursor: not-allowed;
                }
                .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
                    background-color: #eee;
                    opacity: 1;
                }
                .help-block {
                    color: #999999;
                    display: block;
                    font-size: 12px;
                    margin: 5px 0 10px 2px;
                }
                .tabs{
                    font-weight: bold;
                }
                .nav > li > a:focus, .nav > li > a:hover {
                    background-color: #23282D;
                    color: #ffffff;
                    text-decoration: none;
                }
                .btn {
                    -moz-user-select: none;
                    background-image: none;
                    border: 1px solid transparent;
                    cursor: pointer;
                    display: inline-block;
                    font-size: 14px;
                    font-weight: 400;
                    line-height: 1.42857;
                    margin-bottom: 0;
                    padding: 5px 20px;
                    text-align: center;
                    vertical-align: middle;
                    white-space: nowrap;
                }
                .dt-responsive.add_class {
                    width: 100%;
                }
                .table1{
                    margin-left : 0px; 
                    margin-top : 20px;
                }
                .red,.errorAll{
                    color:red;
                }
                .add_class th {
                    padding: 15px 20px;
                    text-align: right;
                    width: 250px;
                }
                .submit{
                    margin:10px 0 0 0;
                }
                .errorAll{
                    display: none;
                }
                .btn-group.m-b-sm {
                    margin: 3px;
                }
                textarea {
                    background-color: #ffffff;
                    background-image: none;
                    border: 1px solid #92b3ca;
                    border-radius: 4px;
                    box-shadow: none;
                    color: #202b33;
                    display: block;
                    font-size: 14px;
                    line-height: 1.4;
                    padding: 5px 10px;
                    resize: vertical;
                    transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
                }

            </style>

        </head> 
        <body>

            <section id="main">
                <div class="wrap">
                    <h1> 
                        Subscriber List
                        <a class="page-title-action" href="<?php echo esc_url( plugins_url() ); ?>/subscribe_settings/export.php">Export to CSV</a>
                    </h1>
                    <form action="" method="post">  
                        <div class="tablenav top" style="margin-top: 10px;">       
                        <select name="delete" id="catgory_name" class="regular-text">
                            <option selected="" value="">Bulk Action</option>
                            <option value="delete">Delete</option>
                        </select>
                        <input type="submit" value="Delete" class="button action" id="submit" name="submit_delete1">
                    </form>
                    <br>
                    <br>
                    <table cellpadding="0" cellspacing="0" id="category_table" class="table table-striped dt-responsive nowrap">
                        <thead>
                            <th class="th"> <input type="checkbox" id="selectall"/>  </th>
                            <th class="th">No.</th>
                            <th class="th">Email Id</th>
                        </thead>
                        <tfoot>
                            <th class="th">  </th>
                            <th class="th">No.</th>
                            <th class="th">Email Id</th>
                        </tfoot>
                        <?php
                            global $wpdb;
                            $tbl_cat_name = "wp_subscribe"; 
                            $pagenum = isset( $_GET['pagenum'] ) ? absint( $_GET['pagenum'] ) : 1;
                            $limit = 10;
                            $user_id = get_current_user_id();

                            $offset = ( $pagenum - 1 ) * $limit;
                            $data ="select * from `$tbl_cat_name` order by id DESC LIMIT $offset, $limit";
                            $data1= $wpdb->get_results($data);

                            $count = 1;
                            $i = 1;
                            $cnt =(($pagenum -1)*$limit)+1; 
                            $class = '';
                            if(!empty($data1))
                            {
                                foreach( $data1 as $print ) 
                                {
                                    $class = ( $count % 2 == 0 ) ? ' class="alternate"' : '' ;
                                ?>
                                <tr <?php echo $class; ?>>
                                    <td> <input type="checkbox" name="checkbox[]" class="checkbox1" id="checkbox1" value="<?php echo $print->id; ?>"/> </td>
                                    <td> <?php echo $i; ?> </td>
                                    <td> <?php echo $print->email; ?> </td>
                                </tr>   
                                <?php 
                                    $count++;     
                                    $i++;     
                                }
                            }
                            else
                            {
                            ?>
                            <tr class="no-items">
                                <td class="colspanchange" colspan="5">No Record Found.</td>
                            </tr>
                            <?php 
                            } 
                        ?>
                    </table>
                    <?php $total_class = $wpdb->get_var( "SELECT COUNT(`id`) FROM wp_subscribe" ); 
                        if($total_class < $limit)
                        {
                            $cnt = $total_class; 
                        }else
                        {
                            $cnt = $limit; 
                        }
                    ?>
                    <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to <?php echo $cnt; ?> of <?php echo $total_class; ?> entries</div>
                    <?php
                        $total = $wpdb->get_var( "SELECT COUNT(`id`) FROM wp_subscribe" );
                        $num_of_pages = ceil( $total / $limit );
                        $page_links = paginate_links( array(
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
            </section>
        </body>
    </html>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){ 
            $("#selectall").change(function(){
                $(".checkbox1").prop("checked", $(this).prop("checked"));
            });
        });     
    </script>
    <?php
    }
?>
<?php
    global $wpdb; 
    $tbl_name ="wp_subscribe"; 
    if(isset($_POST['submit_delete1']))
    {
        $selected_val = $_POST['delete'];
        if($selected_val == delete){
            $cnt = array();
            $cnt = count($_POST['checkbox']);
            for($i=0;$i<$cnt;$i++)
            {
                $del_id = $_POST['checkbox'][$i];
                $wpdb->query("DELETE FROM $tbl_name WHERE id = ".$del_id );   
            }
            echo "<script>alert('Data is Deleted!');</script>"; 
            echo "<script type=text/javascript>";
            echo "location.href='admin.php?page=subscriber'";
            echo "</script>";   
        }else{
            echo "<script type=text/javascript>";
            echo "location.href='admin.php?page=subscriber'";
            echo "</script>";
        }
    }
?>