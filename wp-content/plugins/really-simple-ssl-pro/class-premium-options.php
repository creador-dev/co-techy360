<?php
defined('ABSPATH') or die("you do not have access to this page!");
class rsssl_premium_options {
  private static $_this;
  //enter previous version
  private $required_version = "2.5.12";
  public $has_http_redirect=false;

function __construct() {
  if ( isset( self::$_this ) )
      wp_die( sprintf( __( '%s is a singleton class and you cannot create a second instance.','really-simple-ssl-pro' ), get_class( $this ) ) );

  self::$_this = $this;


  add_action('plugins_loaded', array(&$this, 'load_translation'), 20);

  add_action("update_option_rlrsssl_options", array($this, "update_hsts_no_apache"), 10,3);
  add_action("update_option_rlrsssl_options", array($this, "insert_hsts_header_in_htaccess"), 20,3);
  add_action("update_option_rlrsssl_options", array($this, "insert_upgrade_insecure_content_header_in_htaccess"), 20,3);

  add_action("update_option_rlrsssl_options", array($this, "maybe_clear_certificate_check_schedule"), 30,3);

  //Action for the NGINX notice
  add_action("update_option_rlrsssl_options", array($this, "maybe_update_nginx_notice_option_hsts"), 20, 3);
  add_action("update_option_rsssl_hsts_preload", array($this, "maybe_update_nginx_notice_option_hsts_preload"), 20, 3);
  //add_action('admin_init', array($this, 'add_hsts_option'),50);
  add_action('wp_loaded', array($this, 'admin_mixed_content_fixer'), 1);

  add_action('admin_init', array($this, 'check_http_redirect'), 1);
  add_action('admin_init', array($this, 'change_notices_free'), 5);

  add_action('admin_init', array($this, 'add_pro_settings'),60);
  add_action('admin_init', array($this, 'insert_secure_cookie_settings'), 70);

  add_action("admin_notices", array($this, 'show_notice_wpconfig_not_writable'));
  add_action("admin_notices", array($this, 'show_nginx_hsts_notice'), 20);
  add_action("admin_notices", array($this, 'show_notice_redirect_to_http'), 30);

  //Necessary to dismiss the nginx notice
  add_action('admin_print_footer_scripts', array($this, 'insert_nginx_dismiss_success'));
  add_action('wp_ajax_dismiss_success_message_nginx', array($this,'dismiss_nginx_message_callback') );

  //add_action('admin_init', array($this, 'add_pro_settings'),60);
  $plugin = rsssl_pro_plugin ;
  add_filter("plugin_action_links_$plugin", array($this,'plugin_settings_link'));

  register_deactivation_hook(rsssl_pro_plugin_file, array($this,'deactivate') );

}

static function this() {
  return self::$_this;
}

public function check_http_redirect(){
    if (!RSSSL()->really_simple_ssl->ssl_enabled) {
        $this->has_http_redirect = $this->has_redirect_to_http();
    } else {
        $this->has_http_redirect = false;
    }
}

public function deactivate(){
  $this->remove_HSTS();
  $this->remove_upgrade_insecure_content_header();
  $this->remove_secure_cookie_settings();
}

public function load_translation() {
    $success = load_plugin_textdomain('really-simple-ssl-pro', FALSE, dirname(plugin_basename(__FILE__)).'/languages/');
}

public function change_notices_free(){

    //  remove_action("admin_notices", array(RSSSL()->really_simple_ssl, "show_notice_activate_ssl"), 10);
  remove_action('rsssl_configuration_page', array(RSSSL()->really_simple_ssl, 'configuration_page_more'),10);
  remove_action('rsssl_activation_notice_inner', array(RSSSL()->really_simple_ssl, 'show_pro'), 40);

  if (!RSSSL()->really_simple_ssl->ssl_enabled && $this->has_http_redirect){
      remove_action('rsssl_activation_notice_inner', array(RSSSL()->really_simple_ssl, 'show_enable_ssl_button'), 50);
  }

  add_action('rsssl_configuration_page', array($this, 'configuration_page_more'), 10);
  add_action('rsssl_activation_notice_inner' , array($this, 'show_scan_buttons_before_activation'), 40);
}

/*
    Activate the mixed content fixer on the admin when enabled.
*/

public function admin_mixed_content_fixer(){

  $admin_mixed_content_fixer = get_option("rsssl_admin_mixed_content_fixer");
  if (is_multisite() && RSSSL()->rsssl_multisite->mixed_content_admin) {
    $admin_mixed_content_fixer = true;
  }

  if (is_admin() && is_ssl() && $admin_mixed_content_fixer) {
    RSSSL()->rsssl_mixed_content_fixer->fix_mixed_content();
  }

}

public function options_validate($input){
  if ($input==1){
    $validated_input = 1;
  }else{
    $validated_input = "";
  }
  return $validated_input;

}

    /**
     *
     * Checks if a redirect to http:// is active to prevent redirect loop issues
     * Since 2.0.20
     * @access public
     *
     */

public function has_redirect_to_http()
    {
        //run this function only once
        $detected_redirect = get_option('rsssl_redirect_to_http_check');
        $force_check = false;

        //but if the user explicitly rechecks, run it again.
        if (isset($_POST['rsssl-check-redirect'])) $force_check = true;

        if ($force_check || !$detected_redirect){
            //make sure this redirect check only happens once by immediately setting a value
            update_option('rsssl_redirect_to_http_check', 'https');
            $url = site_url();
            if (!function_exists('curl_init')) {
                return false;
            }

            //CURLOPT_FOLLOWLOCATION might cause issues on php<5.4
            if (version_compare(PHP_VERSION, '5.4') < 0) {
                return false;
            }

            //Change the http:// domain to https:// to test for a possible redirect back to http://.
            $url = str_replace("http://", "https://", $url);

            //Follow the entire redirect chain.
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_NOBODY, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // follow redirects
            curl_setopt($ch, CURLOPT_AUTOREFERER, 1); // set referer on redirect
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
            curl_setopt($ch, CURLOPT_TIMEOUT, 3); //timeout in seconds
            curl_exec($ch);
            //$target is the endpoint of the redirect chain
            $target = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
            curl_close($ch);

            //Check for http:// needle in target
            $http_needle = 'http://';

            $pos = strpos($target, $http_needle);

            if ($pos !== false) {
                //There is a redirect back to HTTP.
                $detected_redirect = 'http';
            } else {
                $detected_redirect = 'https';
            }
            update_option('rsssl_redirect_to_http_check', $detected_redirect);
        }

        if ($detected_redirect === 'http') {
            return true;
        } else {
            return false;
        }

    }


public function show_notice_redirect_to_http()
    {
        //prevent showing the review on edit screen, as gutenberg removes the class which makes it editable.
        $screen = get_current_screen();
        if ( $screen->parent_base === 'edit' ) return;

        if (!RSSSL()->really_simple_ssl->ssl_enabled && $this->has_http_redirect && !defined('rsssl_pp_version')) {

            $link_open = '<a target="_blank" href="https://really-simple-ssl.com/knowledge-base/my-website-is-in-a-redirect-loop/">';
            $link_close = '</a>';

            ?>
            <div id="warning" class="notice notice-error">
                <p>
                    <?php printf(__("Really Simple SSL has detected a redirect to HTTP. This can result in a redirect loop when activating SSL. See %sour article on redirect loops%s for the most common causes of a redirect back to http://. We strongly recommend to locate and disable this redirect before activating SSL.", "really-simple-ssl-pro"), $link_open, $link_close);

                    ?>
                    <form action="" method="POST">
                        <input type="submit" class="button" name="rsssl-check-redirect" value="<?php _e("Re-check the redirect","complianz")?>">
                    </form>
                </p>

            </div>
            <?php
        }
    }


/*
    if the server is not apache, we set the HSTS in another way.
*/

public function update_hsts_no_apache($oldvalue, $newvalue, $option){

  if (!is_admin()) return;
  if (!current_user_can("activate_plugins")) return;
  if (!function_exists('RSSSL')) return;

  $options = $newvalue;
  $hsts = isset($options['hsts']) ? $options['hsts'] : FALSE;

  $hsts_no_apache = false;
  $not_using_htaccess = (!is_writable(RSSSL()->really_simple_ssl->ABSpath.".htaccess") || RSSSL()->really_simple_ssl->do_not_edit_htaccess) ? true : false;

  if (class_exists("rsssl_server")) {
    $apache = (RSSSL()->rsssl_server->get_server()=="apache");
    $contains_hsts = RSSSL()->really_simple_ssl->contains_hsts();
    if ($hsts && (!$apache || ($apache && $not_using_htaccess && !$contains_hsts ))) {
      $hsts_no_apache = true;
    } else {
      $hsts_no_apache = false;
    }
  }

  $hsts_no_apache = apply_filters("rsssl_hsts_no_apache", $hsts_no_apache);

  update_option("rsssl_hsts_no_apache", $hsts_no_apache);
}

/*
* Show a notice on HSTS when NGINX is used as a webserver
*/

public function show_nginx_hsts_notice() {
    //prevent showing the review on edit screen, as gutenberg removes the class which makes it editable.
    $screen = get_current_screen();
    if ( $screen->parent_base === 'edit' ) return;

  if( !is_multisite() ) {
    if (RSSSL()->rsssl_server->get_server() === 'nginx' && !get_site_option("rsssl_nginx_message_shown")) {
      if (!RSSSL()->really_simple_ssl->hsts && !get_option('rsssl_hsts_preload')) return;
      ?>
        <div id="message" class="notice updated is-dismissible">
          <p>
            <?php _e("Really Simple SSL has detected NGINX as webserver. The HSTS header is set using PHP which can cause issues with caching. To enable HSTS directly in NGINX add the following line to the NGINX server block within your NGINX configuration:"); ?> <br> <br>
            <?php if ((RSSSL()->really_simple_ssl->hsts) && (!get_option('rsssl_hsts_preload'))) { ?>
                <code>add_header Strict-Transport-Security: max-age=31536000</code> <br> <br>
            <?php }
                 if (get_option('rsssl_hsts_preload')) { ?>
                <code>add_header Strict-Transport-Security "max-age=31536000; includeSubDomains" always;</code> <br> <br>
            <?php }
              $link_start ='<a target="_blank" href="https://www.nginx.com/blog/http-strict-transport-security-hsts-and-nginx">';
              $link_close = "</a> ";
              echo sprintf(__("For more information about NGINX and HSTS see %sHTTP Strict Transport Security and NGINX%s", "really-simple-ssl-pro"),$link_start, $link_close );
              ?>
          </p>
       </div>
       <?php
     }
   }
}

/*
* Maybe clear the option value for the NGINX notice when the option value has changed
*
*/

public function maybe_update_nginx_notice_option_hsts($oldvalue, $newvalue, $option) {

    $hsts_new = isset($newvalue['hsts']) ? $newvalue['hsts'] : FALSE;
    $hsts_old = isset($oldvalue['hsts']) ? $oldvalue['hsts'] : FALSE;

    if ($hsts_new!=$hsts_old) update_site_option("rsssl_nginx_message_shown", false);
}

public function maybe_update_nginx_notice_option_hsts_preload($oldvalue, $newvalue, $option) {

    $hsts_new = isset($newvalue['rsssl_hsts_preload']) ? $newvalue['rsssl_hsts_preload'] : FALSE;
    $hsts_old = isset($oldvalue['rsssl_hsts_preload']) ? $oldvalue['rsssl_hsts_preload'] : FALSE;

    if ($hsts_new!=$hsts_old) update_site_option("rsssl_nginx_message_shown", false);
}

/*
*     Check if PHP headers are used to set HSTS
*      @param void
*      @return boolean
*
**/

public function uses_php_header_for_hsts(){
  return get_option("rsssl_hsts_no_apache");
}

public function add_pro_settings(){
    if (!class_exists('REALLY_SIMPLE_SSL')) return;

    //for pro users who do not have the multisite plugin but use multisite, we hide preload, as testing for subdomains migth be tricky
    if( !is_multisite() || (is_multisite() && RSSSL()->rsssl_multisite->ssl_enabled_networkwide) ) {
        add_settings_field('id_hsts', __("Turn HTTP Strict Transport Security on","really-simple-ssl-pro"), array($this,'get_option_hsts'), 'rlrsssl', 'rlrsssl_settings');

        if(RSSSL()->really_simple_ssl->hsts) {
            register_setting( 'rlrsssl_options', 'rsssl_hsts_preload', array($this,'options_validate') );
            add_settings_field('id_hsts_preload', __("Configure your site for the HSTS preload list","really-simple-ssl-pro"), array($this,'get_option_hsts_preload'), 'rlrsssl', 'rlrsssl_settings');
        }
    }

    //add_settings_section('section_rssslpp', __("Pro", "really-simple-ssl-pro"), array($this, "section_text"), 'rlrsssl');
    register_setting( 'rlrsssl_options', 'rsssl_admin_mixed_content_fixer', array($this,'options_validate') );
    register_setting( 'rlrsssl_options', 'rsssl_cert_expiration_warning', array($this,'options_validate') );
    register_setting( 'rlrsssl_options', 'rsssl_upgrade_insecure_requests_header', array($this,'options_validate') );

    add_settings_field('id_cert_expiration_warning', __("Receive an email when your certificate is about to expire","really-simple-ssl-pro"), array($this,'get_option_cert_expiration_warning'), 'rlrsssl', 'rlrsssl_settings');

    if (!defined('rsssl_pp_version'))
        add_settings_field('id_upgrade_insecure_requests_header', __("Add header to force insecure requests over https","really-simple-ssl-pro"), array($this,'get_option_upgrade_insecure_requests_header'), 'rlrsssl', 'rlrsssl_settings');

    add_settings_field('id_admin_mixed_content_fixer', __("Enable the mixed content fixer on the WordPress back-end","really-simple-ssl-pro"), array($this,'get_option_admin_mixed_content_fixer'), 'rlrsssl', 'rlrsssl_settings');

}

public function configuration_page_more() {

    if (!class_exists('REALLY_SIMPLE_SSL')) return;
    if (defined('rsssl_pp_version')) return;
    ?><table class="really-simple-ssl-table"><?php

    if (is_ssl() && get_option('rsssl_cert_expiration_warning') || (is_multisite() && RSSSL()->rsssl_multisite->cert_expiration_warning)) {

      $expiring  = rsssl_pro_almost_expired();
      $nice_date = rsssl_pro_expiration_date_nice();

      ?>
          <tr>
            <td>
              <?php echo ($expiring) ? RSSSL()->really_simple_ssl->img("error") : RSSSL()->really_simple_ssl->img("success");?>
            </td>
            <td>
            <?php if ($expiring) {?>
              <?php echo __("Your certificate needs to be renewed soon, it is valid to: ","really-simple-ssl-pro").$nice_date;?>
            <?php } else { ?>
              <?php echo __("Your certificate is valid to: ","really-simple-ssl-pro").$nice_date;?>
            <?php } ?>
              <?php echo __("(date updated once a week)","really-simple-ssl-pro");?>
            </td>
          </tr>
    <?php } ?>

    <tr>
      <td>
        <?php echo RSSSL()->really_simple_ssl->contains_hsts() ? RSSSL()->really_simple_ssl->img("success") : RSSSL()->really_simple_ssl->img("warning");?>
      </td>
      <td>
      <?php
        if(RSSSL()->really_simple_ssl->contains_hsts()) {
           _e("HTTP Strict Transport Security was set. ","really-simple-ssl-pro");
        }  elseif($this->uses_php_header_for_hsts()) {
            $link_start ='<a href="https://really-simple-ssl.com/knowledge-base/inserting-hsts-header-using-php/" target="_blank">';
            $link_close = "</a> ";
            echo sprintf(__("HTTP Strict Transport Security was set, but with PHP headers, %swhich might cause issues in combination in combination with caching.%s ", "really-simple-ssl-pro"),$link_start, $link_close );
        } else {
            $link_start ='<a href="https://en.wikipedia.org/wiki/HTTP_Strict_Transport_Security" target="_blank">';
            $link_close = "</a> ";
            echo sprintf(__("%sHTTP Strict Transport Security%s is not enabled ", "really-simple-ssl-pro"),$link_start, $link_close );
            ?>
           <a href="<?php echo admin_url('options-general.php?page=rlrsssl_really_simple_ssl&tab=settings');?>"><?php _e("Enable HSTS.","really-simple-ssl-pro");?></a>
           <?php
        }
      ?>
    </td>
  </tr>
  <?php
  $preload_enabled = get_option('rsssl_hsts_preload');
  if(RSSSL()->really_simple_ssl->hsts) {?>
    <tr>
      <td>
        <?php echo $preload_enabled ? RSSSL()->really_simple_ssl->img("success") :"-";?>
      </td>
      <td>
      <?php
        if($preload_enabled) {
            $link_start ='<a target="_blank" href="https://hstspreload.appspot.com/?domain='.$this->non_www_domain().'">';
            $link_close = "</a> ";
            echo sprintf(__("Your site has been configured for the HSTS preload list. If you have submitted your site, it will be preloaded. Click %shere%s to submit.", "really-simple-ssl-pro"),$link_start, $link_close );
            } else {
            $link_start ='<a target="_blank" href="https://hstspreload.appspot.com/?domain='.$this->non_www_domain().'">';
            $link_close = "</a> ";
            echo sprintf(__("Your site is not yet configured for the %sHSTS preload list.%s Read the documentation carefully before you do! ", "really-simple-ssl-pro"),$link_start, $link_close );
            }
        ?>
      </td>
    </tr>
<?php } ?>

<?php

/*
      httponly configuration

*/
?>
<?php
if (!is_multisite() || (is_multisite() && RSSSL()->rsssl_multisite->ssl_enabled_networkwide) ) { ?>
<tr>
  <td>
    <?php echo $this->contains_secure_cookie_settings() ? RSSSL()->really_simple_ssl->img("success") : RSSSL()->really_simple_ssl->img("warning");?>
  </td>
  <td>
    <?php
        if ($this->contains_secure_cookie_settings()) {
          _e("Secure cookies set","really-simple-ssl")."&nbsp;";
        } else {
          _e('Secure cookie settings not enabled.',"really-simple-ssl");
        }
      ?>
    </td>
</tr>
<?php
}

    /*  Display the current settings for the admin mixed content. */
    $admin_mixed_content_fixer = get_option("rsssl_admin_mixed_content_fixer");
  ?>
  <tr>
    <td><?php echo $admin_mixed_content_fixer ? RSSSL()->really_simple_ssl->img("success") :"-";?></td>
    <td>
    <?php if ($admin_mixed_content_fixer){
      _e("You have the mixed content fixer activated on your admin panel.","really-simple-ssl-pro");
    } else{
      _e("The mixed content fixer is not active on the admin panel. Enable this feature only when you have mixed content on the admin panel.","really-simple-ssl-pro");
     }?>
    </td>
  </tr>
  </table>
    <?php
}

  /**
   * Insert option into settings form
   * @since  1.0.3
   *
   * @access public
   *
   */

  public function get_option_hsts() {

      ?>
      <label class="rsssl-switch">
          <input id="rlrsssl_options" name="rlrsssl_options[hsts]" size="40" value="1"
                 type="checkbox" <?php checked(1, RSSSL()->really_simple_ssl->hsts, true) ?> />
          <span class="rsssl-slider rsssl-round"></span>
      </label>
      <?php
      RSSSL()->rsssl_help->get_help_tip(__("HSTS, HTTP Strict Transport Security improves your security by forcing all your visitors to go to the SSL version of your website for at least a year.", "really-simple-ssl")." ".__("It is recommended to enable this feature as soon as your site is running smoothly on SSL, as it improves your security.", "really-simple-ssl"));
  }


  /*
   * This header ensures that even remote content will be forced over https by the server.
   *
   *
   * */

    public function get_option_upgrade_insecure_requests_header() {

        $upgrade_insecure_requests_header = get_option('rsssl_upgrade_insecure_requests_header', true);
        $disabled = "";
        $comment = "";

        if (RSSSL()->really_simple_ssl->do_not_edit_htaccess || !is_writable(RSSSL()->really_simple_ssl->ABSpath.".htaccess")){
            $disabled = "disabled";
            $upgrade_insecure_requests_header = false;
            $comment = __( "The .htaccess file is not writable. Give 644 writing permissions to enable this option.", "really-simple-ssl" );
        }

        if(is_multisite() && !RSSSL()->rsssl_multisite->ssl_enabled_networkwide){
            $disabled = "disabled";
            $upgrade_insecure_requests_header = false;
            $comment = __( "This option is only available if all sites on the network are on SSL.", "really-simple-ssl" );
        }

        //actual .htaccess file contents overrides all
        if ($this->contains_upgrade_insecure_content_header()){
            $upgrade_insecure_requests_header = true;
        }

        ?>
        <label class="rsssl-switch">
            <input id="rlrsssl_options" name="rsssl_upgrade_insecure_requests_header" size="40" value="1"
                   type="checkbox" <?php checked(1, $upgrade_insecure_requests_header, true) ?> />
            <span class="rsssl-slider rsssl-round"></span>
        </label>
        <?php

        RSSSL()->rsssl_help->get_help_tip(
            __("Disable this option if you need certain requests over http, and use the mixed content fixer filter to exclude certain requests from the mixed content filter.", "really-simple-ssl-pro")
        );
        echo $comment;
    }

  public function get_option_cert_expiration_warning() {

    $cert_expiration_warning = get_option('rsssl_cert_expiration_warning');
    $disabled = "";
    $comment = "";
    if (is_multisite() && RSSSL()->rsssl_multisite->cert_expiration_warning) {
      $disabled = "disabled";
      $cert_expiration_warning = TRUE;
      $comment = __( "This option is enabled on the network menu.", "really-simple-ssl" );
    }

      ?>
      <label class="rsssl-switch">
          <input id="rlrsssl_options" name="rsssl_cert_expiration_warning" size="40" value="1"
                 type="checkbox" <?php checked(1, $cert_expiration_warning, true) ?> />
          <span class="rsssl-slider rsssl-round"></span>
      </label>
      <?php

    RSSSL()->rsssl_help->get_help_tip(
        __("If your hosting company renews the certificate for you, you probably don't need to enable this setting.", "really-simple-ssl-pro")." ".
        __("If your certificate expires, your site goes offline. Uptime robots don't alert you when this happens.", "really-simple-ssl-pro")." ".
        __("If you enable this option you will receive an email when your certificate is about to expire within 2 weeks.", "really-simple-ssl-pro")
    );
    echo $comment;
  }

  public function get_option_admin_mixed_content_fixer() {
    $admin_mixed_content_fixer = get_option('rsssl_admin_mixed_content_fixer');
    $disabled = "";
    $comment = "";

    if (is_multisite() && RSSSL()->rsssl_multisite->mixed_content_admin) {
      $disabled = "disabled";
      $admin_mixed_content_fixer = TRUE;
      $comment = __( "This option is enabled on the network menu.", "really-simple-ssl" );
    }

      ?>
      <label class="rsssl-switch">
          <input id="rlrsssl_options" name="rsssl_admin_mixed_content_fixer" size="40" value="1"
                 type="checkbox" <?php checked(1, $admin_mixed_content_fixer, true) ?> />
          <span class="rsssl-slider rsssl-round"></span>
      </label>
      <?php
      RSSSL()->rsssl_help->get_help_tip(__("Use this option if you do not have the green lock in the WordPress admin.", "really-simple-ssl-pro"));
      echo $comment;
  }


  public function get_option_hsts_preload() {
    $enabled = get_option('rsssl_hsts_preload');

      ?>
      <label class="rsssl-switch">
          <input id="rlrsssl_options" name="rsssl_hsts_preload" size="40" value="1"
                 type="checkbox" <?php checked(1, $enabled, true) ?> />
          <span class="rsssl-slider rsssl-round"></span>
      </label>
      <?php
      RSSSL()->rsssl_help->get_help_tip(
        __("The preload list offers even more security, as browsers already will know to load your site over SSL before a user ever visits it. This is very hard to undo!", "really-simple-ssl-pro")." ".
        __("Please note that all subdomains, and both www and non-www domain need to be https!", "really-simple-ssl-pro")." ".
        __('Before submitting, please read the information on hstspreload.appspot.com', "really-simple-ssl-pro")
    );
    $link_start ='<a target="_blank" href="https://hstspreload.appspot.com/?domain='.$this->non_www_domain().'">';
    $link_close = "</a> ";
    echo sprintf(__("After enabling this option, you have to %ssubmit%s your site", "really-simple-ssl-pro"),$link_start, $link_close );


  }



  /*

    Get the non www domain.

  */

  public function non_www_domain(){
    $domain = get_home_url();
    $domain = str_replace(array("https://", "http://", "https://www.", "http://www.", "www."), "", $domain);
    return $domain;
  }


/**
 * Add settings link on plugins overview page
 *
 * @since  1.0.27
 *
 * @access public
 *
 */

public function plugin_settings_link($links) {

  $settings_link = '<a href="options-general.php?page=rlrsssl_really_simple_ssl">'.__("Settings","really-simple-ssl").'</a>';
  array_unshift($links, $settings_link);
  return $links;

}

/*

    Replace the generic redirect with a redirect to the homeurl, so it will always redirect directly to
    the homeurl, not using to redirects

    As it redirects hardcoded to the home_url, thus including www or not www, this is not suitable for multisite.

*/


// public function htaccess_bypass_redirect($rule){
//
//   if (!is_multisite()) {
//     $parse_url = parse_url(home_url());
//     $host = $parse_url["host"];
//     $current_redirect = "RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI}";
//     $bypass_redirect = "RewriteRule ^(.*)$ https://". $host ."%{REQUEST_URI}";
//     $rule = str_replace($current_redirect, $bypass_redirect, $rule);
//   }
//
//   return $rule;
// }

public function insert_hsts_header_in_htaccess($oldvalue, $newvalue, $option){

    // if (!RSSSL()->test_htaccess_redirect) return;

    if (!current_user_can("activate_plugins")) return;

    //does it exist?
    if (!file_exists(RSSSL()->really_simple_ssl->ABSpath.".htaccess")) return;

    //check if editing is blocked.
    if (RSSSL()->really_simple_ssl->do_not_edit_htaccess) return;

    $hsts = RSSSL()->really_simple_ssl->hsts;

    //on multisite, always use the network setting.
    if (is_multisite()) {
      $hsts = RSSSL()->rsssl_multisite->hsts;

      //but, if ONE of the sites has HSTS enabled, we assume we want it enabled.
      if (!$hsts) {
        $sites = RSSSL()->really_simple_ssl->get_sites_bw_compatible();
    		foreach ( $sites as $site ) {
    			RSSSL()->really_simple_ssl->switch_to_blog_bw_compatible($site);
  			  if (RSSSL()->really_simple_ssl->hsts) {
            $hsts = true;
            restore_current_blog();
            break;
          }
          restore_current_blog(); //switches back to previous blog, not current, so we have to do it each loop
        }
      }
    }

    $htaccess = file_get_contents(RSSSL()->really_simple_ssl->ABSpath.".htaccess");
    if (!is_writable(RSSSL()->really_simple_ssl->ABSpath.".htaccess")) return;

    //remove current rules from file, if any.
    $htaccess = preg_replace("/#\s?BEGIN\s?Really_Simple_SSL_HSTS.*?#\s?END\s?Really_Simple_SSL_HSTS/s", "", $htaccess);
    $htaccess = preg_replace("/\n+/","\n", $htaccess);
    $rule = "";

    if ($hsts) {

      $hsts_preload = get_option("rsssl_hsts_preload");

      //owasp security best practice https://www.owasp.org/index.php/HTTP_Strict_Transport_Security
      $rule = "\n"."# BEGIN Really_Simple_SSL_HSTS"."\n";
      $rule .= "<IfModule mod_headers.c>"."\n";
      if ($hsts_preload){
        $rule .= 'Header always set Strict-Transport-Security: "max-age=63072000; includeSubDomains; preload" env=HTTPS'."\n";
      } else {
        $rule .= 'Header always set Strict-Transport-Security: "max-age=31536000" env=HTTPS'."\n";
      }
      $rule .= "</IfModule>"."\n";
      $rule .= "# END Really_Simple_SSL_HSTS"."\n";
      $rule = preg_replace("/\n+/","\n", $rule);
    }

    $wptag = "# BEGIN WordPress";
    if (strpos($htaccess, $wptag)!==false) {
        $htaccess = str_replace($wptag, $rule.$wptag, $htaccess);
    } else {
        $htaccess = $htaccess.$rule;
    }

    file_put_contents(RSSSL()->really_simple_ssl->ABSpath.".htaccess", $htaccess);

}

    public function show_scan_buttons_before_activation()
    {
        //prevent showing the review on edit screen, as gutenberg removes the class which makes it editable.
        $screen = get_current_screen();
        if ( $screen->parent_base === 'edit' ) return;

        $result = RSSSL_PRO()->rsssl_scan->scan_completed_no_errors();

        if ($result == "COMPLETED") { ?>
            <div class="rsssl-scan-text-in-activate-notice"><?php _e("You finished a scan without errors.", "really-simple-ssl-pro") ?></div>
        <?php } elseif ($result == "NEVER") { ?>
            <div class="rsssl-scan-text-in-activate-notice">
                <p>
                    <?php
                    $link_start = '<a href="options-general.php?page=rlrsssl_really_simple_ssl&tab=scan">';
                    $link_close = "</a> ";
                    echo sprintf(__("No scan completed yet. Before migrating to SSL, you should do a %sscan%s", "really-simple-ssl-pro"), $link_start, $link_close);
                    ?>
                </p>
            </div>
        <?php } else { ?>
            <div class="rsssl-scan-text-in-activate-notice">
                <p><?php _e("Previous scan completed with issues", "really-simple-ssl-pro"); ?></p>
            </div>
        <?php } ?>

        <div class="rsssl-scan-button">
        <form action="" method="post">
        <?php

        if ($result != "NEVER") {
            $link_start = '<a href="options-general.php?page=rlrsssl_really_simple_ssl&tab=scan" class="button button-primary">';
            $link_close = "</a> ";
            echo sprintf(__("%sScan again%s", "really-simple-ssl-pro"), $link_start, $link_close);

        } else {
            $link_start = '<a href="options-general.php?page=rlrsssl_really_simple_ssl&tab=scan" class="button button-primary">';
            $link_close = "</a> ";
            echo sprintf(__("%sScan for issues%s", "really-simple-ssl-pro"), $link_start, $link_close);
            wp_nonce_field('rsssl_nonce', 'rsssl_nonce');
        }
        ?>
        </form>
        </div>
    <?php
    }

/*
 * removes the added redirect to https rules to the .htaccess file.
 *
 * @since  2.0
 *
 * @access public
 *
 **/

public function remove_HSTS() {
  if (!current_user_can("activate_plugins")) return;
    $abspath = RSSSL()->really_simple_ssl->ABSpath;
    if(file_exists($abspath.".htaccess") && is_writable($abspath.".htaccess")){
      $htaccess = file_get_contents($abspath.".htaccess");

      $htaccess = preg_replace("/#\s?BEGIN\s?Really_Simple_SSL_HSTS.*?#\s?END\s?Really_Simple_SSL_HSTS/s", "", $htaccess);
      $htaccess = preg_replace("/\n+/","\n", $htaccess);

      file_put_contents($abspath.".htaccess", $htaccess);
    }
}

public function insert_secure_cookie_settings(){
  if (!current_user_can("activate_plugins")) return;

  //only if this site has SSL activated.
  if (!RSSSL()->really_simple_ssl->ssl_enabled) return;

  //do not set on per page installations
  if (defined('rsssl_pp_version')) return;

  //only if cookie settings were not inserted yet
  if (!$this->contains_secure_cookie_settings() ) {
    $wpconfig_path = RSSSL()->really_simple_ssl->find_wp_config_path();
    $wpconfig = file_get_contents($wpconfig_path);
    if ((strlen($wpconfig)!=0) && is_writable($wpconfig_path)) {
      $rule  = "\n"."//Begin Really Simple SSL session cookie settings"."\n";
      $rule .= "@ini_set('session.cookie_httponly', true);"."\n";
      $rule .= "@ini_set('session.cookie_secure', true);"."\n";
      $rule .= "@ini_set('session.use_only_cookies', true);"."\n";
      $rule .= "//END Really Simple SSL"."\n";

      $insert_after = "<?php";
      $pos = strpos($wpconfig, $insert_after);
      if ($pos !== false) {
          $wpconfig = substr_replace($wpconfig,$rule,$pos+1+strlen($insert_after),0);
      }

      file_put_contents($wpconfig_path, $wpconfig);
    }
  }

}

/**
 * remove secure cookie settings
 *
 * @since  2.1
 *
 * @access public
 *
 */

public function remove_secure_cookie_settings() {
  if (!current_user_can("activate_plugins")) return;

    $wpconfig_path = RSSSL()->really_simple_ssl->find_wp_config_path();
    if (!empty($wpconfig_path)) {
      $wpconfig = file_get_contents($wpconfig_path);
      $wpconfig = preg_replace("/\/\/Begin\s?Really\s?Simple\s?SSL\s?session\s?cookie\s?settings.*?\/\/END\s?Really\s?Simple\s?SSL/s", "", $wpconfig);
      $wpconfig = preg_replace("/\n+/","\n", $wpconfig);
      file_put_contents($wpconfig_path, $wpconfig);
    }
}

//Show notice for the cookie settings
public function show_notice_wpconfig_not_writable(){
//prevent showing the review on edit screen, as gutenberg removes the class which makes it editable.
$screen = get_current_screen();
if ( $screen->parent_base === 'edit' ) return;

  if (!current_user_can("activate_plugins")) return;

  //only if this site has SSL activated.
  if (!RSSSL()->really_simple_ssl->ssl_enabled) return;

  //do not set on per page installations
  if (defined('rsssl_pp_version')) return;

  if (!$this->contains_secure_cookie_settings()) {

    ?>
      <div id="message" class="error fade notice">
      <h1><?php echo __("Could not insert httponly secure cookie settings.","really-simple-ssl-pro");?></h1>

          <p><?php echo __("To set the httponly secure cookie settings, your wp-config.php has to be edited, but the file is not writable.","really-simple-ssl-pro");?></p>
          <p><?php echo __("Add the following lines of code to your wp-config.php.","really-simple-ssl-pro");?>

        <br><br><code>
            //Begin Really Simple SSL session cookie settings <br>
            &nbsp;&nbsp;@ini_set('session.cookie_httponly', true); <br>
            &nbsp;&nbsp;@ini_set('session.cookie_secure', true); <br>
            &nbsp;&nbsp;@ini_set('session.use_only_cookies', true); <br>
            //END Really Simple SSL cookie settings <br>
        </code><br>
        </p>
        <p><?php echo __("Or set your wp-config.php to writable and reload this page.", "really-simple-ssl-pro");?></p>
      </div>
  <?php
    }
}

/*

    @TODO remove function reference in favor of this same function in core plugin.
    Next version

*/

public function contains_secure_cookie_settings() {
  $wpconfig_path = RSSSL()->really_simple_ssl->find_wp_config_path();

  if (!$wpconfig_path) return false;

  $wpconfig = file_get_contents($wpconfig_path);
  if ( (strpos($wpconfig, "//Begin Really Simple SSL session cookie settings")===FALSE) && (strpos($wpconfig, "cookie_httponly")===FALSE) ) {
    return false;
  }

  return true;
}

/*
* Dissmiss NGINX notice callback
*/

public function dismiss_nginx_message_callback() {
 //nonce check fails if url is changed to ssl.
 //check_ajax_referer( 'really-simple-ssl-dismiss', 'security' );
 update_site_option("rsssl_nginx_message_shown", true);
 wp_die();
}

/*
* Ajax call for the NGINX notice
*/

public function insert_nginx_dismiss_success() {
 if (!get_site_option("rsssl_nginx_message_shown")) {
   $ajax_nonce = wp_create_nonce( "really-simple-ssl-dismiss" );
   ?>
   <script type='text/javascript'>
     jQuery(document).ready(function($) {
       $(".notice.updated.is-dismissible").on("click", ".notice-dismiss", function(event){
             var data = {
               'action': 'dismiss_success_message_nginx',
               'security': '<?php echo $ajax_nonce; ?>'
             };

             $.post(ajaxurl, data, function(response) {

             });
         });
     });
   </script>
 <?php
 }
}


public function maybe_clear_certificate_check_schedule($oldvalue, $newvalue, $option){

    if (!get_option('rsssl_cert_expiration_warning')){
        wp_clear_scheduled_hook('rsssl_pro_daily_hook');
    }
}


/*
 *
 * Inserts header to upgrade insecure links.
 * Does not insert in case of the per page plugin
 *
 *
 * */


    public function insert_upgrade_insecure_content_header_in_htaccess($oldvalue, $newvalue, $option){

        if (!current_user_can("activate_plugins")) return;

        //not for per page
        if (defined('rsssl_pp_version') ) return;

        if (!current_user_can("activate_plugins")) return;

        //does it exist?
        if (!file_exists(RSSSL()->really_simple_ssl->ABSpath.".htaccess")) return;

        //check if editing is blocked.
        if (RSSSL()->really_simple_ssl->do_not_edit_htaccess) return;

        //not if multisite and not networkwide
        if (is_multisite() && !RSSSL()->rsssl_multisite->ssl_enabled_networkwide) return;

        $htaccess = file_get_contents(RSSSL()->really_simple_ssl->ABSpath.".htaccess");
        if (!is_writable(RSSSL()->really_simple_ssl->ABSpath.".htaccess")) return;

        //remove current rules from file, if any.
        $htaccess = preg_replace("/#\s?BEGIN\s?Really_Simple_SSL_UPGRADE_INSECURE_REQUESTS.*?#\s?END\s?Really_Simple_SSL_UPGRADE_INSECURE_REQUESTS/s", "", $htaccess);
        $htaccess = preg_replace("/\n+/","\n", $htaccess);

        $rule = "\n"."# BEGIN Really_Simple_SSL_UPGRADE_INSECURE_REQUESTS"."\n";
        $rule .= "<IfModule mod_headers.c>"."\n";
        $rule .= 'Header always set Content-Security-Policy "upgrade-insecure-requests;"'."\n";
        $rule .= "</IfModule>"."\n";
        $rule .= "# END Really_Simple_SSL_UPGRADE_INSECURE_REQUESTS"."\n";
        $rule = preg_replace("/\n+/","\n", $rule);

        //if this is disabled, remove the rule
        if (!get_option('rsssl_upgrade_insecure_requests_header', true)) $rule = "";

        //Remove rule if SSL is not enabled, or site is not on SSL.
        if (!is_ssl() || !RSSSL()->really_simple_ssl->ssl_enabled) $rule = "";

        $wptag = "# BEGIN WordPress";
        if (strpos($htaccess, $wptag)!==false) {
            $htaccess = str_replace($wptag, $rule.$wptag, $htaccess);
        } else {
            $htaccess = $htaccess.$rule;
        }

        file_put_contents(RSSSL()->really_simple_ssl->ABSpath.".htaccess", $htaccess);

    }



    /**
     * removes the added redirect to https rules to the .htaccess file.
     *
     * @since  2.0
     *
     * @access public
     *
     */

    public function remove_upgrade_insecure_content_header() {
        if (!current_user_can("activate_plugins")) return;
        $abspath = RSSSL()->really_simple_ssl->ABSpath;
        if(file_exists($abspath.".htaccess") && is_writable($abspath.".htaccess")){
            $htaccess = file_get_contents($abspath.".htaccess");

            $htaccess = preg_replace("/#\s?BEGIN\s?Really_Simple_SSL_UPGRADE_INSECURE_REQUESTS.*?#\s?END\s?Really_Simple_SSL_UPGRADE_INSECURE_REQUESTS/s", "", $htaccess);
            $htaccess = preg_replace("/\n+/","\n", $htaccess);

            file_put_contents($abspath.".htaccess", $htaccess);
        }
    }

    /**
     * Checks if the contains_upgrade_insecure_content_header rule is already in the htaccess file
     *
     * @since  2.1
     *
     * @access public
     *
     */

    public function contains_upgrade_insecure_content_header() {
        if (file_exists(RSSSL()->really_simple_ssl->ABSpath.".htaccess")) {
            $htaccess = file_get_contents(RSSSL()->really_simple_ssl->ABSpath.".htaccess");

            preg_match("/upgrade-insecure-requests/", $htaccess, $check);
            if(count($check) === 0){
                return false;
            } else {
                return true;
            }
        }

        return false;
    }
}//class closure
