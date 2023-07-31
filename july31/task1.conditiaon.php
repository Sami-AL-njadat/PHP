<?php
$year = 2013;
if ($year % 400 == 0) {
   echo $year." is a leap year.";
} elseif ($year % 100 == 0) {
   echo $year." is not a leap year.";
} elseif ($year % 4 == 0) {
   echo $year." is a leap year.";
} else {
   echo $year." is not a leap year.";
}

//end of q1 
?>

<?php
echo "<br>"
?>


<?php
 echo "<br>"
 ?>


<?php
$season = 27;
if ($season < 20 ) {
    echo $season." is a winter";
 } else {echo $season." is a summer";}

 
//end of q2
 ?>


 <?php
 echo "<br>"
 ?>
 


 <?php
 echo "<br>"
 ?>
 

<?php 

$firstInteger  = 2 ;
$secondInteger = 2; 
$x = $firstInteger + $secondInteger;

if ($firstInteger == $secondInteger ) {
    echo $x*3 ;
 } else echo $x  

//end of q3

?>

   



<?php
 echo "<br>"
 ?>



  <?php
 echo "<br>"
 ?>


<?php 
$firstInteger  = 10;
$secondInteger = 11;

$sumofint = $firstInteger + $secondInteger;

if ($sumofint == 30) {
    echo "true" ;
 } else echo "false" 
 //end of q4


?>



<?php
 echo "<br>"
 ?>

 
<?php
 echo "<br>"
 ?>



<?php 
$k = 20;

if ($k % 3  == 0) {
    echo "true" ;

}else echo "false"
 
 //end of q5

?>



<?php
 echo "<br>"
 ?>  


 <?php
echo "<br>"
?>


<?php 

$number  = 50   ;

if ($number >= 20 && $number <= 50) {
    echo 'true';
} else {
    echo 'false';
}

//end of q6
?>



<?php
 echo "<br>"
 ?>  


 <?php
echo "<br>"
?>

 


<?php


$input = [1, 5, 9];

 $bignum = $input[0];  

if ($input[1] > $bignum) {
    $bignum = $input[1];
}

if ($input[2] > $bignum) {
    $bignum = $input[2];
}

 echo $bignum;

//end of q7

?>

<?php
 echo "<br>"
 ?>  


 <?php
echo "<br>"
?>


<?php
 $useOfElc = 300;

 $bill = 0;

if ($useOfElc <= 50) {
     $bill = $useOfElc * 2.50;
} elseif ($useOfElc <= 150) {
    $bill = (50 * 2.50) + (($useOfElc - 50) * 5.00);
} elseif ($useOfElc <= 250) {
    $bill = (50 * 2.50) + (100 * 5.00) + (($useOfElc - 150) * 6.20);
} else {
    $bill = (50 * 2.50) + (100 * 5.00) + (100 * 6.20) + (($useOfElc - 250) * 7.50);
}

echo $bill . ' JOD';


//end of q8

?>

<?php
 echo "<br>"
 ?>  


 <?php
echo "<br>"
?>


<?php 

$age = 15;

 if ($age >= 18) {
    echo "You are eligible to vote.";
} else {
    echo "You are not eligible to vote.";
}

 //end of q9


?>

<?php
 echo "<br>"
 ?>  


 <?php
echo "<br>"
?>



<?php
 $number = -60;

 if ($number > 0) {
    echo 'Positive';
} elseif ($number < 0) {
    echo 'Negative';
} else {
    echo 'Zero';
}

 //end of q

?>



<?php
 echo "<br>"
 ?>  


 <?php
echo "<br>"
?>



<?php
 function addition($num1, $num2) {
    return $num1 + $num2;
}

 function subtraction($num1, $num2) {
    return $num1 - $num2;
}

 function multiplication($num1, $num2) {
    return $num1 * $num2;
}

 function division($num1, $num2) {
    if ($num2 != 0) {
        return $num1 / $num2;
    } else {
        return "Cannot divide by zero!";
    }
}

 $num1 = 10;
$num2 = 5;
$operation = '+';

 switch ($operation) {
    case '+':
        $result = addition($num1, $num2);
        break;
    case '-':
        $result = subtraction($num1, $num2);
        break;
    case '*':
        $result = multiplication($num1, $num2);
        break;
    case '/':
        $result = division($num1, $num2);
        break;
    default:
        $result = "Invalid operation";
        break;
}

 echo "Result: " . $result;

  //end of 11

?>




<?php
 echo "<br>"
 ?>  


 <?php
echo "<br>"
?>

<?php
 $scores = [60, 86, 95, 63, 55, 74, 79, 62, 50];

 $totalScores = count($scores);
$sumScores = array_sum($scores);
$averageScore = $sumScores / $totalScores;

 if ($averageScore < 60) {
    $grade = 'F';
} elseif ($averageScore < 70) {
    $grade = 'D';
} elseif ($averageScore < 80) {
    $grade = 'C';
} elseif ($averageScore < 90) {
    $grade = 'B';
} else {
    $grade = 'A';
}

 echo $grade;
?>
