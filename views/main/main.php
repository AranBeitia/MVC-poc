<!-- This is the main generic view of your application, it's not required to use it -->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Main view</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
	<h1>Main view</h1>
	<div class="list-group">
		<a class="list-group-item list-group-item-action" href="?controller=employee&action=getAllEmployees">Employee Controller</a>
		<a class="list-group-item list-group-item-action" href="?controller=hobbie&action=getAllHobbies">Hobbie Controller</a>
</div>
</body>
</html>