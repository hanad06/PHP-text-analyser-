<!DOCTYPE html>
<html>
<head>
	<title>Text Analyser</title>
	<style type="text/css">
		h1 {
			color: red;
			border: 1px solid green;
			border-top-left-radius: 8px;
			border-top-right-radius: 8px;
			background-color: cyan;
			width: 250px;
			position: relative;
			margin:auto;
		}
		textarea {
			color: #41AE75;
			font-size: 16px;
			font-family: cursive;
			position: relative;
			border: 1px solid orange;
			border-top-left-radius: 10px;
			border-top-right-radius: 10px;
			padding: 5px;
			margin-top: 5px;
		}
		input[type=submit] {
 			border: 1px solid blue;
 			font-size: 17px;
 			border-bottom-left-radius: 10px;
 			border-bottom-right-radius: 10px;
 			color: #102E4C;
 			position: relative;
 			padding: 5px;

		}
		.nchar {
			color: white;
			border: 1px solid black;
			border-radius: 10px;
			padding: 5px;
			width: 250px;
			margin: auto;
			margin-top: 5px;
			background-color: green;
		}
		.cwords {
				width: 350px;
			text-align: center; 
			border: 1px solid red;
			border-radius: 10px;
			padding: 5px;
			margin: auto;
			margin-top: 5px;
			background-color: cyan;
		}
		.vowels {
				width: 250px;
			text-align: center; 
			border: 1px solid red;
			border-radius: 10px;
			padding: 5px;
			margin: auto;
			margin-top: 5px;
			background-color: #ab43e7;
		}
		.nwords {
				width: 250px;
			text-align: center; 
			border: 1px solid red;
			border-radius: 10px;
			padding: 5px;
			margin: auto;
			margin-top: 5px;
			background-color: #a4b132;
		}
		.cchar {
				width: 250px;
			text-align: center; 
			border: 1px solid red;
			border-radius: 10px;
			padding: 5px;
			margin: auto;
			margin-top: 5px;
			background-color: #e4a132;
		}
		.average {
				width: 250px;
			text-align: center; 
			border: 1px solid red;
			border-radius: 10px;
			padding: 5px;
			margin: auto;
			margin-top: 5px;
			background-color: #ba34e7;
		}
		.ratio {
	width: 250px;
			text-align: center; 
			border: 1px solid red;
			border-radius: 10px;
			padding: 5px;
			margin: auto;
			margin-top: 5px;
			background-color: #3ea4e7;		
		}
	.average {
			width: 250px;
			text-align: center; 
			border: 1px solid red;
			border-radius: 10px;
			padding: 5px;
			margin: auto;
			margin-top: 5px;
			background-color: #e7a5e7;
	}
	.con {
			width: 250px;
			text-align: center; 
			border: 1px solid red;
			border-radius: 10px;
			padding: 5px;
			margin: auto;
			margin-top: 5px;
			background-color: #a85ee7;
	}

	#number {
		color: red;
		font-size: 22px;
		font-weight: bolder;
	}
	.lword {
			width: 350px;
			text-align: center; 
			border: 1px solid red;
			border-radius: 10px;
			padding: 5px;
			margin: auto;
			margin-top: 5px;
			background-color: #54eca3;
	}
	.shword {
		width: 250px;
			text-align: center; 
			border: 1px solid red;
			border-radius: 10px;
			padding: 5px;
			margin: auto;
			margin-top: 5px;
			background-color: #1e89a3;
	}
	.lshword {
		width: 350px;
			text-align: center; 
			border: 1px solid red;
			border-radius: 10px;
			padding: 5px;
			margin: auto;
			margin-top: 5px;
			background-color: #aab9e5;
	}
	</style>
</head>
<body>
<center><h1>Text Analyzer</h1></center>
<form action="" method="post">
<center><textarea cols="100" rows="8" name="textarea"></textarea></center>
<center><input type="submit" name="submit" value="Get information about inserted text"></center>
</form>
</body>
</html>
<?php
//number of characters
echo "<div class='nchar'>";
echo 'There are '.strlen($_POST[textarea]).''. ' characters in the text.'. '<br>';
//number of characters without spaces.
$spaces = strlen($_POST[textarea]) - substr_count($_POST[textarea], ' ');
echo 'There are '.$spaces.''. ' characters(without space) in the text.'. '<br>';
echo "</div>";
//most common characters
echo "<div class='cchar'>";
$Array = count_chars($_POST[textarea],1);
foreach ($Array as $a=>$value)
   {
   	if($value>1)
   echo "There are $value <b>'".chr($a)."'</b>s found<br>";
if($value==1)echo "There is $value <b>'".chr($a)."'</b> found<br>";
   }
   echo "</div>";
   //number of words
   echo "<div class='nwords'>";
if($_POST[textarea]){
	$numberofwords=explode(" ", $_POST[textarea]);
	if(count($numberofwords)>1)echo "There are"." ".count($numberofwords).' words found.'. '<br>';
	if(count($numberofwords)==1)echo "There is one word found.". '<br>';
}

echo "</div>";
//most common words
echo "<div class='cwords'>";
$Words = explode(" ", "$_POST[textarea]");
foreach($Words as $word) {
    $outcome[$word]++;
}
foreach($outcome as $word => $count) {
    if($word!=='' && $count!==1)echo "The word <b>'$word'</b> is displayed <span id='number'>$count</span> times in the text.". "<br>";
    if($word!=='' && $count==1)echo "The word <b>'$word'</b> is displayed <span id='number'>$count</span> time in the text.". "<br>";
}
echo "</div>";
//number of vowels
echo "<div class='vowels'>";
if($_POST)
{
$text = strtolower($_POST[textarea]);
$num  = preg_match_all('/[aeiouAEIOU]/i',$_POST[textarea],$matches);
echo "The total number of Vowels is: $num". "<br>";
}
echo "</div>";
//number of Consonants
echo "<div class='con'>";
if($_POST)
{
$string = strtolower($_POST[textarea]);
$num  = preg_match_all('/[BCDFGHJKLMNPQRSTVXZWYbcdfghjklmnpqrstvwxyz]/i',$_POST[textarea],$matches);
echo "The total number of Consonants is: ". $num;
}
echo "</div>";
//proportion of vowels to consonants
echo "<div class='ratio'>";
echo "The ratio of vowels to consonants is".' ';
if($_POST)
{
$text = strtolower($_POST[textarea]);
$num  = preg_match_all('/[aeiouAEIOU]/i',$_POST[textarea],$matches);
echo "$num";
} echo ":"; if($_POST)
{
$string = strtolower($_POST[textarea]);
$num  = preg_match_all('/[BCDFGHJKLMNPQRSTVXZWYbcdfghjklmnpqrstvwxyz]/i',$_POST[textarea],$matches);
echo "$num";
}
echo "</div>";
//the average length of a word
echo "<div class='average'>";
$average="$_POST[textarea]";
$average=explode(" ", $average);
foreach ($average as $word)
	$total=$total+strlen($word);
echo "The average length of the word is: ". $total/count($average);
echo "</div>";
//longest word
$longest = "$_POST[textarea]";

$longwords = str_word_count($longest, 1);

function wordlong($x, $y) {
    return strlen($y) - strlen($x);
}

usort($longwords, 'wordlong');
echo "<div class='lword'>";
echo "The longest word is:&nbsp;";
print_r(array_shift($longwords));
echo "</div>";
//the length of the longest word
$longest = "$_POST[textarea]";

$longwords = str_word_count($longest, 1);

function wordl($x, $y) {
    return strlen($y) - strlen($x);
}

usort($longwords, 'wordl');
echo "<div class='lword'>";
$r=strlen(array_shift($longwords));
if(strlen(array_shift($longwords)>1))
echo "The longest word is:&nbsp;";
echo strlen(array_shift($longwords)); echo "&nbsp";
echo "characters long";
echo "</div>";
//shortest word
$string = "$_POST[textarea]";
$words  = explode(' ', $_POST[textarea]);

$shwl = $r;
$shortestWord = '';

foreach ($words as $word) {
   if (strlen($word) < $shwl) {
      $shwl = strlen($word);
      $shortestWord = $word;
   }

}

echo "<div class='shword'>";
echo "The shortest word is:&nbsp;";
echo $shortestWord;
echo "</div>";
//the length of the shortest word
$string = "$_POST[textarea]";
$words  = explode(' ', $_POST[textarea]);

$shwl = $r;
$shortestWord = '';

foreach ($words as $word) {
   if (strlen($word) < $shwl) {
      $shwl = strlen($word);
      $shortestWord = $word;
   }

}

echo "<div class='lshword'>";
if(strlen($shortestWord)>1)
echo "The shortest word is:&nbsp;";
echo strlen($shortestWord); echo "&nbsp";
echo "characters long";
echo "</div>";