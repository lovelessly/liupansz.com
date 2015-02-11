<?php
session_start();
if($_SESSION['login'] != 1){
	echo json_encode(array('status'=>1,'msg'=>'Please Login in first!'));die();
}

include('./setting.php');
$settings = new Settings_PHP;
$settings->load('./config.php');

$db_host = $settings->get('db.host');
$db_port = $settings->get('db.port');
$db_username = $settings->get('db.username');
$db_scheme = $settings->get('db.name');
$db_password = $settings->get('db.password');

$image_prefix = $settings->get('host.hostname') . ':' . $image_host = $settings->get('host.port') . $image_host = $settings->get('host.path') . '/upload/';

/*
if(strlen($_REQUEST['hot']) == 0){echo 'ababa';};
*/

//$sql = "SELECT * FROM tb_tg_style";

$sig = 0;

if ($_FILES["file"]["error"] > 0)
    {
    $sig = 1;
    }
else
{
    $ext_name = array_pop(explode('.',$_FILES["file"]["name"]));
    $file_name = md5($_FILES["file"]["name"] . time()) . '.' . $ext_name;

    while (file_exists("../upload/" . $file_name))
      {
		$file_name = md5($file_name . time()) . '.' . $ext_name;
      }
	move_uploaded_file($_FILES["file"]["tmp_name"],"../upload/" . $file_name);
};

if($sig == 1)
{
echo json_encode(array('status'=>1, 'msg'=>'Image file Error'));
die();
};

$image_url = $image_prefix . $file_name;

$sql = "INSERT INTO tb_tg_style ( `ad_name`, `short_desc`, `belong`, `charging_type`, `desc`, `image_url`, `s_keyword`, `detail_url`, `toufang_url`, `style_type`, `hot`, `add_time`,`mod_time`) VALUES ('" . $_REQUEST['ad_name'] ."', '" . $_REQUEST['short_desc'] ."', '" . $_REQUEST['belong'] ."', '" . $_REQUEST['charging_type'] ."', '" . $_REQUEST['desc'] ."', '" . $image_url ."', '" . $_REQUEST['s_keyword'] ."', '" . $_REQUEST['detail_url'] ."', '" . $_REQUEST['toufang_url'] ."', '" . $_REQUEST['type'] ."', '" . $_REQUEST['hot'] ."', NOW(), NOW());";

$con = mysql_connect($db_host . ':' . $db_port,$db_username,$db_password);

if (!$con){
	echo json_encode(array('status'=>999,'msg'=>"Could not connect to MySQL server."));
}
else{
	mysql_select_db($db_scheme);
	mysql_query("set character set 'utf8'");
	mysql_query("set names 'utf8'");
	
	$result=mysql_query($sql,$con);
	
	if(1 == $result){
		echo json_encode(array('status'=>0,'msg'=>'Successfully INSERT'));
	}
	else{
		echo json_encode(array('status'=>999,'msg'=>"MySQL Error!"));	
	}
}
?>
