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

function getProduct($request) {
	$action = $request["id"];
	$product = null;

	if(isset($request["id"])) {
		$product = getById($request["id"]);
	}
	require_once VIEWS . "/product/product.php";
}

function updateProduct($request) {
	$action = $request["action"];

	if(sizeof($_POST) > 0) {
		$product = update($_POST);

		if($product[0]) {
			header("Location: index.php?controller=product&action=getAllProducts");
		}
	}
}

function createProduct($request) {
	$action = $request["action"];
	
	if(sizeof($_POST) > 0) {
		$product = create($_POST);

		if($product[0]) {
			header("Location: index.php?controller=product&action=getAllProducts");
		}	
	}
	require_once VIEWS . "/product/product.php";
}

function deleteProduct($request) {
	$action = $request["action"];
	$product = null;

	if(isset($request["id"])) {
		$product = delete($request["id"]);
		header("Location: index.php?controller=product&action=getAllProducts");
	}
}

function error($errorMsg) {
	require_once VIEWS . "/error/error.php";
}