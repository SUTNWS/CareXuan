<?php
header("Content-Type:text/html;charset=utf-8");
$check = array(15,64,84,34,15,97,64,35,15,34,46,13);
$arr = array();

sort($check);
$min = $check[0];
$max = $check[(count($check)-1)];
$length = $max - $min;

for($i = 0;$i < $length;$i++){
  $arr[$i] = 0;
}
for ($i=0; $i < $length; $i++) {
  @$arr[($check[$i]-$min)]++;
}
for ($i=0; $i < $length; $i++) {
  if ($arr[$i] > 1) {
    echo "重复数字为".($i+$min)."，重复次数为：".$arr[$i]."次<br />";
  }
}
