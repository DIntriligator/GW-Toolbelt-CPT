<?php 
$title = "CUSTOM CSS"; 
include(GWTB_PLUGIN_DIR . 'layout/header.php');
?>

<!-- New CPT form -->

<div class="container">
		<div class="row text-center">
			<div class="twelve columns">
				<form name="custom-css" method="post" action="<?php echo admin_url( 'admin.php' ); ?>">
					<?php $css = get_option('gwtb-css') ?>
					<input type="hidden" name="action" value="gwtb_cpt_css" />
					<?php wp_nonce_field()?>
					<textarea class="custom-css"><?php echo $css ?></textarea>
					<input type="submit" class="button-brand" name="custom-css-field" value="Add Css">
				</form>
			</div>
		</div>
</div>
</div>

<?php  
include(GWTB_PLUGIN_DIR . 'layout/footer.php');
?>