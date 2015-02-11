<?PHP
session_start();
session_destroy();
Header("HTTP/1.1 301 Moved Permanently");
Header("Location:main.php");
?>
