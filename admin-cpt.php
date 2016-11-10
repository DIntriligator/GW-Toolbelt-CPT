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


<!-- CPT FOROM -->	
<form name="cpt_form_<?php echo $index ?>" method="post" action="<?php echo admin_url( 'admin.php' ); ?>">
<input type="hidden" name="action" value="graphw_cpt" />
<?php wp_nonce_field();
	$cpts = get_option('gwtb-cpt');
	$index = 0;
	foreach($cpts as $cpt) :

			 if($index % 2 == 0) :?>
		    	<div class="row">
		    <?php endif;?>

		    <div class="six columns">

		    	<h6 class="text-center" style="margin-bottom:0;"><?php echo $cpt['plural'] ?></h6>

		    	<div class="six columns">
				    		<div class="cpt_input">
					    		<label for="name<?php echo $index ?>">Slug</label>
					    		<input type="text" name="name<?php echo $index ?>" value="<?php the_title(); ?>" />
				    		</div>
				    		<div class="cpt_input">
					    		<label for="plural<?php echo $index ?>">Plural Name</label>
					    		<input type="text" name="plural<?php echo $index ?>" value="<?php echo $plural_cpt ?>" />
				    		</div>

				    		<div class="cpt_input">
					    		<label for="single<?php echo $index ?>">Singular Name</label>
					    		<input type="text" name="single<?php echo $index ?>" value="<?php echo $single_cpt ?>" />
				    		</div>

				    		<div class="cpt_input">
					    		<label for="dashicon<?php echo $index ?>">Dashicon</label>
					    		<input type="hidden" name="dashicon<?php echo $index ?>" id="dashicon<?php echo $index ?>" value="<?php echo $dashicon_cpt ?>" />
					    		<span id="dashicon-display<?php echo $index ?>" class="dashicons <?php echo $dashicon_cpt ?>"></span><br><br>
					    		<a href="#" class="dashicon-open-btn button" data-index="<?php echo $index ?>">Pick an Icon</a>
					    		<?php gwtb_dashicons($index) ?>
				    		</div>
		
				   <div class="six columns">
				    		<div>
				    			<label>&nbsp;</label>
					    		<input type="checkbox" name="public<?php echo $index ?>" value="yes" <?php echo $public_cpt ?> />
					    		<label for="public<?php echo $index ?>"  class="checkbox_label" >Public?</label>
				    		</div>

				    		<div>
					    		<input type="checkbox" name="archive<?php echo $index ?>" value="yes" <?php echo $archive_cpt ?>  />
					    		<label for="archive<?php echo $index ?>"  class="checkbox_label">Has Archive?</label>
				    		</div>

				    		<div >
					    		<input type="checkbox" name="hierarchial<?php echo $index ?>" value="yes" <?php echo $hierarchial_cpt ?> />
					    		<label for="hierarchial<?php echo $index ?>"  class="checkbox_label">Is Hierarchial?</label>
				    		</div>
				    		<div class="cpt_input cpt_supports">
				    			<h6 style="margin:0; margin-top:20px;">Supports</h6>
					    		<input type="checkbox" name="title<?php echo $index ?>" value="yes" <?php echo $title_cpt ?>/>
					    		<label for="title<?php echo $index ?>" class="checkbox_label">Title</label><br>
					    		<input type="checkbox" name="editor<?php echo $index ?>" value="yes" <?php echo $editor_cpt ?>/>
					    		<label for="editor<?php echo $index ?>" class="checkbox_label">Editor</label><br>
					    		<input type="checkbox" name="author<?php echo $index ?>" value="yes" <?php echo $author_cpt ?>/>
					    		<label for="author<?php echo $index ?>" class="checkbox_label">Author</label><br>
					    		<input type="checkbox" name="thumbnail<?php echo $index ?>" value="yes" <?php echo $thumbnail_cpt ?>/>
					    		<label for="thumbnail<?php echo $index ?>" class="checkbox_label">Thubmnail</label><br>
					    		<input type="checkbox" name="excerpt<?php echo $index ?>" value="yes" <?php echo $excerpt_cpt ?>/>
					    		<label for="excerpt<?php echo $index ?>" class="checkbox_label">Excerpt</label><br>
					    		<input type="checkbox" name="comments<?php echo $index ?>" value="yes" <?php echo $comments_cpt ?>/>
					    		<label for="comments<?php echo $index ?>" class="checkbox_label">Comments</label><br>
					    		<input type="checkbox" name="page-attributes<?php echo $index ?>" value="yes" <?php echo $page_attributes_cpt ?>/>
					    		<label for="attributes<?php echo $index ?>" class="checkbox_label">Attributes</label><br>
				    		</div>
		    		</div>
		    		</div>
				    		<div class="text-center submit submit<?php echo $index ?>">
					          <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes'); ?>" />
					        </div>
		    	</div>
		    	<?php if($index % 2 == 1) :?>
		    	</div>
		    <?php endif;?>

		  <?php $index++; endforeach; ?>
		</form>
  </div>

		    <?php 
					$index = 0;
					$args = array( 'post_type' => 'graphw_cpt', 'posts_per_page' => -1, 'order' => 'ASC', 'orderby' => 'ID' );
					$loop = new WP_Query( $args ); 
					if($loop->have_posts()) :
					?>

 <div class="container">
	  <div class="row">
	  	<div class="four offset-by-four columns cpt_delete">
	  		<form name="cpt-delete-button" method="post" action="<?php echo admin_url( 'admin.php' ); ?>">
			  <input type="hidden" name="action" value="graphw_cpt_delete_button" />
			  <?php wp_nonce_field()?>
			    <div class="text-center" style="margin-top:30px;">
			    	<p>Select a Custom post type to be deleted</p>
			    <select name="the-id" >
			    	<option>select one</option>
						<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
						<option value="<?php echo get_the_id() ?>"><?php echo get_the_title(); ?></option>
						<?php $index++; endwhile; ?> 
			    </select><br><br>
		          <input type="submit" name="Submit" class="button-warn" value="Delete" />
		        </div>
			  </form>
		  </div>
		</div>
	</div>

<?php endif; ?>
</section>

<?php $cpts = get_option('gwtb-cpt'); var_dump($cpts); ?>