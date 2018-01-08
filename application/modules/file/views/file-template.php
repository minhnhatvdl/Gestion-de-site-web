<!DOCTYPE html> 
<html lang="en"> 
<head> 
	<style type="text/css"> 
		#body{margin:10px auto; width: 800px; font-size: 90%; } 
		form {width: 600px; margin: 40 auto;} 
		form div{padding: 0 0 5px 0;} 
		label {width: 120px; display: block; float: left; clear: left; font-weight: bold;} 
		span.error p{ width: auto; padding: 0 0 0 120px; font-style: italic; color: red; font-size: 90%; } 
		span.success {color: green;} 
		.form{ width: 150px;} 
	</style> 
	<meta charset="utf-8"> 
	<title>Title | Sử dụng lớp Upload File trên CodeIgniter</title> 
</head> 
<body> 
	<div id="body"> 
		<h2>Sử dụng lớp Upload File trên CodeIgniter</h2> 
		<form action="upload" method="post" id="form" enctype="multipart/form-data" > 
			<fieldset> 
				<legend>Sử dụng lớp Upload File trên CodeIgniter</legend> 
				<div> 
					<span class="error"> <?php if(isset($b_CheckUpload) && $b_CheckUpload == false){ echo "Upload không thành công. Hãy thử lại !"; }?> 
					</span> 
				</div> 
				<div> 
					<label for="file">Browse to File</label> 
					<input class="form" type="file" name="file" size="50" /> 
					<span class="error"><?php echo form_error('username'); ?></span> 
				</div> 
				<div>
					<input type="submit" id="save" value="Upload" />
				</div> 
			</fieldset> 
		</form> 
	</div> 
</body> 
</html>