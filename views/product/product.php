<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Product page</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
	<main class="container">
		<h1>Product page</h1>
		<?php 
			if($action == "getProduct" && (!isset($product) || !$product || sizeof($product) == 0)) {
				echo "<p>The product doesn\'t exist</p>";
			} else if (isset($error)) {
				echo "<p>$error</p>";
			}
		?>
		<form
			class="row g-3" 
			action='?controller=product&action=<?= isset($product["id"]) ? "updateProduct": "createProduct"?>'
			method="post"
		>
			<input
				type="hidden"
				name="inputId"
				value="<?= isset($product["id"]) ? $product["id"]: null ?>"
			>
			<div class="col-md-6">
				<label for="inputName" class="form-label">Name</label>
				<input 
					type="text" 
					class="form-control" 
					id="inputName"
					name="inputName" 
					value="<?= isset($product["name"]) ? $product["name"] : null ?>"
				>
			</div>
			<div class="col-md-6">
				<label for="inputCategory" class="form-label">Category</label>
				<input 
					type="text" 
					class="form-control" 
					id="inputCategory"
					name="inputCategory" 
					value="<?= isset($product["category"]) ? $product["category"] : null ?>"
				>
			</div>
			<div class="col-md-6">
				<label for="inputPrice" class="form-label">Price</label>
				<input 
					type="number" 
					class="form-control" 
					id="inputPrice"
					name="inputPrice" 
					value="<?= isset($product["price"]) ? $product["price"] : null ?>"
				>
			</div>
			<div class="col-md-6">
				<label for="inputStock" class="form-label">Stock</label>
				<input 
					type="number" 
					class="form-control" 
					id="inputStock"
					name="inputStock" 
					value="<?= isset($product["stock"]) ? $product["stock"] : null ?>"
				>
			</div>
			<div class="col-12">
				<button type="submit" class="btn btn-dark">Submit</button>
				<a href="?controller=product&action=getAllProducts" class="btn btn-outline-dark">Back</a>
			</div>
		</form>
	</main>
</body>
</html>