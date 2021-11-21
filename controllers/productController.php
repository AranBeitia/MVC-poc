<?php
require_once MODELS . "productModel.php";

$action = "";

if(isset($_GET["action"])) {
	$action = $_GET["action"];
}

if(function_exists($action)) {
	call_user_func(($action));
} else {
	error("La función que intentas llamar no existe");
}

function getAllProducts() {
	$products = get();

	if(isset($products)) {
		require_once VIEWS . "/product/productDashboard.php";
	} else {
		error("Ha habido un problema con la base de datos");
	}
}

function deleteProduct($id) {
	echo 'Deleting...' . $id;
}

function editProduct($id) {
	echo 'editing...' . $id;
}

function createProduct() {
	echo 'creating product...';
}

function error($errorMsg) {
	require_once VIEWS . "/error/error.php";
}