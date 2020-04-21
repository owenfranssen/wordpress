<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

include 'includes/dev.php';

# Dashboard
include 'includes/dashboard/menu-order.php';

# Theme Support
add_theme_support( 'post-thumbnails' );

# Theme Assets
include 'includes/enqueue.php';

# Theme Menus
include 'includes/menus.php';

# Theme Templates
include 'includes/templates.php';

# Theme Extras
// add_filter('body_class', function() {
//   global $template;
//   $classes = array();
//   $classes[] = str_replace('.php', '', basename($template));
//   return $classes;
// });

# Includes
include 'includes/customtypes/customposttypes.php';
include 'includes/customtypes/product_category.php';

# Dashboard
include 'includes/dashboard/css.php';

function hide_email($email) {
  $character_set = '+-.0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz';
  $key = str_shuffle($character_set); $cipher_text = ''; $id = 'e'.rand(1,999999999);
  FOR ($i=0;$i<strlen($email);$i+=1) $cipher_text.= $key[strpos($character_set,$email[$i])];
  $script = 'var a="'.$key.'";var b=a.split("").sort().join("");var c="'.$cipher_text.'";var d="";';
  $script.= 'for(var e=0;e<c.length;e++)d+=b.charAt(a.indexOf(c.charAt(e)));';
  $script.= 'document.getElementById("'.$id.'").innerHTML="<a href=\\"mailto:"+d+"\\">"+d+"</a>"';
  $script = "eval(\"".str_replace(array("\\",'"'),array("\\\\",'\"'), $script)."\")"; 
  $script = '<script type="text/javascript">/*<![CDATA[*/'.$script.'/*]]>*/</script>';
  return '<span id="'.$id.'">[email address]</span>'.$script;
}
?>