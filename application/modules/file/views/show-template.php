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
		<a href="file" title="Sử dụng lớp Upload File trên CodeIgniter" >Quay lại</a> 
		<span>File ảnh vừa upload lên là</span> 
		<?php if(is_array($album)) {?> <img src="uploads/images/<?php echo $album['file_name'];?>" width="200" height="200" /> <?php }?> 
	</div> 
</body> 
</html> 