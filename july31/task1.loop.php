<?php
$sum = 0;
for($x=0; $x<=30; $x++)
{
$sum +=$x;
}
echo "The sum of the numbers 0 to 30 is $sum"."\n" ;

//the end of q1
echo "<br>"
?>


<?php
echo "<br>"
?>




<?php
for($x=1;$x<=5;$x++)
{
   for ($y=1;$y<=5;$y++)
    {
	    if($y == $x)
		 {
		   echo "$x";
		 }else {
            echo "0";
         } 
     }
 echo "<br>";

 //the end of q4
}
?>




<?php
echo "<br>"
?>



<?php
$n = 5;
$x = 1;
for($i=1; $i <= $n-1; $i++)
{
 $x*=($i+1); 
}
echo "The factorial of  $n = $x <br>";
 //the end of q5
?>




<?php
echo "<br>"
?>

<?php
echo "<br>"
?>





<?php  

$num = 9;  
 
function series($num){  
    if($num == 0){  
    return 0;  
    }else if( $num == 1){  
return 1;  
}  else {  
return (series($num-1) + series($num-2));  
}   
}  
for ($i = 0; $i < $num; $i++){  
echo series($i);  
echo ",";  
}  

/* end of q6 */  

?>





<?php
echo "<br>"
?>

<?php
echo "<br>"
?>



<?php
echo "<pre>";
$num = 1;
for ($i = 1; $i <= 5; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo $num . "&nbsp;";
        $num++;
        if ($j == $i) {
            echo "&nbsp;";
            echo "<br/>";
        }
    }
}
echo "</pre>";

/* end of q6 */  

?>



