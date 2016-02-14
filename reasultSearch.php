<!DOCTYPE html>
<html>
	<head>
		<title>Reasult search</title>
		<meta charset="UTF-8">
		<script src="include/jquery-2.1.4.js"></script>
		<link href="include/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="include/style.css">
		<?php include 'dbConnection.php'; ?>
	</head>
	<body>
		<header>
			<button id="menuBtn">
				<span class="fa fa-bars fa-2x"></span>
			</button>
			<a href="index.html" id="logo"></a>
			<nav>
				<ul id="navMobile">
					<li><a href="index.html">Home</a></li>
					<li><a href="myProfile.php">My profile</a></li>
					<li><a href="#">Log Out</a></li>
				</ul>
				<button class="searchBtn">
					<span class="fa fa-search fa-2x"></span>
				</button>
			</nav>
			<div class="clear"></div>
			<aside class="invis">
				<div id="menuHideBlock">
					<button id="imgMenuHide"></button>
				</div>
				<section class="wrapper">
					<form action="reasultSearch.php" method="get" role="form">
						<div class="searchBlock">
							<label id="topSearch">
								<input type="text" list="indexCategory" name="category" placeholder="What do you want to see?" id="searchBox">
								<datalist class="icon" id="indexCategory">
									<option value="Pubcrawl" label="Pub crawl"></option>
									<option value="Sport" label="Sport"></option>
									<option value="Culture" label="Culture"></option>
									<option value="Tracking" label="Tracking"></option>
									<option value="Family" label="Family"></option>
									<option value="Safary" label="Safary"></option>
								</datalist>
							</label>
							<label>
								<input id="whereBox" type="text" name="place" placeholder="Where do you want to go?" />
							</label>
							<label>
								<select id="guestBox" name="guestNum">
									<option value="1">1 Guest</option>
									<option value="2">2 Guests</option>
									<option value="3">3 Guests</option>
									<option value="4">4 Guests</option>
								</select>
							</label>
							<label>
								<input id="checkInBox" name="CheckIn" placeholder="Check In" type="text" class="icon">
							</label>
							<label>
								<input id="checkOutBox" name="CheckOut" placeholder="Check Out" type="text" class="icon">
							</label>
							<button type="submit">Search</button>
							<div class="clear"></div>
						</div>
					</form>
				</section>
			</aside>
		</header>
		<main>
			<section class="container">
				<?php
				if (isset($_GET['category'])) {
					$category = $_GET['category'];
					$category = str_replace(' ', '', $category);
				}

				if (isset($_GET['place'])) {
					$city = $_GET['place'];
					$country = $_GET['place'];
				}

				if( (empty($city)) && (!empty($category)) ) {
						$query = "SELECT * FROM tbl_users_220 WHERE ".$category." = 1 ORDER BY ranking DESC;";
					}

				if((!empty($_GET['place'])) && (empty($category))) {
						$query = "SELECT * FROM tbl_users_220 WHERE city = '".$city."' OR country= '".$country."' ORDER BY ranking DESC;";
					}

				if((!empty($_GET['place'])) && (!empty($category))) {
						$query = "SELECT * FROM tbl_users_220 WHERE ".$category." = 1 AND (city = '".$city."' OR country= '".$country."') ORDER BY ranking DESC;";
					}

				if(!$query) {
						$query = 1;
						echo "<section class='noResultContext'>
								  <h1>No result</h1>
								  <a href='index.html'>Return to home page</a>
							</section>";
					}

					$result = mysqli_query($connection, $query);
					if(!$result) {
						die("");
					}
					while($row = mysqli_fetch_assoc($result)) {
						echo "<article class='detailes_person_box'>
								<div class='content'>
									<a href='profileUser.php?id=".$row['id']."'><img src='images/".$row['name'].$row['id']."searchPic.jpg' alt=".$row['name']." title=".$row['name']."></a>
									<ul class='starLine'>";
										for($i = 0; $i < $row['ranking']; $i++) {
											echo "<li><i class='fa fa-star fa-2x red-border' id='star1'></i></li>";
										};
										while( $i < 5) {
											echo "<li><i class='fa fa-star-o fa-2x red-border' id='star2'></i></li>";
											$i++;
										};
						echo 		"</ul>
									<p class='pPhotoName'>".$row["name"]." ".$row["age"]."</p>
									<p class='pPlace'>".$row["city"].", ".$row["country"]."</p>
									<ol class='pPhotoDetails breadcrumb'>";
										if($row["Pubcrawl"] == 1) {
											echo "<li>Pub crewling</li>";
										}
										if($row["Sport"] == 1) {
											echo "<li>Sport</li>";
										}
										if($row["Culture"] == 1) {
											echo "<li>Culture</li>";
										}
										if($row["Tracking"] == 1) {
											echo "<li>Tracking</li>";
										}
										if($row["Family"] == 1) {
											echo "<li>Family</li>";
										}
										if($row["Safary"] == 1) {
											echo "<li>Safary</li>";
										}
						echo 		"</ol>
								</div>
							</article>";
				}?>
			</section>
		</main>
		<footer>
			<section id="navsLinks">
				<nav>
					<h2>Categories</h2>
					<ul>
						<li><a href="reasultSearch.php?category=Pubcrawl">Pub crawl</a></li>
						<li><a href="reasultSearch.php?category=Sport">Sport</a></li>
						<li><a href="reasultSearch.php?category=Culture">Culture</a></li>
						<li><a href="reasultSearch.php?category=Tracking">Tracking</a></li>
						<li><a href="reasultSearch.php?category=Family">Family</a></li>
						<li><a href="reasultSearch.php?category=Safary">Safary</a></li>
					</ul>
				</nav>
				<nav>
					<h2>Connect us</h2>
					<ul>
						<li>Tel-Aviv, Rothschild 20</li>
						<li>Israel</li>
						<li>Email: Friendish@gmail.com</li>
						<li>Tel: +9720000000000</li>
					</ul>
				</nav>
				<div class=clear></div>
			</section>
			<section id="navSocialIcons">
			<hr>
			<h3>Follow us</h3>
				<article class="social-links">
					<ul>
					    <li><a href="#"><i class="fa fa-facebook fa-5x"></i></a></li>
					    <li><a href="#"><i class="fa fa-twitter fa-lg"></i></a></li>
					    <li><a href="#"><i class="fa fa-google-plus fa-lg"></i></a></li>
				    </ul>
				</article>
				<p><span class="fa fa-copyright"></span> Friendish, Inc</p>
			</section>
		</footer>
		<script src="include/script.js"></script>
	</body>
</html>

