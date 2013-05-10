
<?php 
require("globle.php");
$php_file = basename(__FILE__);
 if(!file_exists("error.txt"))
 {
    fopen("error.txt","a+");
 }
set_error_handler("customError");
//trigger error

$method=isset($_GET['method'])?$_GET['method']:null;
   switch ($method){
		 case'upload':
		    if(isset($_POST['submit']))
			{
				if ($_FILES["file"]["error"] > 0)
				{
					$html="上传文件发生错误";
					
				}
				else
				{
				if($_FILES["file"]["type"]=="text/plain")
				{
				 move_uploaded_file($_FILES["file"]["tmp_name"],
                  "upload/" . $_FILES["file"]["name"]);
				 $html="上传成功";			 
				}
				else
				 $html="上传失败";
				}
			 echo $html;
			}   
		   break;
	     case 'edit':
		       $filename = isset($_GET['filename'])?$_GET['filename']:null;
			   echo '<form action="'.$php_file.'?method=save" method="POST">';
			   echo '<textarea rows="20" cols="160" name=content>';
			   echo file_get_contents(ABS_PATH.'/upload/'.$filename);
			   echo '</textarea>';
			   echo '<input type="submit" name="submit" value="保存" />';
		     break;
		case 'save':
		$content = isset($_POST['content'])?$_POST['content']:null;
		$filename = isset($_POST['filename'])?$_POST['filename']:null;
		file_put_contents('upload/'.$filename,$content);
		echo '<br>保存成功<a href="index.php">返回上传页面</a>';
		break;
	     default:
		      include 'header.php';		    
			 echo '<form action="'.$php_file.'?method=upload" method="POST" enctype="multipart/form-data">';
              echo'<label for="file">Filename:</label>';
              echo'<input type="file" name="file" id="file" />';
              echo'<input type="submit" name="submit" value="Submit" />';
              echo '</form>'; 
			  include 'footer.php';          	   	  
		$directory = "./upload/";
 
		$text = glob($directory . "*.txt");
		//print each file name
		foreach($text as $txt)
		{
			echo $txt . '<a href="'.$php_file.'?method=edit&filename='.substr($txt,9).'">编辑</a>';
		}
		    break;
	}
?>
