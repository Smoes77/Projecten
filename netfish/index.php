<?php 
    include "header.php"; 
	include('functions.php');
    if (!isLoggedIn()) {
        $_SESSION['msg'] = "Je moet eerst ingelogd zijn";
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


	<div class="header3">
		<h2>Home Page</h2>
	</div>
	<div class="content">
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>
		<div class="profile_info">
			<img src="samurai.jpg"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red;">Uitloggen</a>
					</small>

				<?php endif ?>
			</div>
		</div>
	</div>


</body>
</html>