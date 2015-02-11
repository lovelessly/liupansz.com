<?php


include('./setting.php');
$settings = new Settings_PHP;
$settings->load('./config.php');

$db_host = $settings->get('db.host');
$db_port = $settings->get('db.port');
$db_username = $settings->get('db.username');
$db_scheme = $settings->get('db.name');
$db_password = $settings->get('db.password');


$id = $_REQUEST['id'];

$sql = "DELETE FROM tb_tg_style " . "where id = " . $id;

$con = mysql_connect($db_host . ':' . $db_port,$db_username,$db_password);

if (!$con){
	echo json_encode(array('status'=>999,'msg'=>"Could not connect to MySQL server."));
}
else{
	mysql_select_db($db_scheme);
	mysql_query("set character set 'utf8'");
	mysql_query("set names 'utf8'");
	$result=mysql_query($sql,$con);
	if($result){
		$ret = array('status'=>0, 'msg'=>'Already deleted');
		echo json_encode($ret);
	}
	else{
		echo json_encode(array('status'=>999,'msg'=>"MySQL Error!"));	
	}
}

?>
