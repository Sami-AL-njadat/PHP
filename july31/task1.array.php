<?php
$colors = array('white', 'green', 'red');

 foreach ($colors as $color) {
    echo "• $color<br>";
}

// end of1q

?>



<?php
 echo "<br>"
 ?>  


 <?php
echo "<br>"
?>

<?php
$cities = array(
    
    
    "jordan" => "AMMAN",
    "Italy" => "Rome",
    "Spain" => "Madrid"
);

 asort($cities);

 foreach ($cities as $country => $capital) {
    echo "The capital of $country is $capital<br>";
}

// end of 2Q

?>




<?php
 echo "<br>"
 ?>  


 <?php
echo "<br>"
?>




<?php
$color = array(4 => 'white', 6 => 'green', 11 => 'red');

 $firstElement = reset($color);

 echo $firstElement;

 // end of 3Q

?>




<?php
 echo "<br>"
 ?>  


 <?php
echo "<br>"
?>



<?php
$fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");

 function customSort($array) {
    $sortedArray = array();

    while (!empty($array)) {
        $minKey = min(array_keys($array));
        $sortedArray[$minKey] = $array[$minKey];
        unset($array[$minKey]);
    }

    return $sortedArray;
}

 $sortedFruits = customSort($fruits);

 foreach ($sortedFruits as $key => $value) {
    echo "$key = $value<br>";
} 

 // end of 4Q

?>

<?php
 echo "<br>"
 ?>  


 <?php
echo "<br>"
?>


<?php
$words = array("abcd", "abc", "de", "hjjj", "g", "wer");

 $shortestLength = strlen($words[0]);
$longestLength = strlen($words[0]);

 foreach ($words as $word) {
    $wordLength = strlen($word);
    if ($wordLength < $shortestLength) {
        $shortestLength = $wordLength;
    }
    if ($wordLength > $longestLength) {
        $longestLength = $wordLength;
    }
}

 echo "The shortest array length is $shortestLength. The longest array length is $longestLength.";

  // end of 8Q

?>
