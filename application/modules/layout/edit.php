			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Content box</h3>
					
					<ul class="content-box-tabs">
						
						<li><a href="#tab2" class="current">Edit</a></li>
					</ul>
					
					<div class="clear"></div>	
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">

					<!-- inform error -->
					<?php echo validation_errors(); ?>
					<!-- inform sucess -->
					<?php if(isset($valid) && $valid == 'true') 
					echo "				
					<div class='notification success png_bg'>
						<a href='#' class='close'><img src='template/backend/simpla-admin/resources/images/icons/cross_grey_small.png' title='Close this notification' alt='close' /></a>
						<div>
							Successfull!
						</div>
					</div>"
					 ?>

					<div class="tab-content default-tab" id="tab2">
					
						<form action="" method="post">
							
							<fieldset> 
								<p>
									<label>Title</label>
									<input class="text-input medium-input datepicker" type="text" id="medium-input" name="title"
									 	value="<?php echo set_value('title', $edit_article['title']); ?>">

									<?php echo form_error('title', '<span class="input-notification error png_bg">', '</span>'); ?>
									<?php if(isset($valid) && $valid == 'true') 
										echo "<span class='input-notification success png_bg'>Successful!</span>" ?>
								</p>
						
								<p>
									<label>Content</label>
									<textarea class="text-input textarea" id="textarea" name="content" cols="79" 
									rows="15"><?php echo set_value('content', $edit_article['content']); ?></textarea>
								</p>
								
								<p>
									<input class="button" type="submit" value="Edit" name="edit"/>
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->