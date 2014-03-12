<?php
/* 
 * Plugin Name: Domain Mapping Autofill
 * Description: Add auto-suggest to your domain mapping admin page 
 */
 
/// load necessary scripts and styles: jquery and autocomplete
add_action( 'admin_enqueue_scripts', 'add_domain_mapping_autofill' );
function add_domain_mapping_autofill() {
	if(isset($_GET['page']) && $_GET['page'] == 'dm_domains_admin'){
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'jquery-ui-autocomplete' );
	    wp_enqueue_style( 'jquery_css', 'http://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css');
		wp_enqueue_script( 'jquery-domain_mapping_autofill', plugin_dir_url( __FILE__ ) . 'js/domain_mapping_autofill.js' );
	}  	         
}
// create autocomplete array
add_action('admin_footer', 'domain_mapping_autofill_script');
function domain_mapping_autofill_script(){
 	if(isset($_GET['page']) && $_GET['page'] == 'dm_domains_admin'){
 		$entry = "";
		foreach(wp_get_sites() as $blog){
	    	$entry .= "
	    	{
		        value: '".$blog['blog_id']."',
		        label: '".$blog['domain']."'
		      },
		    ";
		}
		?>				
		 <script>var availableTags = [<?=$entry;?>];</script>
		 <?
	}
}