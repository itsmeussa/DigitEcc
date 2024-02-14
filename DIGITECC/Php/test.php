<?php 
$daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
foreach ($daysOfWeek as $day){
        if (date("l")==$day){
            echo  $day;
        }
    }
?>