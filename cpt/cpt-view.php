<?php 
$title = "CUSTOM POST TYPES"; 
include(GWTB_PLUGIN_DIR . 'layout/header.php');
?>

<!-- New CPT form -->

<div class="container">
		<div class="row text-center">
			<div class="twelve columns">
				<form name="cpt-add-button" method="post" action="<?php echo admin_url( 'admin.php' ); ?>">
					<input type="hidden" name="action" value="gwtb_cpt_add_button" />
					<?php wp_nonce_field()?>
					<input type="submit" name="Submit" class="button-brand" value="Add New Custom Post Type" />
				</form>
			</div>
		</div>
</div>

<!-- Delete CPT form -->

<div class="container">
		<div class="row text-center">
			<div class="twelve columns">
				<form name="cpt-add-button" method="post" action="<?php echo admin_url( 'admin.php' ); ?>">
					<input type="hidden" name="action" value="gwtb_cpt_delete" />
					<?php wp_nonce_field()?>
					<input type="submit" name="Submit" class="button-black" value="Delete CPT with the ID of:" />
					<select name="id" class="buttons button-black">
						<option>Select One</option>
						<?php 
						$cpts = get_option('gwtb-cpt');
						foreach($cpts as $cpt) : ?>

							<option value="<?php echo $cpt['id'] ?>"><?php echo $cpt['id'] ?></option>

						<?php endforeach ?>

					</select><br><br>
				</form>
			</div>
		</div>
</div>


<!-- CPT FOROM -->	
<div class="container">
	<form name="cpt_form" method="post" action="<?php echo admin_url( 'admin.php' ); ?>">
	<input type="hidden" name="action" value="gwtb_cpt_update" />
	<?php wp_nonce_field();
		$cpts = get_option('gwtb-cpt');
		$index = 0;
		if($cpts) : foreach($cpts as $cpt) :

			if($index % 2 == 0) :?>
		    <div class="row">
		  <?php endif;?>

		  <div class="six columns admin-card">
		  	<div class="admin-card-title">
					<h2 class="text-center"><?php echo $cpt['plural']; ?></h2>
				</div>
				<div class="admin-card-body">
					<div class="row">
			    	<div class="six columns text-center">

			    		<div class="cpt_input">
				    		<label for="name<?php echo $index ?>">Slug</label>
				    		<input type="text" name="<?php echo $cpt['id'] ?>[slug]" value="<?php echo $cpt['slug']; ?>" />
			    		</div>
			    		
			    		<div class="cpt_input">
				    		<label for="plural<?php echo $index ?>">Plural Name</label>
				    		<input type="text" name="<?php echo $cpt['id'] ?>[plural]" value="<?php echo $cpt['plural']; ?>" />
			    		</div>

			    		<div class="cpt_input">
				    		<label for="single<?php echo $index ?>">Singular Name</label>
				    		<input type="text" name="<?php echo $cpt['id'] ?>[single]" value="<?php echo $cpt['single']; ?>" />
			    		</div>

			    		<div class="cpt_input">
				    		<label for="dashicon<?php echo $index ?>">Dashicon</label>
				    		<input type="text" name="<?php echo $cpt['id'] ?>[icon]" id="dashicon<?php echo $index ?>" value="<?php echo $cpt['icon'] ?>" />
			    		</div>

			    		<div class="admin-checkbox">
				    		<input type="checkbox" name="<?php echo $cpt['id'] ?>[public]" id="public<?php echo $index ?>" value="true" <?php if($cpt['public']){echo 'checked';} ?> />
				    		<label for="public<?php echo $index ?>"  class="checkbox_label" >Public?</label>
			    		</div>

			    		<div class="admin-checkbox">
				    		<input type="checkbox" name="<?php echo $cpt['id'] ?>[archive]" id="archive<?php echo $index ?>" value="true" <?php if($cpt['archive']){echo 'checked';} ?>  />
				    		<label for="archive<?php echo $index ?>"  class="checkbox_label">Has Archive?</label>
			    		</div>

			    		<div class="admin-checkbox">
				    		<input type="checkbox" name="<?php echo $cpt['id'] ?>[hierarchial]" id="hierarchial<?php echo $index ?>" value="true" <?php if($cpt['hierarchial']){echo 'checked';} ?> />
				    		<label for="hierarchial<?php echo $index ?>"  class="checkbox_label">Is Hierarchial?</label>
			    		</div>
					  </div>
		
					  <div class="six columns text-center">
			    			<h6 style="margin:0; margin-top:20px;">Supports</h6>
			    		<div class="admin-checkbox">
				    		<input type="checkbox" name="<?php echo $cpt['id'] ?>[title]" value="true" id="title<?php echo $index ?>" <?php if($cpt['title']){echo 'checked';} ?>/>
				    		<label for="title<?php echo $index ?>" class="checkbox_label">Title</label><br>
				    	</div>

				    	<div class="admin-checkbox">
				    		<input type="checkbox" name="<?php echo $cpt['id'] ?>[editor]" value="true" id="editor<?php echo $index ?>" <?php if($cpt['editor']){echo 'checked';} ?>/>
				    		<label for="editor<?php echo $index ?>" class="checkbox_label">Editor</label><br>
				    	</div>

				    	<div class="admin-checkbox">
				    		<input type="checkbox" name="<?php echo $cpt['id'] ?>[author]" value="true" id="author<?php echo $index ?>" <?php if($cpt['author']){echo 'checked';} ?>/>
				    		<label for="author<?php echo $index ?>" class="checkbox_label">Author</label><br>
				    	</div>

				    	<div class="admin-checkbox">	
				    		<input type="checkbox" name="<?php echo $cpt['id'] ?>[thumbnail]" value="true" id="thumbnail<?php echo $index ?>" <?php if($cpt['thumbnail']){echo 'checked';} ?>/>
				    		<label for="thumbnail<?php echo $index ?>" class="checkbox_label">Thubmnail</label><br>
				    	</div>	

				    	<div class="admin-checkbox">	
				    		<input type="checkbox" name="<?php echo $cpt['id'] ?>[excerpt]" value="true" id="excerpt<?php echo $index ?>" <?php if($cpt['excerpt']){echo 'checked';} ?>/>
				    		<label for="excerpt<?php echo $index ?>" class="checkbox_label">Excerpt</label><br>
				    	</div>

				    	<div class="admin-checkbox">	
				    		<input type="checkbox" name="<?php echo $cpt['id'] ?>[comments]" value="true" id="comments<?php echo $index ?>" <?php if($cpt['comments']){echo 'checked';} ?>/>
				    		<label for="comments<?php echo $index ?>" class="checkbox_label">Comments</label><br>
				    	</div>

				    	<div class="admin-checkbox">	
				    		<input type="checkbox" name="<?php echo $cpt['id'] ?>[page-attributes]" value="true" id="attributes<?php echo $index ?>" <?php if($cpt['page-attributes']){echo 'checked';} ?>/>
				    		<label for="attributes<?php echo $index ?>" class="checkbox_label">Attributes</label><br>
				    	</div>
		    		</div>
	    		</div>
	    	</div>
    		<div class="text-center submit submit<?php echo $index ?>">
          <input type="submit" name="Submit" class="button-brand" value="<?php esc_attr_e('Save Changes'); ?>" />
        </div>
    	</div>
  	<?php if($index % 2 == 1) :?>
  		</div>
    <?php endif;?>

	<?php $index++; endforeach; endif; ?>
	</form>
</div>

<?php  
include(GWTB_PLUGIN_DIR . 'layout/footer.php');
?>
