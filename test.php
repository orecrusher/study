<?php
   setcookie("username","alex")
?>
<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>页面访问次数</title>
</head>

<body>
<?php
  if(isset($_COOKIE["username"]))
   echo "欢迎"." " . $_COOKIE["username"] ."!<br />";
  else
   echo "欢迎游客 !<br/>";
   $handle =fopen("page.txt","a");
   if(isset($_SESSION['views']))
   $_SESSION['views']=$_SESSION['views']+1;
   else
   $_SESSION['views']=1;
   echo "页面总的访问次数是：" .$_SESSION['views']."次";
   $pageviews="页面总的访问次数是：" .$_SESSION['views']."次"."\r\n";
   fwrite($handle,$pageviews);
?>
</body>
</html>
