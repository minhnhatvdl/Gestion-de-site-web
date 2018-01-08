<!DOCTYPE html> 
<html lang="en"> 
<head> 
	<meta charset="utf-8"> 
	<title>Thủ thuật Việt Nam</title> 
	<script src="public/ckeditor/ckeditor.js"></script>
	<script src="public/ckfinder/ckfinder.js"></script>
	<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
	<script type="text/javascript"> $(function() {	var editor = CKEDITOR.replace('txt_content', { filebrowserBrowseUrl : 'public/ckfinder/ckfinder.html', filebrowserImageBrowseUrl : 'public/ckfinder/ckfinder.html?Type=Images', filebrowserFlashBrowseUrl : 'public/ckfinder/ckfinder.html?Type=Flash', filebrowserUploadUrl : 'public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files', filebrowserImageUploadUrl : 'public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images', filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash', filebrowserWindowWidth : '800', filebrowserWindowHeight : '480' }); CKFinder.setupCKEditor( editor, 'public/ckfinder/' ); }) </script> 
</head> 
<body> 
	<div id="body"> 
		<h2>Cách tích hợp CKFinder vào CodeIgniter</h2> 
		<form action="" method="post" id="form"> 
			<fieldset> <legend>Sử dụng CKFinder trên CodeIgniter project</legend>
			<div> 
				<span class="right">
					<textarea id="txt_content" name="txt_content" style="width:100%; height:200px;"></textarea>
				</span> </div> 
				<div>
					<input type="submit" id="save" value="Submit" />
				</div> 
			</fieldset> 
		</form> 
	</div> 
</body> 
</html> 
