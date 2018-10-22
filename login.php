<?php
header("Content-Type:text/html;charset=utf-8");
$name = $_POST['Name'];
$studynumber = $_POST['StudyNumber'];
$class = $_POST['Class'];
$phonenumber = $_POST['PhoneNumber'];
$qq = $_POST['QQ'];

if (empty($name) || empty($studynumber) || empty($class) || empty($phonenumber) || empty($qq)) {
  echo "<script>alert('请将信息输入完整');history.back();</script>";
  exit;
}
$pattern1 = '/[0-9]{11}/';
$pattern2 = '/[0-9]{5,12}/';

preg_match($pattern1,$phonenumber,$match1);
preg_match($pattern2,$qq,$match2);

$code = file_get_contents("http://www.sutfind.top/public/index/Find/api/id/{$studynumber}");
$decode = json_decode($code);
$decode = (array)$decode;

if (!$decode['code']) {
  echo "<script>alert('请输入正确的学号');history.back();</script>";
  exit;
}
if (!$match1) {
  echo "<script>alert('请输入正确的电话号');history.back();</script>";
  exit;
}
if (!$match1) {
  echo "<script>alert('请输入正确的QQ号');history.back();</script>";
  exit;
}

$mysqli = new mysqli('localhost','root','root','test');
$mysqli->set_charset("utf-8");

$sql1 = "SELECT id FROM login WHERE studynumber='{$studynumber}'";
$query = $mysqli->query($sql1);
if ($query->fetch_array()) {
  echo "<script>alert('您已报名，请重新报名');history.back();</script>";
  exit;
}
else {
  $sql2 = "INSERT INTO login(name,studynumber,class,phonenumber,qq) VALUES(?,?,?,?,?)";
  $stmt = $mysqli->prepare($sql2);
  $stmt->bind_param("sssss",$name,$studynumber,$class,$phonenumber,$qq);
  $result = $stmt->execute();
  if (!$result) {
    echo "<script>alert('报名失败，请重新尝试');history.back();</script>";
    exit;
  }
  else {
    echo "<script>alert('报名成功');history.back();</script>";
  }
}
