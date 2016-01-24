<html>
<head>
</head>
<body>
<?php 

	$id = $_POST["name"];
	if(!empty($id))
	{
		//Run bash script
		$file = "http://www.jamesnixon.me/master/test.txt";
		file_put_contents($file, $id);
		echo "Bash";
	}
	else
	{
		$file = "http://www.jamesnixon.me/master/fail.txt";
		file_put_contents($file, $id);
		echo "Nash";
	}

?>
</body>
</html>