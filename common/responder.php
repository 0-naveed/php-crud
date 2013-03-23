<?php

	include($_SERVER['DOCUMENT_ROOT'] . '/projs/smart_wallet/n_crud/common/main.php');
	n_config_db::init();
	n_config_gen::init();
	$service1 = new n_service('youbi_n_barcode',array('code'));//table name and non-id columns
	$service1->resolve_request($service1->req);

?>
