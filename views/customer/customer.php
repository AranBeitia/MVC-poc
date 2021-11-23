<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Customer Page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<main class="container">
		<h1>Customer page</h1>
		<?php 
			if($action == "getCustomer" && (!isset($customer) || !$customer  || sizeof($customer) == 0)) {
				echo "<p>The customer doesnt exist</p>";
			} else if (isset($error)){
				echo "<p>$error</p>";
			}
		?>
		<form 
			class="row g-3" 
			action='?controller=customer&action=<?php echo isset($customer["id"]) ? "updateCustomer":"createCustomer" ?>' 
			method="post"
		>
			<input type="hidden" name="inputId" value="<?= isset($customer["id"]) ? $customer["id"] : null?>">
			<div class="col-md-6">
				<label for="inputName" class="form-label">Name</label>
				<input 
					type="text" 
					class="form-control" 
					id="inputName"
					name="inputName" 
					value="<?php echo isset($customer["name"]) ? $customer["name"] : null ?>"
				>
			</div>
			
			<div class="col-md-6">
				<label for="inputLastName" class="form-label">Last Name</label>
				<input 
					type="text" 
					class="form-control" 
					id="inputLastName"
					name="inputLastName"
					value="<?php echo isset($customer["last_name"]) ? $customer["last_name"] : null ?>"
				>
			</div>
			<div class="col-md-2">
				<label for="inputAge" class="form-label">Age</label>
				<input 
					type="number" 
					class="form-control" 
					id="inputAge" 
					name="inputAge"
					value="<?php echo isset($customer["age"]) ? $customer["age"]: null ?>"
				>
			</div>
			<div class="col-md-4">
				<label for="inputPhoneNumber" class="form-label">Phone number</label>
				<input 
					type="number" 
					class="form-control" 
					id="inputPhoneNumber"
					name="inputPhoneNumber"
					value="<?php echo isset($customer["phone_number"]) ? $customer["phone_number"]: null ?>"
				>
			</div>
			<div class="col-md-6">
				<label for="inputEmail" class="form-label">Email</label>
				<input 
					type="email" 
					class="form-control" 
					id="inputEmail" 
					name="inputEmail"
					value="<?php echo isset($customer["email"]) ? $customer["email"]: null ?>"
				>
			</div>
			<div class="col-6">
				<label for="inputAddress" class="form-label">Address</label>
				<input 
					type="text" 
					class="form-control" 
					id="inputAddress"
					name="inputAddress"
					value="<?php echo isset($customer["address"]) ? $customer["address"]: null ?>"
				>
			</div>

			<div class="col-md-6">
				<label for="inputCity" class="form-label">City</label>
				<input 
					type="text" 
					class="form-control" 
					id="inputCity" 
					name="inputCity"
					value="<?php echo isset($customer["city"]) ? $customer["city"]: null ?>"
				>
			</div>
			<div class="col-md-4">
				<label for="inputCountry" class="form-label">Country</label>
				<select id="inputCountry" name="inputCountry" class="form-select">
					<option selected>Choose...</option>
					<option value="England" <?php echo isset($customer["country"]) && $customer["country"] === "England" ? "selected" : null ?>>England</option>
					<option value="France" <?php echo isset($customer["country"]) && $customer["country"] === "France" ? "selected" : null ?>>France</option>
					<option value="Spain" <?php echo isset($customer["country"]) && $customer["country"] === "Spain" ? "selected" : null ?>>Spain</option>
				</select>
			</div>
			<div class="col-md-2">
				<label for="inputZip" class="form-label">Zip</label>
				<input type="text" class="form-control" id="inputZip" name="inputZip" value="<?php echo isset($customer["zip"]) ? $customer["zip"] : null ?>">
			</div>
			<div class="col-md-6">
				<label for="inputProduct" class="form-label">Product</label>
				<select id="inputProduct" name="inputProduct" class="form-select">
					<option selected>Choose...</option>
					<option value="1" <?php echo isset($customer["product_id"]) && $customer["roduct_id"] === 1 ? "selected" : null ?>>Bulllit I</option>
					<option value="2" <?php echo isset($customer["product_id"]) && $customer["product_id"] === 2 ? "selected" : null ?>>Moto 3 I</option>
					<option value="3" <?php echo isset($customer["product_id"]) && $customer["product_id"] === 3 ? "selected" : null ?>>Snow IV</option>
					<option value="4" <?php echo isset($customer["product_id"]) && $customer["product_id"] === 4 ? "selected" : null ?>>Street III</option>
					<option value="5" <?php echo isset($customer["product_id"]) && $customer["product_id"] === 5 ? "selected" : null ?>>Dirt V</option>
				</select>
			</div>
			<div class="col-12">
				<button type="submit" class="btn btn-dark">Submit</button>
				<a href="?controller=customer&action=getAllCustomers" class="btn btn-outline-dark">Back</a>
			</div>
		</form>
	</main>
</body>
</html>