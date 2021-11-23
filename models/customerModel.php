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
		"SELECT id, name, last_name, email, city, age, phone_number, address, country, zip, product_id
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
		"INSERT INTO customers (name, last_name, email, age, phone_number, city, address, country, zip, product_id)
		 VALUES (:name, :last_name, :email, :age, :phone_number, :city, :address, :country, :zip, :productId)"
	);

	try {
		$query->execute([
			"name" => $customer["inputName"],
			"last_name" => $customer["inputLastName"],
			"email" => $customer["inputEmail"],
			"age" => $customer["inputAge"],
			"phone_number" => $customer["inputPhoneNumber"],
			"city" => $customer["inputCity"],
			"address" => $customer["inputAddress"],
			"country" => $customer["inputCountry"],
			"zip" => $customer["inputZip"],
			"productId" => $customer["inputProduct"]
		]);
		return [true];
	} catch (PDOException $e) {
		return [false, $e];
	}
}

function update($customer) {
	$query = conn()->prepare(
		"UPDATE customers
		 SET name = :name, 
		 last_name = :last_name, 
		 email = :email,  
		 age = :age, 
		 phone_number = :phone_number, 
		 city = :city, 
		 address = :address, 
		 country = :country, 
		 zip = :zip
		 WHERE id = :id"
	);

	try {
		$query->execute([
			"name" => $customer["inputName"],
			"last_name" => $customer["inputLastName"],
			"email" => $customer["inputEmail"],
			"age" => $customer["inputAge"],
			"phone_number" => $customer["inputPhoneNumber"],
			"city" => $customer["inputCity"],
			"address" => $customer["inputAddress"],
			"country" => $customer["inputCountry"],
			"zip" => $customer["inputZip"],
			"id" => $customer["inputId"]
		]);
		return [true];
	} catch (PDOException $e) {
		echo $e-> getMessage();
		return [false, $e];
	}
}

function delete($id) {
	$query = conn()->prepare(
		"DELETE from customers
		 WHERE id = $id" 
	);

	try {
		$query->execute();
		return [true];
	} catch (PDOException $e) {
		return [false, $e];
	}
}
