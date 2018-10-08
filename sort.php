<?php
$arr1 = array(1,3,2,45,5,23,54);
$arr2 = array(325,1,2,34,2,34,2,4);
$finish = array();

sort($arr1);
sort($arr2);

$i = 0;$j = 0;$k = 0;
while ($arr1[$i] && $arr2[$j]) {
  if ($arr1[$i] >= $arr2[$j]) {
    $finish[$k] = $arr2[$j];
    $j++;
    $k++;
  }
  elseif ($arr1[$i] < $arr2[$j]) {
    $finish[$k] = $arr1[$i];
    $i++;
    $k++;
  }
}
while ($arr1[$i]) {
  $finish[$k] = $arr1[$i];
  $k++;
  $i++;
}
while ($arr2[$j]) {
  $finish[$k] = $arr2[$j];
  $k++;
  $j++;
}

print_r($finish);
