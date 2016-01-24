<!--
<!DOCTYPE HTML>
	Directive by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<?php ob_start(); ?>
<html>
	<head>
		<!-- Scripts -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/skel.min.js"></script>
		<script src="assets/js/util.js"></script>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="assets/js/main.js"></script>
		<script src="../jcrop/js/jquery.Jcrop.js"></script> <!-- CAREFUL CHANGE PATH LATER -->
		<link rel="stylesheet" href="../jcrop/css/jquery.Jcrop.css" type="text/css" />
		<title>eatr</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<script>
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
				<span class="logo icon fa-cutlery"></span>
				<h1>eatr.</h1>
				<p>The easy way to eat well.</p>
			</div>


		<!-- Main -->
			<div id="main">

				<header class="major container 75%">
					<!--<h2><a class="upload_img" href="#button_label">Upload a photo</a> of your food-->
					<h2>Upload a photo of your food
					<br />
					and get an accurate evaluation
					<br />
					of its nutritional information</h2>
				</header>
				<!--<div class="box alt container">
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
					</form>-->
					<!-- <div class = "box alt container">
						<input type ='file'/>
						</br>
						 <img id="blah" src="" alt = "Image to Upload" style="display:block; min-width: 600px; min-height: 400px;"/>
						<script>
						$(":file").change(function(){ 
								if (this.files&& this.files[0])
								{
									var reader = new FileReader();
									reader.onload =imageIsLoaded;
									reader.readAsDataURL(this.files[0]);
								}});
						function imageIsLoaded(e) {
							$('img').attr('src', e.target.result);
							$('img').fadeIn();
						};
						</script>
						</div>  -->
						<div class = "box alt container">
							  <form action="upload.php" method="POST" enctype="multipart/form-data">
         						<input type="file" name="image" />
         					<input type="submit"/>
     						 </form>
      
							</form>
							</div>
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
					</section>-->
				</div>

				 <img id="imgcrop" style="display:block; min-width: 600px; min-height: 400px;" src="avocado.jpg"> 

				<script type="text/javascript"> 
						
						var img = document.getElementById('imgcrop');

						var initW = img.offsetWidth;
						var initH = img.offsetHeight; 

						console.log(initW);
						console.log(initH);
					
						var newSize = scaleSize(600, 300, initW, initH);
						function scaleSize(maxW, maxH, currW, currH){
							var ratio = currH / currW;

							if(currW >= maxW && ratio <= 1){
								currW = maxW;
								currH = currW * ratio;
							} 
							else if(currH >= maxH){
								currH = maxH;
								currW = currH / ratio;
							}
							return [currW, currH];
						}
						var scale = initW/newSize[0];

						console.log(scale);
						console.log(newSize[0]);
						console.log(newSize[1]);

						img.width=newSize[0];
						img.height=newSize[1];

						$(function(){
							$('#blah').Jcrop({
								//aspectRatio: 1,
								//onChange: updateCoords,
								onSelect: updateCoords
							});
						});

						function updateCoords(c)
						{
							$('#x').val(scale*c.x);
							$('#y').val(scale*c.y);
							$('#w').val(scale*c.w);
							$('#h').val(scale*c.h);
						};

						function checkCoords()
						{
							if (parseInt($('#w').val())) return true;
							$('#x').val(0);
							$('#y').val(0);
							$('#w').val(scale*newSize[0]);
							$('#h').val(scale*newSize[1]);
							// alert('Please select a crop region then press submit.');
							// return false;
						};
				</script>

				<form action="index.php" method="post" onsubmit="return checkCoords();">
					<input type="hidden" id="x" name="x" />
					<input type="hidden" id="y" name="y" />
					<input type="hidden" id="w" name="w" />
					<input type="hidden" id="h" name="h" />
					<input type="hidden" name="run" /> 
					<input type="submit" value="Crop Image" />
				</form>
				<?php
				ob_start();
				  if (isset($_POST['run'])) {
					ini_set('display_errors', 1);
					ini_set('precision', 20);
					$targ_w = $_POST['w'];
					$targ_h = $_POST['h'];
					$jpeg_quality = 90;
					$output_filename = 'cropped.jpg';

					$src = 'avocado.jpg';
					$img_r = imagecreatefromjpeg($src);
					$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

					imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'], $targ_w,$targ_h,$_POST['w'],$_POST['h']);

					//header('Content-type: image/jpeg');
					imagejpeg($dst_r, $output_filename, $jpeg_quality);

					$acc_str = file_get_contents("./access.json");
					$acc_json = json_decode($acc_str, true);
					$access = $acc_json['access_token'];

					$outcome = shell_exec("./conu.sh 2>&1");
					$outcome2 = shell_exec("./conu2.sh $access encoded_data=@cropped.jpg 2>&1");

					$tag_str = file_get_contents("./tags.json");
					$tag_json = json_decode($tag_str, true);
					$json_results = $tag_json['results'][0];
					$json_result = $json_results['result']['tag'];
					$json_classes = $json_result['classes'];
					$json_final = ""; 

					foreach ($json_classes as $string) {
					//echo $json_results;
					//echo $json_result;
					$json_final = $json_final.$string."\n";
					}

					file_put_contents("tags.txt", $json_final);
					$outcome3 = system('python fs.py', $retval); 
					header('Location: http://jamesnixon.me/master/results.php');
					exit; 
				  } 
				?>
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>
				</br>
				<!--<div class="box container">
					<header>
						<h2>Food Item Found</h2>
					</header>
					<section>
						<?php

							// $file = file_get_contents("./guac.json");
							// $json = json_decode($file,true);
							// //$arr = $json;
							// $description = $json['food_description'];
							// $name = $json['food_name'];
							// $id = $json['food_id'];
							// //echo $description;
							// //parse_str($description, $indFacts);,
							// $indFacts = explode(": ", $description);
							// for($i=0;$i<5;$i++){
							// 	$indFacts2[$i] = explode(' | ', $indFacts[$i]);
							// 	for($j=0;$j<5;$j++)
							// 	{
							// 		//echo "indFacts2[{$i}][{$j}]={$indFacts2[$i][$j]} \n";
							// 	}
							// }
							// //$indFacts2 = explode(' | ', $indFacts);
							// $servingSize =$indFacts2[0][0];
							// $servingSize2 = explode("Per ", $servingSize);
							// $servingSize = $servingSize2[1];
							// $servingSize2 = explode("-", $servingSize);
							// $servingSize = $servingSize2[0];
							// $calories = $indFacts2[1][0];
							// $fat = $indFacts2[2][0];
							// $carbs = $indFacts2[3][0];
							// $protein =$indFacts2[4][0];
							// echo "<header><h3>{$name} </h3>";
							// echo "<p>Serving Size = {$servingSize} </p></header>";
							// echo "<ul class = 'default'><li>Calories : {$calories} <li>Fat: {$fat} <li>Carbs: {$carbs} <li>Proteins: {$protein} </ul>";
							// echo "<center><a href='http://jamesnixon.me/Nix/index.html?foodID={$id}'>More Details</a></center>"
							// //echo "<h2> Facts: {$description} </h2>";


							?>





							<!- Template Code replaced with php that generates nutrition facts based on guac.json
						<header>
							<h3>Paragraph</h3>
							<p>This is the subtitle for this particular heading</p>
						</header>
						<p>Phasellus nisl nisl, varius id <sup>porttitor sed pellentesque</sup> ac orci. Pellentesque
						habitant <strong>strong</strong> tristique <b>bold</b> et netus <i>italic</i> malesuada <em>emphasized</em> ac turpis egestas. Morbi
						leo suscipit ut. Praesent <sub>id turpis vitae</sub> turpis pretium ultricies. Vestibulum sit
						amet risus elit.</p> 
					</section> -->
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
			<div id="footer">
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



				</div>
			</div>
	</body>
</html>