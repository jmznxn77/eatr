<?php ob_start(); ?>
<html>
 <head>
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

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="../jcrop/js/jquery.Jcrop.js"></script> <!-- CAREFUL CHANGE PATH LATER -->
  <link rel="stylesheet" href="../jcrop/css/jquery.Jcrop.css" type="text/css" />
 <!-- <link rel="stylesheet" href="../jcrop/demos/demo_files/demos.css" type="text/css" /> -->
 </head>
 <body>
 <div id="header">
				<a href="index.php" id="logo">
				<span class="logo icon fa-cutlery">
					</span></a>
				<h1>eatr.</h1>
				<p>the easy way to eat well.</p>
			</div>
			</body></br>
<center><img id="imgcrop" style="display:block; min-width: 600px; min-height: 400px;" src="../master/uploads/food.jpg"></center></br>
	<!-- <script>
	// $.ajax({
	// 	type: 'GET',
	// 	url: './access.json',
	// 	dataType: 'json',
	// 	success: function (data) {
	// 		//store products from ajax-parsed data into array
	// 		var access = data.access_token;
	// 		console.log(access); 
	// 	}
	// });
	// </script> -->
<script type="text/javascript"> 

		// jQuery(document).ready(function(){

		// 	jQuery('#imgcrop').Jcrop({
		// 		onChange: showCoords,
		// 		onSelect: showCoords
		// 	});

		// });

		// // Simple event handler, called from onChange and onSelect
		// // event handlers, as per the Jcrop invocation above
		// function showCoords(c)
		// {
		// 	jQuery('#x1').val(c.x);
		// 	jQuery('#y1').val(c.y);
		// 	jQuery('#x2').val(c.x2);
		// 	jQuery('#y2').val(c.y2);
		// 	jQuery('#w').val(c.w);
		// 	jQuery('#h').val(c.h);
		// };

		//$('#imgcrop').load(function(){
		//var img = $("#imgcrop");
		
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

		//img.attr('width', newSize[0]);
		//img.attr('height', newSize[1]); 

		// $("#imgcrop").width(parseFloat(newSize[0]));
		// $("#imgcrop").height(parseFloat(newSize[1]));

		// $("#imgcrop").width(newSize[0]);
		// $("#imgcrop").height(parseFloat(newSize[1]));

		img.width=newSize[0];
		img.height=newSize[1];

		//$("#imgcrop").width(300);
		//$("#imgcrop").height(209);

		// var str1=newSize[0];
		// var str2=newSize[1];

		// img.style.width=""+newSize[0]+"px";
		// img.style.height=""+newSize[1]+"px";

		// var imgCrop = document.getElementById('imgcrop');

		// imgCrop.width = 300;
		// imgCrop.height = 300;

		//});

		$(function(){
			$('#imgcrop').Jcrop({
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
<center>
<form action="auth.php" method="post" onsubmit="return checkCoords();">
	<input type="hidden" id="x" name="x" />
	<input type="hidden" id="y" name="y" />
	<input type="hidden" id="w" name="w" />
	<input type="hidden" id="h" name="h" />
	<input type="hidden" name="run" /> 
	<input type="submit" value="Confirm" />
</form>
</center>

<?php
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size = $_FILES['image']['size'];
      $file_tmp = $_FILES['image']['tmp_name'];
      $file_type = $_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152) {
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true) {
         move_uploaded_file($file_tmp,"uploads/food.jpg");
         //echo $file_name;
      }else{
         //print_r($errors);
      }
   }
//ini_set('display_errors', 1);
  if (isset($_POST['run'])) {
	//ini_set('display_errors', 1);
	$targ_w = $_POST['w'];
	$targ_h = $_POST['h'];
	$jpeg_quality = 90;
	$output_filename = 'cropped.jpg';

	$src = '../master/uploads/food.jpg';
	$img_r = imagecreatefromjpeg($src);
	$dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

	imagecopyresampled($dst_r,$img_r,0,0,$_POST['x'],$_POST['y'], $targ_w,$targ_h,$_POST['w'],$_POST['h']);

	//header('Content-type: image/jpeg');
	imagejpeg($dst_r, $output_filename, $jpeg_quality);

///////////////////////////
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

	foreach ($json_classes as $string) {
	//echo $json_results;
	//echo $json_result;
	$json_final = $json_final.$string."\n";
	}

	file_put_contents("tags.txt", $json_final);

//$outcome3 = shell_exec("./fs.py 2>&1");
	//$command = escapeshellcmd('./fs.py');
	$outcome3 = system('python fs.py', $retval); 
	header("Location: ./results.php");
    exit;
  }
?>

	



<!-- <?php

// $acc_str = file_get_contents("./access.json");
// $acc_json = json_decode($acc_str, true);

// $access = $acc_json['access_token'];

// //echo $json_a['access_token'];
// echo '<p>Hello World</p>';
// //echo 'dank memes';

// //$output = shell_exec("ls");
// //echo $output;

// //$outcome = shell_exec("./conu.sh 2>&1");
// //echo $outcome; 

// //$outcome2 = shell_exec("./conu2.sh $access encoded_data=@doghorse.jpg 2>&1");
// //echo $outcome2; 

// $tag_str = file_get_contents("./tags.json");
// $tag_json = json_decode($tag_str, true);
// $json_results = $tag_json['results'][0];
// $json_result = $json_results['result']['tag'];
// $json_classes = $json_result['classes'];
// //echo $json_results;
// //echo $json_result;
// echo $json_classes;

/////////////////////////////////////////////

?> -->
 
 </body>
</html>