<?php 
function customError($error_level,$error_message,$error_file,$error_line,$error_context)
 { 
 $error="<b>Error:</b>错误级别：[$error_level] 错误信息：$error_message 错误文件：$error_file 错误的行：$error_line 错误内容：$error_context " . date("Y年m月d日 h时:m分:s秒") . "\r\n";
 $file = fopen("error.txt","a+");
 echo fwrite($file,"$error");
 }
 ?>
