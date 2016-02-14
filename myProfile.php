			


<?php
	include 'dbConnection.php';

	$query = "SELECT * FROM tbl_users_220_a Where id = 1";
	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($result);


	if (!empty($_GET['fullName'])) {
		$fullName = $_GET['fullName'];
	} else {
		$fullName = $row['name'];
	}

	if (!empty($_GET['mail'])) {
		$mail = $_GET['mail'];
	} else {
		$mail = $row['email'];
	}

	if (!empty($_GET['pass'])) {
		$pass = $_GET['pass'];
	} else {
		$pass = $row['password'];
	}

	if (!empty($_GET['Country'])) {
		$Country = $_GET['Country'];
	} else {
		$Country = $row['country'];
	}

	if (!empty($_GET['city'])) {
		$city = $_GET['city'];
	} else {
		$city = $row['city'];
	}

	if (!empty($_GET['phone'])) {
		$phone = $_GET['phone'];
	} else {
		$phone = $row['phone'];
	}





	// SET dataBase tbl_users_220_a
	$queryUpdate = "UPDATE tbl_users_220_a SET name =  '".$fullName."',  
	email =  '".$mail."', 
	password =  '".$pass."', 
	country =  '".$Country."', 
	city =  '".$city."',
	phone =  '".$phone."' 
	WHERE id = 1" ;

	$resultt = mysqli_query($connection, $queryUpdate);
	$query = "SELECT * FROM tbl_users_220_a Where id = 1";
	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($result);

?>


<!DOCTYPE html>
<html>
	<head>
		<title>My offer dinner</title>
		<meta charset="UTF-8">
		<script src="include/jquery-2.1.4.js"></script>
		<link href="include/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="include/style.css">
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
		<main class="globalContainer">
			<article id="navArtProfile">
					<nav>
						<ul>
							<li><a href="myProfile.php">Profile</a></li>
							<li><a href="myOfferDinner.html">Offers</a></li>
							<li><a href="inboxUser.html">Inbox</a></li>
							<li><a href="myProfile.php">Settings</a></li>
						</ul>
					</nav>
			</article>
			<article class="globalContainer">
				<aside id="asideNavMyProfile">
					<ul>
						<li><a href="#">General</a></li>
	    				<li><a href="#">Security</a></li>
	    				<li><a href="#">Privacy</a></li>
	    				<li><a href="#">Notifications</a></li>
	  				</ul>
				</aside>
				<section id="myProfileForm">
					<form action = "<?php $_PHP_SELF ?>" method="get">
						<div class="labelInputSetting">
							<p>Full name</p>
							<p class="currentSettingInput"><?php echo $row['name']; ?></p>
							<label><input type="text" name="fullName" value="" placeholder="Edit full name"></label>
							<a class="editInputSetting"><i class="fa fa-pencil"></i> Edit</a>
							<a class="cancelInputSetting"><i class="fa fa-times-circle"></i></i> Cancel</a>
						</div>
						<div class="labelInputSetting">
							<p>Email</p>
							<p class="currentSettingInput"><?php echo $row['email']; ?></p>
							<label><input type="email" name="mail" value="" placeholder="Edit Email"></label>
							<a class="editInputSetting"><i class="fa fa-pencil"></i> Edit</a>
							<a class="cancelInputSetting"><i class="fa fa-times-circle"></i></i> Cancel</a>
						</div>
						<div class="labelInputSetting">
							<p>Password</p>
							<p class="currentSettingInput"><?php for($i = 0; $i < 10; $i++) {
								echo "<i class='fa fa-circle'></i>";
								} ?></p>
							<label><input type="password" name="pass" value="" placeholder="Edit Password"></label>
							<a class="editInputSetting"><i class="fa fa-pencil"></i> Edit</a>
							<a class="cancelInputSetting"><i class="fa fa-times-circle"></i></i> Cancel</a>
						</div>
						<div class="labelInputSetting">
							<p>Country</p>
							<p class="currentSettingInput"><?php echo $row['country']; ?></p>
							<label><input type="text" name="Country" value="" placeholder="Edit Country"></label>
							<a class="editInputSetting"><i class="fa fa-pencil"></i> Edit</a>
							<a class="cancelInputSetting"><i class="fa fa-times-circle"></i></i> Cancel</a>
						</div>
						<div class="labelInputSetting">
							<p>City</p>
							<p class="currentSettingInput"><?php echo $row['city']; ?></p>
							<label><input type="text" name="city" value="" placeholder="Edit City"></label>
							<a class="editInputSetting"><i class="fa fa-pencil"></i> Edit</a>
							<a class="cancelInputSetting"><i class="fa fa-times-circle"></i></i> Cancel</a>
						</div>
						<div class="labelInputSetting">
							<p>Phone number</p>
							<p class="currentSettingInput"><?php echo $row['phone']; ?></p>
							<label><input type="tel" name="phone" value="" placeholder="Edit Phone number"></label>
							<a class="editInputSetting"><i class="fa fa-pencil"></i> Edit</a>
							<a class="cancelInputSetting"><i class="fa fa-times-circle"></i></i> Cancel</a>
						</div>
						<button type="submit" id="btnChangSettings" value="Change">Change</button>
					</form>
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

