<?php
/*
Template Name: API出力
*/
?>
<?php
$base_url = 'http://zipcloud.ibsnet.co.jp/api/search';
if(isset($_GET['code'])) {
  $code = $_GET['code'];
} else {
  $code = '1050011';
}
$response = file_get_contents($base_url.'?zipcode='.$code);
$json = json_decode($response,JSON_UNESCAPED_UNICODE);
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Allow-Origin: https://heines.github.io");
echo json_encode($json);
?>
