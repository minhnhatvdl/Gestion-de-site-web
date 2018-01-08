<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
		<h3>Add a page</h3>
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
				<!-- Title -->
				<p>
					<label>Title</label>
					<input id="title" onblur="toUrl(this.value)" class="text-input medium-input" type="text" name="title" value="<?php echo set_value('title', ''); ?>"> 
					<?php echo form_error('title', '<span class="input-notification error png_bg">', '</span>'); ?>
					<?php if(isset($valid) && $valid == 'true') 
					echo "<span class='input-notification success png_bg'>Successful!</span>" ?>
				</p>
				<!-- Link -->
				<p>
					<label>Link</label>
					<input id="link" onblur="toUrl(this.value)" class="text-input medium-input" type="text" name="link" value="">
					<?php echo form_error('link', '<span class="input-notification error png_bg">', '</span>'); ?>
					<?php if(isset($valid) && $valid == 'true') 
					echo "<span class='input-notification success png_bg'>Successful!</span>" ?>
				</p>

				<!-- content -->
				<p>
					<label>Content</label>
					<form action="" method="post" id="form"> 
						<fieldset> 
							<div class="text-edit"> 
								<textarea id="elm1" name="txt_content"></textarea>
							</div> 
						</fieldset> 
					</form>
				</p>
				<br>
				<p>
					<input class="button" type="submit" value="Submit" name="submittt"/>
				</p>
			</fieldset>
			<div class="clear"></div><!-- End .clear -->
			</form>
		</div> <!-- End #tab2 -->        
	</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->