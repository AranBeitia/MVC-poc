<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Customer view</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
	<main class="container">
		<h1>Customer Dashboard page!</h1>
		<table class="table table-striped">
			<thead class="table-dark">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Email</th>
					<th>Product</th>
					<th>City</th>
					<th>Age</th>
					<th>Phone Number</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php
				foreach ($customers as $index => $customer) { ?>
				<tr>
					<td><?php echo $customer["id"] ?></td>
					<td><?php echo $customer["name"] ?></td>
					<td><?php echo $customer["email"] ?></td>
					<td><?php echo $customer["product"] ?></td>
					<td><?php echo $customer["city"] ?></td>
					<td><?php echo $customer["age"] ?></td>
					<td><?php echo $customer["phone_number"] ?></td>
					<td colspan="2">
						<a 
							class='btn btn-dark' 
							href='?controller=customer&action=getCustomer&id="<?php echo $customer["id"] ?>"'
						>Create</a>
						<a 
							class='btn btn-danger' 
							href='?controller=customer&action=deleteCustomer&id="<?php echo $customer["id"] ?>"'
						>Delete</a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<a id="home" class="btn btn-dark" href="?controller=customer&action=createCustomer">Create</a>
		<a id="home" class="btn btn-outline-dark" href="./">Back</a>
	</main>
</body>

</html>