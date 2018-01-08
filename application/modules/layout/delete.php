<div class="content-box"><!-- Start Content Box -->

<div class="content-box-header">

	<h3>Do you really want to delete this article?</h3>
	<ul class="content-box-tabs">
		<li><a href="#tab2" class="current">Delete</a></li>
	</ul>

	<div class="clear"></div>	
</div> <!-- End .content-box-header -->

<div class="content-box-content">
<?php if(isset($delete_article) && count($delete_article)){
?>
	<div class="tab-content default-tab" id="tab2">
		<form action="index.php/admin/delete/<?php echo $delete_article['id'];?>" method="post">
			<fieldset> 
				<p>
					<label>Title</label>
					<input class="text-input medium-input datepicker" type="text" id="medium-input" name="title"
					value="<?php echo $delete_article['title']; ?>" disabled> 
				</p>
				<p>
					<input class="button" type="submit" value="Delete" name="submit"/>
				</p>
			</fieldset>
			<div class="clear"></div><!-- End .clear -->
		</form>
	</div> <!-- End #tab2 -->   

<?php	
} else {
?>
<div class="notification error png_bg">
	<a href="#" class="close"><img src="template/backend/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
	<div>
		This article is not exist!
	</div>
</div>
<?php
} 
?>
	     

</div> <!-- End .content-box-content -->

</div> <!-- End .content-box -->