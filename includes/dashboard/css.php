<?php
/**
 * Custom styling for dashboard elements.
 * 
 */

function dashboard_css() {
echo "
<style>
  .custom_meta_box .inside {
    margin-top: 0 !important;
    padding: 0 !important;
  }
</style>
";
}
add_action('admin_head', 'dashboard_css');
?>