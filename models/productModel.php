<?php
require_once "helper/dbConnection.php";

function get() {
	$query = conn()->prepare(
		"SELECT id, name, category, price, stock
		 	FROM products
			ORDER BY id ASC;"
	);

	try {
		$query->execute();
		$products = $query->fetchAll();
		return $products;
	} catch (PDOException $e) {
		return [];
	}
}

function getById($id) {
	
}