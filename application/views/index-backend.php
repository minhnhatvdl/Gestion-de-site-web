<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<base href="http://localhost/codeigniter-2.2.2/"></base>
		<title><?php echo isset($title)? $title:'' ?></title>

		<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
		<script type="text/javascript" src="tinymce/tinymce.min.js"></script>	
		<script type="text/javascript" src="tinymce/filemanager/plugin.min.js"></script>
		<script>
		tinymce.init({
			selector: "textarea#elm1",
			convert_urls : false,
			theme: "modern",
			width: "100%",
			height: 300,
			plugins: [
			"responsivefilemanager advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
			"searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
			"save table contextmenu directionality emoticons template paste textcolor"
			],
			image_advtab: true,
			toolbar: "code insertfile undo redo styleselect bold italic alignleft aligncenter alignright alignjustify bullist numlist outdent indent link image responsivefilemanager print preview media fullpage | forecolor backcolor | emoticons", 
			
			external_filemanager_path:"tinymce/filemanager/",
			filemanager_title:"Responsive Filemanager" ,
			external_plugins: { "filemanager" : "tinymce/filemanager/plugin.min.js"},

			extended_valid_elements : "span[!class]",
			extended_valid_elements : "i[class],a[class|name|href|target|title|onclick],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]",

			style_formats: [
				{title: 'Bold text', inline: 'b'},
				{title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
				{title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
				{title: 'Example 1', inline: 'span', classes: 'example1'},
				{title: 'Example 2', inline: 'span', classes: 'example2'},
				{title: 'Table styles'},
				{title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
			]
		}); 
		</script>
		<link rel="stylesheet" href="template/backend/simpla-admin/resources/css/reset.css" type="text/css" media="screen" />
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="template/backend/simpla-admin/resources/css/style.css" type="text/css" media="screen" />
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="template/backend/simpla-admin/resources/css/invalid.css" type="text/css" media="screen" />	
		<!-- jQuery -->
		<script type="text/javascript" src="template/backend/simpla-admin/resources/scripts/jquery-1.3.2.min.js"></script>
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="template/backend/simpla-admin/resources/scripts/simpla.jquery.configuration.js"></script>
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="template/backend/simpla-admin/resources/scripts/facebox.js"></script>
		<!-- elFinder -->
		<!-- jQuery and jQuery UI (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/themes/smoothness/jquery-ui.css">
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
		<!-- elFinder CSS (REQUIRED) -->
		<link rel="stylesheet" type="text/css" media="screen" href="elfinder/css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" media="screen" href="elfinder/css/theme.css">
		<!-- elFinder JS (REQUIRED) -->
		<script type="text/javascript" src="elfinder/js/elfinder.min.js"></script>
		<!-- elFinder translation (OPTIONAL) -->
		<script type="text/javascript" src="elfinder/js/i18n/elfinder.ru.js"></script>
		<!-- elFinder initialization (REQUIRED) -->
		<script type="text/javascript" charset="utf-8">
			$().ready(function() {
				var elf = $('#elfinder').elfinder({
					url : 'elfinder/php/connector.php'  // connector URL (REQUIRED)
				}).elfinder('instance');
			});
		</script>
		<!-- fancy box -->
		<link rel="stylesheet" type="text/css" href="tinymce/fancybox/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
		<script type="text/javascript" src="tinymce/fancybox/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
		<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
		<script>
			function toUrl(str){
			    if (str.length == 0) { 
			        document.getElementById("link").innerHTML = "";
			        return;
			    } else {
			        var xmlhttp = new XMLHttpRequest();
			        xmlhttp.onreadystatechange = function() {
			            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			                document.getElementById("link").value= xmlhttp.responseText;
			            }
			        }
			        xmlhttp.open("GET", "application/views/geturl.php?q=" + str, true);
			        xmlhttp.send();
			    }
			}
		</script>
		<script type="text/javascript">
			$(document).ready(function () {
				function OnMessage(e){
				  	var event = e.originalEvent;
				   	// Make sure the sender of the event is trusted
				   	if(event.data.sender === 'responsivefilemanager'){
						if(event.data.field_id){
							var fieldID=event.data.field_id;
							var url=event.data.url;
					$('#'+fieldID).val(url).trigger('change');
					$.fancybox.close();
					$(window).off('message', OnMessage);
				      }
				   }
				}
				$('.iframe-btn').on('click',function(){
				  $(window).on('message', OnMessage);
				});
				$('.iframe-btn').fancybox({
					'width': 880,
					'height': 570,
					'type': 'iframe',
					'autoScale': false
				});
			});
		</script>
	</head>
	<body>
		<div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
			<div id="sidebar">
				<div id="sidebar-wrapper"> 
					<!-- Logo (221px wide) -->
					<a href="index.php/admin"><img id="logo" style="width:221px;height:auto" src="template/backend/simpla-admin/resources/images/srweb.png" alt="SR Web logo" /></a>
					<ul id="main-nav">  <!-- Accordion Menu -->
						<li>
							<a href="index.php/admin" class="nav-top-item no-submenu"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
							Dashboard
							</a>       
						</li>
						<li> 
							<a href="index.php/page" class="nav-top-item <?php if(isset($root) && $root == 'page') echo 'current' ?>">
							Page
							</a>
							<ul>
								<li><a <?php if(isset($current) && $current == 'add-a-page') echo "class='current'" ?> href="index.php/page/add">Add a page</a></li>
								<li><a <?php if(isset($current) && $current == 'all-pages') echo "class='current'" ?> href="index.php/page/view">All pages</a></li> 
							</ul>
						</li>
						<li> 
							<a href="index.php/appearance" class="nav-top-item <?php if(isset($root) && $root == 'appearance') echo 'current' ?>">
							Appearance
							</a>
							<ul>
								<li><a <?php if(isset($current) && $current == 'editor') echo "class='current'" ?> href="index.php/appearance/editor">Editor</a></li>
							</ul>
						</li>
						<li> 
							<a href="index.php/menu" class="nav-top-item <?php if(isset($root) && $root == 'menu') echo 'current' ?>">
							Menu
							</a>
							<ul>
								<li><a <?php if(isset($current) && $current == 'add-a-menu') echo "class='current'" ?> href="index.php/menu/add">Add a new menu</a></li>
								<li><a <?php if(isset($current) && $current == 'all-menus') echo "class='current'" ?> href="index.php/menu/view">All menus</a></li>
								<li><a <?php if(isset($current) && $current == 'add-a-cat') echo "class='current'" ?> href="index.php/menu/addcat">Add a category</a></li>
							</ul>
						</li>
						<li> 
							<a href="index.php/logo" class="nav-top-item <?php if(isset($root) && $root == 'logo') echo 'current' ?>">
							Logo
							</a>
							<ul>
								<li><a <?php if(isset($current) && $current == 'add-a-logo') echo "class='current'" ?> href="index.php/logo/add">Add a logo</a></li>
							</ul>
						</li>
						<li> 
							<a href="index.php/social" class="nav-top-item <?php if(isset($root) && $root == 'social') echo 'current' ?>">
							Social Network
							</a>
							<ul>
								<li><a <?php if(isset($current) && $current == 'add-social') echo "class='current'" ?> href="index.php/social/add">Social network</a></li>
							</ul>
						</li>
					</ul> <!-- End #main-nav -->
				</div>
			</div> <!-- End #sidebar -->
			<div id="main-content"> 
				<noscript> <!-- Show a notification if the user has disabled javascript -->
					<div class="notification error png_bg">
						<div>
						Javascript is disabled or is not supported by your browser. Please <a href="http://browsehappy.com/" title="Upgrade to a better browser">upgrade</a> your browser or <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Enable Javascript in your browser">enable</a> Javascript to navigate the interface properly.
						Download From
						</div>
					</div>
				</noscript>
				<!-- Page Head -->
				<ul class="shortcut-buttons-set">
					<li>
						<a class="shortcut-button" href="index.php/page/add">
							<span>
								<img src="template/backend/simpla-admin/resources/images/icons/add-a-page.png" style="width:48px;height:48px" alt="icon" /><br />
								Add a page
							</span>
						</a>
					</li>
					<li>
						<a class="shortcut-button" href="index.php/page/view">
							<span>
								<img src="template/backend/simpla-admin/resources/images/icons/all-page.png" style="width:48px;height:48px" alt="icon" /><br />
								All pages
							</span>
						</a>
					</li>
					<li>
						<a class="shortcut-button" href="index.php/appearance/editor">
							<span>
								<img src="template/backend/simpla-admin/resources/images/icons/editor.png" style="width:48px;height:48px" alt="icon" /><br />
								Editor
							</span>
						</a>
					</li>
					<li>
						<a class="shortcut-button" href="index.php/menu/add">
							<span>
								<img src="template/backend/simpla-admin/resources/images/icons/add-a-menu.png" style="width:48px;height:48px" alt="icon" /><br />
								Add a menu
							</span>
						</a>
					</li>
					<li>
						<a class="shortcut-button" href="index.php/menu/addcat">
							<span>
								<img src="template/backend/simpla-admin/resources/images/icons/add-a-cat.png" style="width:48px;height:48px" alt="icon" /><br />
								Add a category
							</span>
						</a>
					</li>
					<li>
						<a class="shortcut-button" href="index.php/menu/view">
							<span>
								<img src="template/backend/simpla-admin/resources/images/icons/all-menu.png" style="width:48px;height:48px" alt="icon" /><br />
								All menus
							</span>
						</a>
					</li>
					<li>
						<a class="shortcut-button" href="index.php/logo/add">
							<span>
								<img src="template/backend/simpla-admin/resources/images/icons/add-a-logo.png" style="width:48px;height:48px" alt="icon" /><br />
								Add a logo
							</span>
						</a>
					</li>
					<li>
						<a class="shortcut-button" href="index.php/social/add">
							<span>
								<img src="template/backend/simpla-admin/resources/images/icons/social-network.png" style="width:48px;height:48px" alt="icon" /><br />
								Social network
							</span>
						</a>
					</li>
				</ul>
				<div class="clear"></div> <!-- End .clear -->
				<?php 
					if(isset($template) && !empty($template)) $this->load->view($template);
				?>
			</div> <!-- End #main-content -->
	</div>
</body>
</html>

