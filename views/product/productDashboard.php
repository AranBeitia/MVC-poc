<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Product view</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<main class="container">
	<h1>Products dashboard page</h1>
	<table class="table table-striped">
			<thead class="table-dark">
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Category</th>
					<th>Price</th>
					<th>Stock</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($products as $index => $product) {?>
				<tr>
					<td><?php echo $product["id"] ?></td>
					<td><?php echo $product["name"] ?></td>
					<td><?php echo $product["category"] ?></td>
					<td><?php echo $product["price"] ?>€</td>
					<td><?php echo $product["stock"] ?> ut.</td>
					<td>
						<a 
							href='?controller=product&action=getProduct&id="<?php echo $product["id"]?>"' 
							class="btn btn-dark"
						>Edit</a>
						<a 
							href='?controller=product&action=deleteProduct&id="<?php echo $product["id"]?>"' 
							class="btn btn-danger"
						>Delete</a>
					</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<a 
			id="home" 
			class="btn btn-dark" 
			href="?controller=product&action=createProduct"
		>Create</a>
		<a 
			id="home" 
			class="btn btn-outline-dark" 
			href="./"
		>Back</a>
	</main>
</body>
</html>