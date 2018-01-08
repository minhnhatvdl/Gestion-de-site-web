<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
		<h3>Social Network</h3>
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
				<!-- facebook -->
				<p>
					<label>Facebook</label>
					<input class="text-input medium-input" type="text" name="facebook" value="<?php echo set_value('facebook', $social['facebook']); ?>"> 
					<?php echo form_error('facebook', '<span class="input-notification error png_bg">', '</span>'); ?>
					<?php if(isset($valid) && $valid == 'true') 
					echo "<span class='input-notification success png_bg'>Successful!</span>" ?>
				</p>
				<!-- twitter -->
				<p>
					<label>Twitter</label>
					<input class="text-input medium-input" type="text" name="twitter" value="<?php echo set_value('twitter', $social['twitter']); ?>"> 
					<?php echo form_error('twitter', '<span class="input-notification error png_bg">', '</span>'); ?>
					<?php if(isset($valid) && $valid == 'true') 
					echo "<span class='input-notification success png_bg'>Successful!</span>" ?>
				</p>
				<!-- linkedin -->
				<p>
					<label>Linkedin</label>
					<input class="text-input medium-input" type="text" name="linkedin" value="<?php echo set_value('linkedin', $social['linkedin']); ?>"> 
					<?php echo form_error('linkedin', '<span class="input-notification error png_bg">', '</span>'); ?>
					<?php if(isset($valid) && $valid == 'true') 
					echo "<span class='input-notification success png_bg'>Successful!</span>" ?>
				</p>
				<!-- google -->
				<p>
					<label>Google</label>
					<input class="text-input medium-input" type="text" name="google" value="<?php echo set_value('google', $social['google']); ?>"> 
					<?php echo form_error('google', '<span class="input-notification error png_bg">', '</span>'); ?>
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