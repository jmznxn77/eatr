<html>
<head>
<title> Nutrional Facts </title>
</head>
<body>
<h1> Nutritional Facts </h1>

<?php

$file = file_get_contents("./guac.json");
$json = json_decode($file,true);
//$arr = $json;
$id = $json['food_id'];
$description = $json['food_description'];
//echo $description;
//parse_str($description, $indFacts);,
$indFacts = explode(": ", $description);
for($i=0;$i<5;$i++){
	$indFacts2[$i] = explode(' | ', $indFacts[$i]);
	for($j=0;$j<5;$j++)
	{
		echo "indFacts2[{$i}][{$j}]={$indFacts2[$i][$j]} \n";
	}
}
//$indFacts2 = explode(' | ', $indFacts);
$calories = $indFacts2[1][0];
$fat = $indFacts2[2][0];
$carbs = $indFacts2[3][0];
$protein =$indFacts2[4][0];
echo "<h2>Calories : {$calories} Fat: {$fat} Carbs: {$carbs} Proteins: {$protein} </h2>"; 
//echo "<h2> Facts: {$description} </h2>";

echo "<a href='index.html?foodID={$id}'>a link</a>"


?>
</body>
</html>