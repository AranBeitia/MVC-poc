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
	$query = conn()->prepare(
		"SELECT id, name, category, price, stock
		 FROM products
		 WHERE id = $id;"
	);

	try {
		$query->execute();
		$product = $query->fetch();
		return $product;
	} catch (PDOException $e) {
		return [];
	}
}

function create($product) {
	$query = conn()->prepare(
		"INSERT into products (name, category, price, stock)
		 VALUES (:name, :category, :price, :stock)"
	);

	try {
		$query->execute([
			"name" => $product["inputName"],
			"category" => $product["inputCategory"],
			"price" => $product["inputPrice"],
			"stock" => $product["inputStock"]
		]);
		return [true];
	} catch (PDOException $e) {
		return [false, $e];
	}
}

function update($product) {
	$query = conn()->prepare(
		"UPDATE products SET name = :name, 
			category = :category,
			price = :price,
			stock = :stock
		WHERE id = :id"
		);

	try {
		$query->execute([
			"name" => $product["inputName"],
			"category" => $product["inputCategory"],
			"price" => $product["inputPrice"],
			"stock" => $product["inputStock"],
			"id" => $product["inputId"],
		]);
		return [true];
	} catch (PDOException $e) {
		return [false, $e];
	}
}

function delete($id) {
	$query = conn()->prepare(
		"DELETE from products
		 WHERE id = $id"
	);

	try {
		$query->execute();
		return [true];
	} catch (PDOException $e) {
		return [false, $e];
	}
}