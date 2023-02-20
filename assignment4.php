<?php
// 1. A PHP function to sort an array of strings by their length, in ascending order.
function sortByLength ($a, $b) {
    return strlen($b)-strlen($a);
}
$array = array("banana", "apples", "dog", "cat", "milk", "monkey");
sort($array);
usort($array,'sortByLength');
print_r ($array);
echo "\n";

// 2. A PHP function to concatenate two strings, but with the second string starting from the end of the first string.
function concatenateString($str1, $str2){
    $str = $str1.$str2;
    return $str;
}
$fname = "Ratul";
$lname = "Hossain";
echo concatenateString($fname, $lname);
echo "\n";
echo "\n";

// 3. A PHP function to remove the first and last element from an array and return the remaining elements as a new array.
function removeArray($students){
    array_shift($students);
    array_pop($students);
    return $students;
}
$students = ["A Rahim", "A Karim", "Ratul Hossain", "Monir"];
$newStudents = removeArray($students);
print_r ($newStudents);
echo "\n";

// 4. A PHP function to check if a string contains only letters and whitespace.
function checkString($stringValidate){
    if (ctype_alpha(str_replace(' ', '', $stringValidate)) === false) {
        return 'Name must contain letters and spaces only';
      }
      return "Name is valid";
}
$myName = "Ratul Hossain";
echo checkString($myName);
echo "\n";

// 5. A PHP function to find the second largest number in an array of numbers.
function secondLargestNum($number){
    sort($number);
    return $number[sizeof($number)-2];
}
$number = array(14, 19, 15, 12, 18, 10, 13, 22);
echo secondLargestNum($number);