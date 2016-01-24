<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<title>eatr</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="assets/css/main.css" />
</head>
<body>
	<div id="header">
		<span class="logo icon fa-cutlery"></span>
		<h1>Eatr.</h1>
		<p>the easy way to eat well.</p>
	</div>

	<div class ="box_container">
		<header>
			<h2>We've made a HUGE mistake! </h2>
			<p> Only you can help us fix it! </p>
		</header>
		<section>
		<form method="post" action="negFeedback.php">
						<div class="row">
							<div class="3u">
							</div>

							<div class="6u">
								<input type="text" name="name" placeholder="What were you actually eating?" />
							</div>

							<div class="3u">
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<ul class="actions">
									<li><input type="submit" value="Send Report" /></li>
								</ul>
							</div>
						</div>
		</form>
		<form method="link" action="http://www.jamesnixon.me/master/">
			<div class="row">
							<div class="12u">
								<ul class="actions">
									<li><input type="submit" value="Return to Home" /></li>
								</ul>
							</div>
						</div>
		</form>



		<?php 

	$id = $_POST["name"];
	if(!empty($id))
	{
		//Run bash script
		//echo $id;
		$acc_str = file_get_contents("./access.json");
		$acc_json = json_decode($acc_str, true);

		$access = $acc_json['access_token'];
		$outcome = shell_exec("http://www.jamesnixon.me/master/feedback.sh {$id} {$access} encoded_data=@cropped.jpg");
		//echo "{$outcome}";
	}
	else
	{
		
		//echo "Nash";
	}

	?>

		</section>
	</div>

	



	

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/util.js"></script>
	<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
	<script src="assets/js/main.js"></script>

</body>

</html>