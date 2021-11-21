<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Employee view</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
	<main class="container">
		<h1>Employee Dashboard page!</h1>
		<table class="table table-striped">
			<thead class="table-dark">
				<tr>
					<th class="tg-0pky">ID</th>
					<th class="tg-0pky">Name</th>
					<th class="tg-0lax">Email</th>
					<th class="tg-0lax">Gender</th>
					<th class="tg-0lax">City</th>
					<th class="tg-0lax">Age</th>
					<th class="tg-0lax">Phone Number</th>
					<th class="tg-0lax">Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php
				foreach ($employees as $index => $employee) { ?>
				<tr>
					<td><?php echo $employee["id"] ?></td>
					<td><?php echo $employee["name"] ?></td>
					<td><?php echo $employee["email"] ?></td>
					<td><?php echo $employee["gender"] ?></td>
					<td><?php echo $employee["city"] ?></td>
					<td><?php echo $employee["age"] ?></td>
					<td><?php echo $employee["phone_number"] ?></td>
					<td colspan="2">
						<a class='btn btn-dark' href='?controller=employee&action=getEmployee&id="<?php echo $employee["id"] ?>"'>Edit</a>
						<a class='btn btn-danger' href='?controller=employee&action=deleteEmployee&id="<?php echo $employee["id"] ?>"'>Delete</a>
					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
		<a id="home" class="btn btn-dark" href="?controller=employee&action=createEmployee">Create</a>
		<a id="home" class="btn btn-outline-dark" href="./">Back</a>
	</main>
</body>

</html>