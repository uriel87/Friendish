<!DOCTYPE html>
<html>
	<head>
		<title>Profile user</title>
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
			<?php
				$id = $_GET['id'];
				$query = "SELECT * FROM tbl_users_220 WHERE id = ".$id;
				$result = mysqli_query($connection, $query);
				$row = mysqli_fetch_assoc($result);
			?>
			<article class="backgroundDetailsUser">
				<div class="container">
					<section id="userSec">
						<section id="profileUser">
							<?php echo "<img src='images/".$row['name'].$row['id']."profilePic.jpg' class='img-circle' alt=".$row['name']." title=".$row['name'].">" ?>
							<h2 id="profillName"><?php echo $row['name']." ".$row['age'] ?></h2>
							<h2 id="adress"><?php echo $row["city"].", ".$row["country"] ?></h2>
							<div class="rating">
							<?php
								echo "<ul>";
										for($i = 0; $i < $row['ranking']; $i++) {
											echo "<li><i class='fa fa-star fa-2x red-border' id='star1'></i></li>";
										};
										while( $i < 5) {
											echo "<li><i class='fa fa-star-o fa-2x red-border' id='star2'></i></li>";
											$i++;
										};
						 		echo "</ul>"
							?>
							</div>
						</section>
						<section id="CategoryTripUser">
							<h3>My categories trip</h3>
							<?php
								echo	"<ol class='breadcrumb'>";
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
						 		echo	"</ol>";
							?>
						</section>
						<section id="aboutMe">
							<h3>About me</h3>
							<p><?php echo $row["description"] ?></p>
							<?php echo "<img src='images/".$row['name'].$row['id']."placePic.jpg' alt=".$row['city']." title=".$row['city'].">" ?>
						</section>
					</section>
					<section id="contractBox">
						<ul class="list-group">
							<li class="list-group-item"><a href="offerDinner.html"><i class="fa fa-cutlery fa-2x"></i>Offer a dinner</a></li>
							<li class="list-group-item"><a href="#"><i class="fa fa-heart-o fa-2x"></i>Add to favorite</a></li>
							<li class="list-group-item"><a href="inboxUser.html"><i class="fa fa-envelope-o fa-2x"></i>Send a message</a></li>
						</ul>	
					</section>
				</div>
			</article>
			<article id="secComments">
				<h2><?php echo $row['name']?> review</h2>
				<section class="comment container">
					<hr>
					<section class="pictureComment">
						<img src="images/review1.jpg" class="img-circle" alt="name" title="name">
						<h4>George Bin</h4>
					</section>
					<section class="rightSecComment">
						<section class="detailsComment">
							<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
						</section>
						<div class="rating">
							<ul>
							    <li><i class="fa fa-star fa-2x yellow-border" id="star1"></i></li>
								<li><i class="fa fa-star-o fa-2x yellow-border" id="star2"></i></li>
								<li><i class="fa fa-star-o fa-2x yellow-border" id="star3"></i></li>
								<li><i class="fa fa-star-o fa-2x yellow-border" id="star4"></i></li>
								<li><i class="fa fa-star-o fa-2x yellow-border" id="star5"></i></li>
							</ul>
						</div>
					</section>
				</section>
				<section class="comment container">
					<hr>
					<section class="pictureComment">
						<img src="images/review2.jpg" class="img-circle" alt="name" title="name">
						<h4>Dennis Berglin</h4>
					</section>
					<section class="rightSecComment">
						<section class="detailsComment">
							<p>My parents very much enjoyed staying with Kali and her lovely daughter. </p>
						</section>
						<div class="rating">
							<ul>
								<li><i class="fa fa-star fa-2x yellow-border" id="star1"></i></li>
								<li><i class="fa fa-star fa-2x yellow-border" id="star2"></i></li>
								<li><i class="fa fa-star fa-2x yellow-border" id="star3"></i></li>
								<li><i class="fa fa-star-o fa-2x yellow-border" id="star4"></i></li>
								<li><i class="fa fa-star-o fa-2x yellow-border" id="star5"></i></li>
							</ul>
						</div>
					</section>
				</section>
				<section class="comment container">
					<hr>
					<section class="pictureComment">
						<img src="images/review3.jpg" class="img-circle" alt="name" title="name">
						<h4>Michael Delon</h4>
					</section>
					<section class="rightSecComment">
						<section class="detailsComment">
							<p>All the reviews you will read here on Airbnb about Kali's spectacular home and her welcoming nature are spot on. Both Kali and her daughter Sienna made us feel at home. And I have to say the beds are oh so comfortable! I slept like a baby. Hers is, in my opinion, the perfect home.</p>
						</section>
						<div class="rating">
							<ul>
							    <li><i class="fa fa-star fa-2x yellow-border" id="star1"></i></li>
								<li><i class="fa fa-star fa-2x yellow-border" id="star2"></i></li>
								<li><i class="fa fa-star-o fa-2x yellow-border" id="star3"></i></li>
								<li><i class="fa fa-star-o fa-2x yellow-border" id="star4"></i></li>
								<li><i class="fa fa-star-o fa-2x yellow-border" id="star5"></i></li>
							</ul>
						</div>
					</section>
				</section>
			</article>
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
		<div class="clear"></div>
	</body>
</html>

