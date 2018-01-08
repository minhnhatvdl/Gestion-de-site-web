<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
		<h3>Are you sure for deleting this category?</h3>
		<div class="clear"></div>	
	</div> <!-- End .content-box-header -->
	<div class="content-box-content">
		<!-- inform error -->
		<?php echo validation_errors(); ?>
		<!-- inform success -->
		<?php if(isset($valid) && $valid == 'true') 
		echo 
		"<div class='notification success png_bg'>
			<a href='#' class='close'><img src='template/backend/simpla-admin/resources/images/icons/cross_grey_small.png' title='Close this notification' alt='close' /></a>
			<div>
			Successfull!
			</div>
		</div>"
		?>
		<div class="tab-content default-tab" id="tab2">
			<form action="" method="post">
			<fieldset> 
				<!-- title -->
				<p>
					<label>Title</label>
					<input class="text-input large-input" type="text" name="title" value="<?php echo set_value('title', $cat['title']); ?>"> 
					<?php echo form_error('title', '<span class="input-notification error png_bg">', '</span>'); ?>
					<?php if(isset($valid) && $valid == 'true') 
					echo "<span class='input-notification success png_bg'>Successful!</span>" ?>
				</p>
				
				<br>
				<p>
					<input class="button" type="submit" value="Submit" name="submit"/>
				</p>
			</fieldset>
			<div class="clear"></div><!-- End .clear -->
			</form>
		</div> <!-- End #tab2 -->        
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->