<!DOCTYPE html>
<?php
    $brandId = $_GET["brandId"];
	$brandName = "";
    $method = "insert";

	if (isset($brandId)) {
		$method = "update";
		$conn = mysqli_connect('db', 'outside', 'password', 'sodaphp');
		$stmt = "SELECT NAME FROM BRAND WHERE ID = ?";
		$prepStmt = $conn->prepare($stmt);
        $prepStmt->bind_param('i', $brandId);
		$prepStmt->execute();
		$res = $prepStmt->get_result();
		$row = $res->fetch_assoc();
		$brandName = $row["NAME"];
		$prepStmt->close();
        $conn->close();
	}

?>

<html>
	
	<head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="./styles.css"></head>
	</head>
	
	<body>
        <div id="navbar">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="#">
                    <img src="/assets/php-logo.png" width="60" height="50" class="d-inline-block align-top" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
						<li class="nav-item active">
                            <a class="nav-link" href="soda.php">New Soda<span class="sr-only">(current)</span></a>
                        </li>
						<li class="nav-item active">
                            <a class="nav-link" href="brand.php">New Brand<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="soda-list.php">Soda List<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="brand-list.php">Brand list</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
		<div class="central">
			<form action="/brand-action.php" method="post">
                <input type="hidden" id="format" name="format" value="<?=$method?>">
                <input type="hidden" id="brandId" name="brandId" value=<?=$brandId?>>
				<div class="form-group">
					<label for="brandName">Brand name</label>
					<input type="text" class="form-control" id="brandName" name="brandName" placeholder="Brand name" value="<?=$brandName?>">
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-outline-primary">SAVE</button>
				</div>
			</form>
		</div>

	</body>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</html>