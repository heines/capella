<?php
/*
Template Name: API出力
*/
?>
<?php
$base_url = 'http://zipcloud.ibsnet.co.jp/api/search';
if(isset($_GET['param'])) {
  $param = $_GET['param'];
}
$testcode = '1050011';
$response = file_get_contents($base_url.'?zipcode='.$testcode);
$json = json_decode($response,JSON_UNESCAPED_UNICODE);
header("Content-Type: application/json; charset=utf-8");
echo json_encode($json);
?>
