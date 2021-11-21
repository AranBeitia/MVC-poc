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
		"SELECT id, name, email, city, age, phone_number
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
