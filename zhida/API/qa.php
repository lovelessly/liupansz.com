<?php


include('./setting.php');
$settings = new Settings_PHP;
$settings->load('./config.php');

$db_host = $settings->get('db.host');
$db_port = $settings->get('db.port');
$db_username = $settings->get('db.username');
$db_scheme = $settings->get('db.name');
$db_password = $settings->get('db.password');

$sql1 = "SELECT * FROM TG_element where id > " . $_REQUEST['id'] . " and type = " . $_REQUEST['type'] . " LIMIT 10";

$con = mysql_connect($db_host . ':' . $db_port,$db_username,$db_password);

if (!$con)
  {
      echo json_encode(array('status'=>999,'msg'=>"Could not connect to MySQL server."));
}

mysql_select_db($db_scheme);
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");

$result=mysql_query($sql1,$con);

//var_dump($result);

$data = array();
$count = 0;

if(mysql_num_rows($result))
{
	while($row = mysql_fetch_array($result))
	{
		array_push($data,array('id'=>$row['id'], 'title'=>$row['title'], 'des'=>$row['des'], 'img'=>$row['img_url']));
		$count += 1;
	}
	$ret = array('status'=>0,'count'=>$count,'data'=>$data);
	echo json_encode($ret);
}
else
{
	echo json_encode(array('status'=>999,'msg'=>"MySQL Error!"));
};

mysql_close($con);
//$ret = array('count'=>$count,'data'=>$data);
//echo json_encode($ret);

?>
