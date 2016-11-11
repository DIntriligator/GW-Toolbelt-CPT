<?php 
$title = "CUSTOM CSS"; 
include(GWTB_PLUGIN_DIR . 'views/header.php');
?>

<!-- New CPT form -->

<div class="container">
		<div class="row text-center">
			<div class="twelve columns">
				<form name="custom-css" method="post" action="<?php echo admin_url( 'admin.php' ); ?>">
					<?php $css = get_option('gwtb-css') ?>
					<input type="hidden" name="action" value="gwtb_cpt_css" />
					<?php wp_nonce_field()?>
					<input type="submit" class="button-brand" value="Add Css">
					<textarea class="custom-css" name="custom-css-field"><?php echo $css ?></textarea>
					<input type="submit" class="button-brand" value="Add Css">
				</form>
			</div>
		</div>
</div>

<?php  
include(GWTB_PLUGIN_DIR . 'views/footer.php');
?>