<?php 
function full_url(){
			$ssl = (isset($_SERVER['HTTPS']) && !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on')? true:false;
			$sp = strtolower($_SERVER['SERVER_PROTOCOL']);
			$protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl)? 's':'');

			$port = $_SERVER['SERVER_PORT'];
			$port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
			$host = (isset($use_forwarded_host) && isset($_SERVER['HTTP_X_FORWARDED_HOST'])) ? $_SERVER['HTTP_X_FORWARDED_HOST'] : (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : null);
			$host = isset($host) ? $host : $_SERVER['SERVER_NAME'] . $port;

			return $protocol . '://'. $host . $_SERVER['REQUEST_URI'];
		}
?>
<div class="content-box"><!-- Start Content Box -->
	<div class="content-box-header">
		<h3>View all menus</h3>
		<div class="clear"></div>
	</div> <!-- End .content-box-header -->
	<form action="" method="post">
		<div class="content-box-content">
		<!-- inform information -->
		<?php 
		$flashdata = $this->session->flashdata('flash_data');
		if(isset($flashdata) && !empty($flashdata)){
			if($flashdata['type'] == 'success'){
		?>
				<div class='notification success png_bg'>
					<a href='#' class='close'><img src='template/backend/simpla-admin/resources/images/icons/cross_grey_small.png' title='Close this notification' alt='close' /></a>
					<div>
		<?php
					echo $flashdata['message'];
		?>
					</div>
				</div>
		<?php
			} elseif($flashdata['type'] == 'error'){
		?>
				<div class='notification error png_bg'>
					<a href='#' class='close'><img src='template/backend/simpla-admin/resources/images/icons/cross_grey_small.png' title='Close this notification' alt='close' /></a>
					<div>
		<?php
					echo $flashdata['message'];
		?>
					</div>
				</div>
		<?php
			}
		}
		?>
		<div class="tab-content default-tab" id="tab1"> 
		<table>
			<thead>
				<tr>
					<th><input class="check-all" type="checkbox" /></th>
					<th>Title</th>
					<th>Menu Id</th>
					<th>Edit</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				if(isset($list_menu) && count($list_menu)){
					foreach ($list_menu as $value) {
			?>
				<tr>
					<td><input type="checkbox" name="checkbox[]" value="<?php echo $value['id'] ?>"/></td>
					<td><a href="index.php/menu/viewcat/<?php echo $value['id'] ?>?redirect=<?php echo base64_encode(full_url())?>" title="title"><?php echo htmlspecialchars($value['title']); ?></a></td>
					<td><?php echo $value['id']; ?></td>
					<td>
					<!-- Icons -->
					<a href="index.php/menu/delete/<?php echo $value['id'] ?>?redirect=<?php echo base64_encode(full_url())?>" title="Delete"><img src="template/backend/simpla-admin/resources/images/icons/cross.png" alt="Delete" /></a> 
					<a href="index.php/menu/viewcat/<?php echo $value['id'] ?>?redirect=<?php echo base64_encode(full_url())?>" title="Edit"><img src="template/backend/simpla-admin/resources/images/icons/hammer_screwdriver.png" alt="Edit" /></a>
					</td>
				</tr>
			<?php
					}
				}else{
			?>
				<tr><td colspan="4">There is no element.</td></tr>
			<?php
			}
			?>
			</tbody>
								 
		<tfoot>
			<tr>
				<td colspan="4">
					<?php echo isset($pagination)? $pagination:''; ?>
				</td>
			</tr>
		</tfoot>

		</table>
		</div> <!-- End #tab1 -->
		</div> <!-- End .content-box-content -->
		
	</form>

</div> <!-- End .content-box -->