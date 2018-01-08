<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
		<h3>Select a menu</h3>
		<div class="clear"></div>	
	</div> <!-- End .content-box-header -->
	<div class="content-box-content">	
		<!-- inform error -->
		<?php echo validation_errors(); ?>
		<form action="" method="post">
			<fieldset> 
				<!-- menu -->
				<p>
					<label>Menu</label>
					<?php 
						$menuid = $this->input->get('menuid');
						if(!empty($list_menu)){
							echo form_dropdown('menuid', $list_menu, $menuid, "class='large-input'");
							echo "</p><br><p>";
						} else { echo "<h4>Generate a menu please!</h4>";
									echo "</p><br><p style='display:none'>";
						}
					?>
					<input class="button" type="submit" value="Submit" name="submit1"/>
				</p>
			</fieldset>
	</form>
	</div>		
</div> <!-- End .content-box -->

<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
		<h3>Add a category</h3>
		<ul class="content-box-tabs">
			<li><a href="#tab1" class="default-tab">Page</a></li>
			<li><a href="#tab2">Custom link</a></li>
		</ul>

		<div class="clear"></div>	
	</div> <!-- End .content-box-header -->
	<div class="content-box-content">
		
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
	
		<div class="tab-content default-tab" id="tab1">

			<form action="" method="post">
			<fieldset> 
				<!-- page -->
				<p>
					<label>Title</label>
					<?php 
					echo form_dropdown('title', $list_page, $list_page[0], "class='large-input'");
					?>
				</p>
				<!-- parent cat -->
				<p>
					<label>Parent category</label>
					<?php 
					echo form_dropdown('parentid', $recursive, $recursive[0], "class='large-input'");
					?>
				</p>
				
				<br>
				<p>
					<input class="button" type="submit" value="Submit" name="submit2"/>
				</p>
			</fieldset>
			</form>
		</div> <!-- End #tab1 -->        


		<div class="tab-content" id="tab2">
			<form action="" method="post">
			<fieldset> 
				<!-- Title -->
				<p>
					<label>Title</label>
					<input class="text-input medium-input" type="text" name="title" value="<?php echo set_value('title', ''); ?>"> 
					<?php echo form_error('title', '<span class="input-notification error png_bg">', '</span>'); ?>
					<?php if(isset($valid) && $valid == 'true') 
					echo "<span class='input-notification success png_bg'>Successful!</span>" ?>
				</p>
				<!-- Link -->
				<p>
					<label>Link</label>
					<input class="text-input medium-input" type="text" name="link" value="<?php echo set_value('link', 'http://'); ?>"> 
					<?php echo form_error('link', '<span class="input-notification error png_bg">', '</span>'); ?>
					<?php if(isset($valid) && $valid == 'true') 
					echo "<span class='input-notification success png_bg'>Successful!</span>" ?>
				</p>
				<!-- parent id -->
				<p>
					<label>Parent category</label>
					<?php 
					echo form_dropdown('parentid', $recursive, $recursive[0], "class='large-input'");
					?>
				</p>
				<br>
				<p>
					<input class="button" type="submit" value="Submit" name="submit3"/>
				</p>
			</fieldset>
			</form>
		</div> <!-- End #tab2 -->        
	</div> <!-- End .content-box-content -->
			
</div> <!-- End .content-box -->