<?php
require_once("helper/dbConnection.php");

function get(){
	$query = conn()->prepare(
		"SELECT c.id, c.name, c.email, p.name as 'product', c.age, c.phone_number, c.city
		 FROM customers c
		 INNER JOIN products p ON c.product_id = p.id
		 ORDER BY c.id ASC;"
	);

	try {
		$query->execute();
		$customers = $query->fetchAll();
		return $customers;
	} catch (PDOException $e) {
		return [];
	}
}

function getById($id){
	$query = conn()->prepare(
		"SELECT id, name, last_name, email, city, age, phone_number, address, country, zip
		 FROM customers
		 WHERE id = $id;"
	);

	try {
		$query->execute();
		$customer = $query->fetch();
		return $customer;
	} catch (PDOException $e) {
		return [];
	}
}

function update($customer) {
	$query = conn()->prepare(
		"UPDATE customers
		 SET name = ?, email = ?, city = ?, age = ?, phone_number = ?
		 WHERE id = ?;"
	);

	$query->bindParam(1, $customer["name"]);
	$query->bindParam(2, $customer["email"]);
	$query->bindParam(3, $customer["city"]);
	$query->bindParam(4, $customer["age"]);
	$query->bindParam(5, $customer["phone_number"]);
	$query->bindParam(6, $customer["id"]);

	try {
		$query->execute();
		return [true];
	} catch (PDOException $e) {
		return [false, $e];
	}
}
