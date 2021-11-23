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

function create ($customer) {
	$query = conn()->prepare(
		"INSERT INTO customers (name, last_name, email, age, phone_number, city, address, country, zip)
		 VALUES (?,?,?,?,?,?,?,?,?);"
	);

	$query->bindParam(1, $customer["name"]);
	$query->bindParam(2, $customer["last_name"]);
	$query->bindParam(3, $customer["email"]);
	$query->bindParam(4, $customer["age"]);
	$query->bindParam(5, $customer["phone_number"]);
	$query->bindParam(6, $customer["city"]);
	$query->bindParam(7, $customer["address"]);
	$query->bindParam(8, $customer["country"]);
	$query->bindParam(9, $customer["zip"]);

	try {
		$query->execute();
		return [true];
	} catch (PDOException $e) {
		return [false, $e];
	}
}

function update($customer) {
	print_r($customer);
	$query = conn()->prepare(
		"UPDATE customers
		 SET name = ?, last_name = ?, email = ?,  age = ?, phone_number = ?, city = ?, address = ?, country = ?, zip = ?
		 WHERE id = ?"
	);

	$query->bindParam(1, $customer["inputName"]);
	$query->bindParam(2, $customer["inputLastName"]);
	$query->bindParam(3, $customer["inputEmail"]);
	$query->bindParam(4, $customer["inputAge"]);
	$query->bindParam(5, $customer["inputPhoneNumber"]);
	$query->bindParam(6, $customer["inputCity"]);
	$query->bindParam(7, $customer["inputAddress"]);
	$query->bindParam(8, $customer["inputCountry"]);
	$query->bindParam(9, $customer["inputZip"]);
	$query->bindParam(10, $customer["inputId"]);

	try {
		$query->execute();
		// echo preg_replace('?', $username, $result->queryString);
		echo $query->queryString;

		return [true];
	} catch (PDOException $e) {
		echo $e-> getMessage();
		return [false, $e];
	}
}

function delete($id) {
	$query = conn()->prepare(
		"DELETE from customers
		 WHERE id = ?" 
	);
	$query->bindParam(1, $id);

	try {
		$query->execute();
		return [true];
	} catch (PDOException $e) {
		return [false, $e];
	}
}
