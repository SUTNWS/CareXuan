<?php
$m = new MongoClient();
$db = $m->test;
$collection = $db->createCollection("runoob");
$choose = $db->runoob;
$document = array(
  "id" => '1',
  "name" => 'xuan'
);
$choose->insert($document);
$cursor = $colletcion->find();
foreach ($cursor as $arr) {
  echo $arr['name'];
}
