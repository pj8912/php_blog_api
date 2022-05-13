<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>BLOG REST API</title>

	<style>
		body {
			text-align: center;
			font-family: sans-serif;

		}

		h1 {
			font-weight: bold;
		}

		.box {
			border-radius: 5px;
			background-color: whitesmoke;
			padding: 20px 5px;

		}

		/* button {
			padding: 10px;
			border-radius: 5px;
			color: white;
			background: dodgerblue;
			border: 1px solid inherit;
			cursor: pointer;
		} */
	</style>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>



	<!-- fetchPost  -->
	<h1 class="p-4"> Get Posts </h1>
	<div id="post-box" class="p-4" style="float:left; width:50%; margin:5px; ">
		<!-- <p id="post-box" class=" card card-body rounded-0">  -->



		<button id="getPost" class="btn btn-primary" onclick="fetchPosts()"> Get Post </button>
	</div>



	<!-- create Posts -->
	<div class="card card-body p-5 border-0" style="float:right;  padding:10px; width:30%">
		<h1> Create Post </h1>
		<!-- <form method="POST"> -->
		<p class="success_div" style="color:lightgreen"></p>

		<input type="text" class="title form-control" name="title" placeholder="Post  Title"><br><br>

		<textarea name="body" class="body form-control" cols="30" rows="10" placeholder="Post Body"></textarea><br><br>

		<input type="text" class="author form-control" name="author" placeholder="Post Author"><br>

		<br>
		<select class="cat form-control" name="category">
			<option class="text-center"> SELECT CATEGORY</option>
			<?php
			require 'Database/Database.php';
			require 'models/Category.php';

			$database  = new Database();

			$db = $database->connect();

			$cat = new Category($db);

			$result =  $cat->getAllCategories();

			$num = $result->rowCount();
			if ($num > 0) {


				while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

					echo '<option class="form-control" value="' . $row['c_id'] . '">' . $row['c_name'] . '</option>';
				}
			} else {

				echo "NO categories";
			}

			?>
		</select>

		<br><br>
		<button id="sendPost" class="btn btn-primary" type="submit" onclick="uploadMessage()"> Create Post </button>
		<!-- </form> -->
	</div>

</body>
<script src="src/main.js"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</html>