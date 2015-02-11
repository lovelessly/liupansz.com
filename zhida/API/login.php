
<?php


include('./setting.php');
$settings = new Settings_PHP;
$settings->load('./config.php');

$db_host = $settings->get('db.host');
$db_port = $settings->get('db.port');
$db_username = $settings->get('db.username');
$db_scheme = $settings->get('db.name');
$db_password = $settings->get('db.password');

$username=$_REQUEST["username"];
$password=sha1($_REQUEST["password"]);


$sql = "SELECT * FROM tb_tg_user where username='".$username."' and password_md5='".$password."'";

$con = mysql_connect($db_host . ':' . $db_port,$db_username,$db_password);

mysql_select_db($db_scheme);
mysql_query("set character set 'utf8'");
mysql_query("set names 'utf8'");

$a2=mysql_query($sql,$con)or die("对不起，读入数据时出错了！". mysql_error());

if($row2=mysql_fetch_array($a2))
{

$nickname = $row2['nickname'];

Session_start();
$_SESSION['login'] = 1;
$sha = sha1(time().rand(10000,99999));
$_SESSION['sha1'] = $sha;
$_SESSION['username'] = $nickname;


echo json_encode(array('status'=>0, 'error'=>0, 'key'=>$sha));

}
else{
echo json_encode(array('status'=>0, 'error'=>1, 'msg'=>''));
}

mysql_close($con);

?>
