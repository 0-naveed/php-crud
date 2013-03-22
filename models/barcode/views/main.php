<html>
	<head>
		<link rel="stylesheet" type="text/css" href="/admin/css/admincss.css">
	</head>
	<body>
		<div align="left" class="bodydiv">
			<div class="actions"><a href="<?php echo n_common_res::$home_url; ?>?action=create">Add New</a>&nbsp;||&nbsp;<a href="<?php echo n_common_res::$home_url; ?>">See All</a></div>
			<h1>Barcodes</h1>
			<h2 align="center" style="color:red"></h2>
			<?php
				include_once($file); 
			?>
		</div>
	</body>
</html>
