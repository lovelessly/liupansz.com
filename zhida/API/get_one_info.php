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

$sql = "SELECT * FROM tb_tg_style " . "where id = " . $id;

$con = mysql_connect($db_host . ':' . $db_port,$db_username,$db_password);

if (!$con){
	echo json_encode(array('status'=>999,'msg'=>"Could not connect to MySQL server."));
}
else{
	mysql_select_db($db_scheme);
	mysql_query("set character set 'utf8'");
	mysql_query("set names 'utf8'");
	$result=mysql_query($sql,$con);
	$data = array();
	if(mysql_num_rows($result)){
		$result_count = mysql_query($sql_count,$con);
		$count_row = mysql_fetch_array($result_count);
		$count = (int)$count_row['count(id)'];
		$page = ceil($count/$div_page);
		while($row = mysql_fetch_array($result)){
			array_push($data,array(
			'id'=>$row['id'], 
			'title'=>$row['ad_name'], 
			'short_des'=>$row['short_desc'], 
			'belong'=>$row['belong'], 
			'charging_type'=>$row['charging_type'],
			'desc'=>$row['desc'],
			'image_url'=>$row['image_url'],
			's_keyword'=>$row['s_keyword'],
			'detail_url'=>$row['detail_url'],
			'toufang_url'=>$row['toufang_url'],
			'type'=>$row['style_type'],
			'ishot'=>$row['hot'],
			'mod_time'=>$row['mod_time'],
			));	
		}
		$ret = array('status'=>0, 'data'=>$data);
		echo json_encode($ret);
	}
	else{
		echo json_encode(array('status'=>999,'msg'=>"MySQL Error!"));	
	}
}


?>
