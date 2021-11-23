<?php
require_once MODELS . "productModel.php";

$action = "";

if(isset($_GET["action"])) {
	$action = $_GET["action"];
}

if(function_exists($action)) {
	call_user_func($action, $_GET);
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

function getProduct($request) {
	$action = $request["id"];
	$product = null;

	if(isset($request["id"])) {
		$product = getById($request["id"]);
	}
	require_once VIEWS . "/product/product.php";
}

function updateProduct() {
	echo 'updating product...';
	require_once VIEWS . "/product/product.php";
}

function createProduct($request) {
	$action = $request["action"];
	
	if(sizeof($_POST) > 0) {
		$product = create($_POST);

		if($product[0]) {
			header("Location: index.php?controller=product&action=getAllProducts");
		}
		print_r($_POST);
		
	}
	require_once VIEWS . "/product/product.php";
}

function error($errorMsg) {
	require_once VIEWS . "/error/error.php";
}