
<?php 

   

    $flag = false;
    if(isset($_POST['submit']))
    { 
        global $wpdb; 
        update_option('site_logo_url', $_POST['site_logo_url']);
        update_option('Header_phone', $_POST['Header_phone']);
        update_option('Header_phone2', $_POST['Header_phone2']);
        update_option('Header_email', $_POST['Header_email']);
        update_option('Header_email1', $_POST['Header_email1']);
        update_option('Header_address', $_POST['Header_address']);
        update_option('Header_tag_line', $_POST['Header_tag_line']);

        update_option('footer_logo_url', $_POST['footer_logo_url']);
        update_option('footer_logo_url1', $_POST['footer_logo_url1']);
        update_option('Agent_no', $_POST['Agent_no']);
        update_option('License_no', $_POST['License_no']);
        update_option('footer_address', $_POST['footer_address']);
        update_option('copyright_text', $_POST['copyright_text']);
        update_option('Footer_fax', $_POST['Footer_fax']);
        update_option('footer_email', $_POST['footer_email']);
        // update_option('footer_contact_address', $_POST['footer_contact_address']);
        update_option('footer_contact_phone', $_POST['footer_contact_phone']);

        update_option('pinterest_url', $_POST['pinterest_url']);      
        update_option('twitter_url', $_POST['twitter_url']);
       // update_option('linkedin_url', $_POST['linkedin_url']);
        update_option('Facebook_url', $_POST['Facebook_url']);
        update_option('google_url', $_POST['google_url']);

        $flag = true; 
    }
?>
<div class="wrap">
    <?php  screen_icon('options-general'); ?><h2>General Settings</h2>
    <?php if($flag){ ?>
        <div class="updated settings-error" id="setting-error-settings_updated"> 
            <p><strong>Settings saved.</strong></p></div> 
        <?php } ?>
    <form action="" method="post">
        <table class="form-table" >
            <tbody >
                <tr valign="top" id="fieldList" >
                    <th scope="row"><label for="site_logo_url"><?php _e("Header Logo URL: "); ?></label></th>
                    <td >
                        <input type="text" class="regular-text" value="<?php echo stripslashes(urldecode(get_option('site_logo_url'))); ?>" id="site_logo_url" name="site_logo_url">
                        <input id="upload_image_button" type="button" value="Upload" class="button" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"> <label for="copyright_text"><?php _e('Header Email!: ') ?></label> </th>
                    <td>
                        <input name="Header_email" type="text" id="Header_email" value="<?php echo get_option('Header_email'); ?>" class="regular-text" />

                        <span class="description"><?php _e('Edit the Header First Email ') ?></span>
                    </td>
                </tr>
                 <tr valign="top">
                    <th scope="row"> <label for="copyright_text"><?php _e('Header Email2: ') ?></label> </th>
                    <td>
                        <input name="Header_email1" type="text" id="Header_email1" value="<?php echo get_option('Header_email1'); ?>" class="regular-text" />

                        <span class="description"><?php _e('Edit the Header Second Email ') ?></span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"> <label for="copyright_text"><?php _e('Header Phone: ') ?></label> </th>
                    <td>
                        <input name="Header_phone" type="text" id="Header_phone" value="<?php echo get_option('Header_phone'); ?>" class="regular-text" />

                        <span class="description"><?php _e('Edit the Header phone number ') ?></span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"> <label for="copyright_text"><?php _e('Header Phone2: ') ?></label> </th>
                    <td>
                        <input name="Header_phone2" type="text" id="Header_phone2" value="<?php echo get_option('Header_phone2'); ?>" class="regular-text" />

                        <span class="description"><?php _e('Edit the Header phone number2 ') ?></span>
                    </td>
                </tr>
                <!-- <input name="Header_address" type="text" id="Header_address" value="<?php echo get_option('Header_address'); ?>" class="regular-text" />-->
            <tr valign="top">
                <th scope="row"> <label for="Header address"><?php _e('Header address: ') ?></label> </th>
                <td>

                <textarea name="Header_address" id="Header_address" class="address regular-text" cols="37" rows="3"><?php echo get_option('Header_address'); ?></textarea>
                <span class="description"><?php _e('Edit the Header address') ?></span>
                </td>
                </tr>    
                <!-- <tr valign="top">
                <th scope="row"> <label for="Header tag line"><?php _e('Header tag line: ') ?></label> </th>
                <td>
                <input name="Header_tag_line" type="text" id="Header_tag_line" value="<?php echo get_option('Header_tag_line'); ?>" class="regular-text" />

                <span class="description"><?php _e('Edit the Header tag line') ?></span>
                </td>
                </tr>    -->
                <tr valign="top">
                    <th colspan="2"> <h1> Footer </h1> </td>
                </tr>
                <tr valign="top" id="fieldList" >
                    <th scope="row"><label for="site_logo_url"><?php _e("Footer Agent Logo URL : "); ?></label></th>
                    <td >
                        <input type="text" class="regular-text" value="<?php echo stripslashes(urldecode(get_option('footer_logo_url'))); ?>" id="footer_logo_url" name="footer_logo_url">
                        <input id="uploaded_image_button" type="button" value="Upload" class="button" />
                    </td>
                </tr>
                 <tr valign="top" id="fieldList" >
                    <th scope="row"><label for="site_logo_url"><?php _e("Footer License Logo URL: "); ?></label></th>
                    <td >
                        <input type="text" class="regular-text" value="<?php echo stripslashes(urldecode(get_option('footer_logo_url1'))); ?>" id="footer_logo_url1" name="footer_logo_url1">
                        <input id="uploaded_image_button1" type="button" value="Upload" class="button" />
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"> <label for="copyright_text"><?php _e('Agent No : ') ?></label> </th>
                    <td>
                        <input name="Agent_no" type="text" id="Agent_no" value="<?php echo get_option('Agent_no'); ?>" class="regular-text" />

                        <span class="description"><?php _e('Edit the Agent No') ?></span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"> <label for="copyright_text"><?php _e('License No : ') ?></label> </th>
                    <td>
                        <input name="License_no" type="text" id="License_no" value="<?php echo get_option('License_no'); ?>" class="regular-text" />

                        <span class="description"><?php _e('Edit the License No') ?></span>
                    </td>
                </tr>
                 <tr valign="top">
                <th scope="row"> <label for="Footer address"><?php _e('footer address: ') ?></label> </th>
                <td>

                <textarea name="footer_address" id="footer_address" class="address regular-text" cols="37" rows="3"><?php echo get_option('footer_address'); ?></textarea>
                <span class="description"><?php _e('Edit the footer address') ?></span>
                </td>
                </tr>    
                <tr valign="top">
                    <th scope="row"> <label for="copyright_text"><?php _e('Footer Fax: ') ?></label> </th>
                    <td>
                        <input name="Footer_fax" type="text" id="Footer_fax" value="<?php echo get_option('Footer_fax'); ?>" class="regular-text" />

                        <span class="description"><?php _e('Edit the Footer fax') ?></span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"> <label for="footer_contact_phone"><?php _e('footer  Phone: ') ?></label> </th>
                    <td>
                        <input name="footer_contact_phone" type="text" id="footer_contact_phone" value="<?php echo get_option('footer_contact_phone'); ?>" class="regular-text" />

                        <span class="description"><?php _e('Edit the footer  phone  ') ?></span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"> <label for="footer_contact_phone"><?php _e('footer  Email: ') ?></label> </th>
                    <td>
                        <input name="footer_email" type="text" id="footer_email" value="<?php echo get_option('footer_email'); ?>" class="regular-text" />

                        <span class="description"><?php _e('Edit the Footer  Email  ') ?></span>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"> <label for="copyright_text"><?php _e('Copyright Text: ') ?></label> </th>
                    <td>
                        <input name="copyright_text" type="text" id="copyright_text" value="<?php echo get_option('copyright_text'); ?>" class="regular-text" />

                        <span class="description"><?php _e('Edit the Copy right text') ?></span>
                    </td>
                </tr>
                <!--<input name="footer_contact_address" type="text" id="footer_contact_address" value="<?php echo get_option('footer_contact_address'); ?>" class="regular-text" />-->
                <!--<tr valign="top">
                <th scope="row"> <label for="footer_contact_address"><?php _e('footer contact address: ') ?></label> </th>
                <td>
                <textarea name="footer_contact_address" id="footer_contact_address" class="address regular-text" cols="37" rows="3"><?php echo get_option('footer_contact_address'); ?></textarea>
                <span class="description"><?php _e('Edit the footer contatc address ') ?></span>
                </td>
                </tr>-->

                <tr valign="top">
                    <th colspan="2"> <h1> Social Links </h1> </td>
                </tr>
                <tr valign="top">
                    <th scope="row"> <label for="Facebook_url"><?php _e('Facebook Url: ') ?></label> </th>
                    <td>
                        <input name="Facebook_url" type="text" id="Facebook_url" value="<?php echo get_option('Facebook_url'); ?>" class="regular-text" />

                        <span class="description"><?php _e('Edit the facebool Url') ?></span>
                    </td>
                </tr>

                <tr valign="top">
                    <th scope="row"> <label for="twitter_url"><?php _e('Twitter Url: ') ?></label> </th>
                    <td>
                        <input name="twitter_url" type="text" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" class="regular-text" />

                        <span class="description"><?php _e('Edit the twitter url') ?></span>
                    </td>
                </tr>
               <!-- <tr valign="top">
                    <th scope="row"> <label for="linkedin_url"><?php _e('linked in Url: ') ?></label> </th>
                    <td>
                        <input name="linkedin_url" type="text" id="linkedin_url" value="<?php echo get_option('linkedin_url'); ?>" class="regular-text" />

                        <span class="description"><?php _e('Edit the linkedin url') ?></span>
                    </td>
                </tr>    -->
                <tr valign="top">
                    <th scope="row"> <label for="pinterest_url"><?php _e('pinterest Url: ') ?></label> </th>
                    <td>
                        <input name="pinterest_url" type="text" id="pinterest_url" value="<?php echo get_option('pinterest_url'); ?>" class="regular-text" />

                        <span class="description"><?php _e('Edit the Pinterest url') ?></span>
                    </td>
                </tr>

                <tr valign="top">
                <th scope="row"> <label for="google_url"><?php _e('Google Plus in Url: ') ?></label> </th>
                <td>
                <input name="google_url" type="text" id="google_url" value="<?php echo get_option('google_url'); ?>" class="regular-text" />

                <span class="description"><?php _e('Edit the google+ url') ?></span>
                </td>
                </tr> 
            </tbody>
        </table>
        <p class="submit">
            <input type="submit" value="Save Changes" class="button-primary" id="submit" name="submit">
        </p>
    </form>
</div>

<script language="JavaScript">
    jQuery(document).ready(function() {
        jQuery('#upload_image_button').click(function() {
            var original_send_to_editor = window.send_to_editor;
            formfield = jQuery('#site_logo_url').attr('name');
            tb_show('', 'media-upload.php?type=image&TB_iframe=true');

            window.send_to_editor = function(html_val) {

                if(jQuery(html_val).attr('src')) {
                    imgurl = jQuery(html_val).attr('src');
                }
                else {
                    imgurl = jQuery(html_val).attr('href');
                }

                jQuery('#site_logo_url').val(imgurl);
                tb_remove();
                window.send_to_editor = original_send_to_editor;
            }
            return false;
        });        

    });
</script>

<script language="JavaScript">
    jQuery(document).ready(function() {
        jQuery('#uploaded_image_button').click(function() {
            var original_send_to_editor = window.send_to_editor;
            formfield = jQuery('#footer_logo_url').attr('name');
            tb_show('', 'media-upload.php?type=image&TB_iframe=true');

            window.send_to_editor = function(html_val) {

                if(jQuery(html_val).attr('src')) {
                    imgurl = jQuery(html_val).attr('src');
                }
                else {
                    imgurl = jQuery(html_val).attr('href');
                }

                jQuery('#footer_logo_url').val(imgurl);
                tb_remove();
                window.send_to_editor = original_send_to_editor;
            }
            return false;
        });        

    });
</script>
<script language="JavaScript">
    jQuery(document).ready(function() {
        jQuery('#uploaded_image_button1').click(function() {
            var original_send_to_editor = window.send_to_editor;
            formfield = jQuery('#footer_logo_url1').attr('name');
            tb_show('', 'media-upload.php?type=image&TB_iframe=true');

            window.send_to_editor = function(html_val) {

                if(jQuery(html_val).attr('src')) {
                    imgurl = jQuery(html_val).attr('src');
                }
                else {
                    imgurl = jQuery(html_val).attr('href');
                }

                jQuery('#footer_logo_url1').val(imgurl);
                tb_remove();
                window.send_to_editor = original_send_to_editor;
            }
            return false;
        });        

    });
</script>     
