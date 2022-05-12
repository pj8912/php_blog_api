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
			background-color: #eee;
			padding: 20px 5px;

		}

		button {
			padding: 10px;
			border-radius: 5px;
			color: white;
			background: dodgerblue;
			border: 1px solid inherit;
			cursor: pointer;
		}
	</style>


</head>

<body>



	<!-- fetchPost  -->
	<div style="float:left; width:50%; margin:5px; padding:2px">
		<h1> Get Posts </h1>
		<p  id="post-box" class="box"> Post...</p>
		<p><button id="getPost" onclick = "fetchPosts()"> Get Post </button></p>
	</div>



	<!-- create Posts -->
	<div style="float:right; width:40%; padding:10px">
		<form method="POST">
			<p class="success_div" style="color:lightgreen"></p>

			<input type="text" class="title" name="title" placeholder="Post  Title"><br><br>

			<textarea name="body" class="body" cols="30" rows="10" placeholder="Post Body"></textarea><br><br>

			<input type="text" class="author" name="author" placeholder="Post Author"><br>

			<br>
			<select class="cat" name="category">
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

						echo '<option value="' . $row['c_id'] . '">' . $row['c_name'] . '</option>';
					}
				} else {

					echo "NO categories";
				}

				?>
			</select>

			<br><br>
			<button id="sendPost" type="submit" onclick="uploadMessage()"> Create Post </button>
			<!-- </form> -->
		</form>
	</div>

</body>
<script src="src/main.js"></script>

</html>