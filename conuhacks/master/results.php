<!DOCTYPE HTML>
<!--
	Directive by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<title>eatr</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<!--<script>
			$(function() {
			  $('a[href*=#]:not([href=#])').click(function() {
			    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			      var target = $(this.hash);
			      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			      if (target.length) {
			        $('html,body').animate({
			          scrollTop: target.offset().top - 300
			        }, 1000);
			        return false;
			      }
			    }
			  });
			});
		</script>
		<!-- Header -->
			<div id="header">
				<a href="index.php" id="logo">
				<span class="logo icon fa-cutlery">
					</span></a>
				<h1>Eatr.</h1>
				<p>the easy way to eat well.</p>
			</div>


		<!-- Main -->
			<!--<div id="main">

				<header class="major container 75%">
					<h2><a class="upload_img" href="#button_label">Upload a photo</a> of your plate
					<br />
					and get an accurate evaluation
					<br />
					of its nutritional information</h2>
				</header>
				<div class="box alt container">
					<form action="" id="button_form" method="get">
						<script>
							function readURL(input) {
							    if (input.files && input.files[0]) {
							        var reader = new FileReader();
							        reader.onload = function (e) {
							            $('#blah').attr('src', e.target.result);
							        }
							        reader.readAsDataURL(input.files[0]);
							    }
							}
							$("#uploaded_img").change(function(){
							    readURL(this);
							});
						</script>
						<input type="file" id="uploaded_img" accept="image/jpeg image/png"/>
						<label for="uploaded_img" id="button_label">Upload a photo</label><br >
						<img id="blah" src="#" alt=""/><br >
						<input type="submit" value="Get Started">
					</form> 
					
					<!--<section class="feature left">
						<a href="#" class="image icon fa-signal"><img src="images/pic01.jpg" alt="" /></a>
						<div class="content">
							<h3>The First Thing</h3>
							<p>Vitae natoque dictum etiam semper magnis enim feugiat amet curabitur tempor orci penatibus. Tellus erat mauris ipsum fermentum etiam vivamus eget. Nunc nibh morbi quis fusce lacus.</p>
						</div>
					</section>
					<section class="feature right">
						<a href="#" class="image icon fa-code"><img src="images/pic02.jpg" alt="" /></a>
						<div class="content">
							<h3>The Second Thing</h3>
							<p>Vitae natoque dictum etiam semper magnis enim feugiat amet curabitur tempor orci penatibus. Tellus erat mauris ipsum fermentum etiam vivamus eget. Nunc nibh morbi quis fusce lacus.</p>
						</div>
					</section>
					<section class="feature left">
						<a href="#" class="image icon fa-mobile"><img src="images/pic03.jpg" alt="" /></a>
						<div class="content">
							<h3>The Third Thing</h3>
							<p>Vitae natoque dictum etiam semper magnis enim feugiat amet curabitur tempor orci penatibus. Tellus erat mauris ipsum fermentum etiam vivamus eget. Nunc nibh morbi quis fusce lacus.</p>
						</div>
					</section>
				</div> -->

				<div class="box container">
					<header>
						<h2>Food Item Found</h2>
					</header>
					<section>
						<?php

							$file = file_get_contents("./guac.json");
							$json = json_decode($file,true);
							//var_dump($jsonA);
							//$json = $jsonA[0];
							//echo "break";
							//var_dump($json);

							//$arr = $json;
							$description = $json['food_description'];
							//echo $description;
							
							
							$name = $json['food_name'];
							$id = $json['food_id'];
							//echo $description;
							//parse_str($description, $indFacts);,
							$indFacts = explode(": ", $description);
							for($i=0;$i<5;$i++){
								$indFacts2[$i] = explode(' | ', $indFacts[$i]);
								for($j=0;$j<5;$j++)
								{
									//echo "indFacts2[{$i}][{$j}]={$indFacts2[$i][$j]} \n";
								}
							}
							//$indFacts2 = explode(' | ', $indFacts);
							$servingSize =$indFacts2[0][0];
							$servingSize2 = explode("Per ", $servingSize);
							$servingSize = $servingSize2[1];
							$servingSize2 = explode("-", $servingSize);
							$servingSize = $servingSize2[0];
							$calories = $indFacts2[1][0];
							$fat = $indFacts2[2][0];
							$carbs = $indFacts2[3][0];
							$protein =$indFacts2[4][0];
							echo "<header><h3>{$name} </h3>";
							echo "<p>Serving Size = {$servingSize} </p></header>";
							echo "<center><p>Calories : {$calories} </br>Fat: {$fat} </br>Carbs: {$carbs} </br>Proteins: {$protein} </br</p></center>";
							//echo "<center></br><a href='http://jamesnixon.me/master/detailsPage.html?foodID={$id}'>More Details</a></br><a href='http://jamesnixon.me/master/index.php'>Back</a></center>"
							$action = "http://jamesnixon.me/master/detailsPage.html?foodID={$id}";
							//echo $action;
							echo "<form method='post' action='{$action}'><div class='row'><div class='12u'><ul class='actions'>
									<li><input type='submit' value='More Details' /></li>
								</ul>
							</div>
						</div>
		</form>";
		echo "	<form method='link' action='http://jamesnixon.me/master/index.php'>
						
						<div class='row'>
							<div class='12u'>
								<ul class='actions'>
									<li><input type='submit' value='Home' /></li>
								</ul>
							</div>
						</div>
		</form>";
		echo "	<form method='link' action='http://jamesnixon.me/master/auth.php'>
						
						<div class='row'>
							<div class='12u'>
								<ul class='actions'>
									<li><input type='submit' value='Back' /></li>
								</ul>
							</div>
						</div>
		</form>";
		echo "	<form method='link' action='http://jamesnixon.me/master/negFeedback.php'>
						
						<div class='row'>
							<div class='12u'>
								<ul class='actions'>
									<li><input type='submit' value='Report Error' /></li>
								</ul>
							</div>
						</div>
		</form>";
		
					
							//echo "<h2> Facts: {$description} </h2>";


							?>





							<!-- Template Code replaced with php that generates nutrition facts based on guac.json
						<header>
							<h3>Paragraph</h3>
							<p>This is the subtitle for this particular heading</p>
						</header>
						<p>Phasellus nisl nisl, varius id <sup>porttitor sed pellentesque</sup> ac orci. Pellentesque
						habitant <strong>strong</strong> tristique <b>bold</b> et netus <i>italic</i> malesuada <em>emphasized</em> ac turpis egestas. Morbi
						leo suscipit ut. Praesent <sub>id turpis vitae</sub> turpis pretium ultricies. Vestibulum sit
						amet risus elit.</p> -->
					</section>
					<!--<section>
						<header>
							<h3>Blockquote</h3>
						</header>
						<blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget.
						tempus euismod. Vestibulum ante ipsum primis in faucibus.</blockquote>
					</section>
					<section>
						<header>
							<h3>Divider</h3>
						</header>
						<p>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra
						ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel. Praesent nec orci
						facilisis leo magna. Cras sit amet urna eros, id egestas urna. Quisque aliquam
						tempus euismod. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
						posuere cubilia.</p>
						<hr />
						<p>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra
						ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel. Praesent nec orci
						facilisis leo magna. Cras sit amet urna eros, id egestas urna. Quisque aliquam
						tempus euismod. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
						posuere cubilia.</p>
					</section>
					<section>
						<header>
							<h3>Unordered List</h3>
						</header>
						<ul class="default">
							<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
							<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
							<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
							<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
						</ul>
					</section>
					<section>
						<header>
							<h3>Ordered List</h3>
						</header>
						<ol class="default">
							<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
							<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
							<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
							<li>Donec consectetur vestibulum dolor et pulvinar. Etiam vel felis enim, at viverra ligula. Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</li>
						</ol>
					</section>
					<section>
						<header>
							<h3>Table</h3>
						</header>
						<div class="table-wrapper">
							<table class="default">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Description</th>
										<th>Price</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>45815</td>
										<td>Something</td>
										<td>Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</td>
										<td>29.99</td>
									</tr>
									<tr>
										<td>24524</td>
										<td>Nothing</td>
										<td>Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</td>
										<td>19.99</td>
									</tr>
									<tr>
										<td>45815</td>
										<td>Something</td>
										<td>Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</td>
										<td>29.99</td>
									</tr>
									<tr>
										<td>24524</td>
										<td>Nothing</td>
										<td>Ut porttitor sagittis lorem, quis eleifend nisi ornare vel.</td>
										<td>19.99</td>
									</tr>
								</tbody>
								<tfoot>
									<tr>
										<td colspan="3"></td>
										<td>100.00</td>
									</tr>
								</tfoot>
							</table>
						</div>
					</section>
					<section>
						<header>
							<h3>Form</h3>
						</header>
						<form method="post" action="#">
							<div class="row">
								<div class="6u 12u(mobilep)">
									<label for="name">Name</label>
									<input class="text" type="text" name="name" id="name" value="" placeholder="John Doe" />
								</div>
								<div class="6u 12u(mobilep)">
									<label for="email">Email</label>
									<input class="text" type="text" name="email" id="email" value="" placeholder="johndoe@domain.tld" />
								</div>
							</div>
							<div class="row">
								<div class="12u">
									<label for="subject">Subject</label>
									<input class="text" type="text" name="subject" id="subject" value="" placeholder="Enter your subject" />
								</div>
							</div>
							<div class="row">
								<div class="12u">
									<label for="subject">Message</label>
									<textarea name="message" id="message" placeholder="Enter your message" rows="6"></textarea>
								</div>
							</div>
							<div class="row">
								<div class="12u">
									<ul class="actions">
										<li><input type="submit" value="Send" /></li>
										<li><input type="reset" value="Reset" class="alt" /></li>
									</ul>
								</div>
							</div>
						</form>
					</section> -->
				</div>
				

				<!--<footer class="major container 75%">
					<h3>Get shady with science</h3>
					<p>Vitae natoque dictum etiam semper magnis enim feugiat amet curabitur tempor orci penatibus. Tellus erat mauris ipsum fermentum etiam vivamus.</p>
					<ul class="actions">
						<li><a href="#" class="button">Join our crew</a></li>
					</ul>
				</footer>-->

			</div>

		<!-- Footer -->
		<!--	<div id="footer">
				<div class="container 75%">

					<header class="major last">
						<h2>Questions?</h2>
					</header>
					<form method="post" action="#">
						<div class="row">
							<div class="6u 12u(mobilep)">
								<input type="text" name="name" placeholder="Name" />
							</div>
							<div class="6u 12u(mobilep)">
								<input type="email" name="email" placeholder="Email" />
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<textarea name="message" placeholder="Message" rows="6"></textarea>
							</div>
						</div>
						<div class="row">
							<div class="12u">
								<ul class="actions">
									<li><input type="submit" value="Send Message" /></li>
								</ul>
							</div>
						</div>
					</form>

					<ul class="icons">
						<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
					</ul>

					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>

<!-- If the proper Food Item is located in guac.json then this code will dispay some nutrional information. We can potentially use jquery or javascript to make it appeaar when we want it only... if not woops-->


				</div>
			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>