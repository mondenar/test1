<?php
/**
 * Created by PhpStorm.
 * User: Yury
 * Date: 07.11.2017
 * Time: 10:21
 */

$input = array("green@gmail.com", "macs@ukr.net", "mond@gmail.ua", "mac@mail.ru", "ma@ukr.ua");
echo '<pre>';
print_r($input);
echo '</pre>';
$result = array_unique($input);
echo '<pre>';
print_r($result);
echo '</pre>';

die();


$date_completion = "27-JUN-2013";

$match_pattern = array("-JAN-", "-FEB-", "-MAR-", "-APR-", "-MAY-", "-JUN-", "-JUL-", "-AUG-", "-SEP-", "-OCT-", "-NOV-", "-DEC-");
$replacement_pattern = array(".01.",".02.",".03.",".04.",".05.",".06.",".07.",".08.",".09.",".10.",".11.",".12.");



$date_completion_new =  str_replace ($match_pattern, $replacement_pattern, $date_completion);


//
//$date_completion_new = str_replace($apr, $new_apr, $old_string);

echo "Old string-> ".$date_completion;
echo "<br />New string-> ".$date_completion_new ;

//02-APR-2013


?>