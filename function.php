<?php
function setdb(){
	$username="";
	$password="";
	$connDb="internship";
	$link = mysql_connect("120.102.163.54", $username, $password) or die(mysql_error());
	mysql_select_db($connDb) or die("Could not select database");
	mysql_query("SET NAMES utf8");
	mysql_query("SET CHARACTER_SET_CLIENT=utf8"); 
	mysql_query("SET CHARACTER_SET_RESULTS=big5");
	putenv("TZ=Asia/Taipei");
	return $link;
}
class f{
	function check_pw(){
		$file=fopen("kk.txt","r");
		$a=md5(fgets($file));
		fclose($file);
		return $a;
	}
	function check(){
		if ($_SERVER['PHP_AUTH_USER']!="gard" || md5($_SERVER['PHP_AUTH_PW'])!=$this->check_pw()){
			header('WWW-Authenticate: Basic realm="My Realm"'); //認證失敗，繼續認證
			header('HTTP/1.0 401 Unauthorized');
			exit;
		}
	}
}
$f=new f;
function deleteDirectory($dir) {//強制刪除目錄
    if (!file_exists($dir)) return true;  
    if (!is_dir($dir) || is_link($dir)) return unlink($dir);  
        foreach (scandir($dir) as $item) {  
            if ($item == '.' || $item == '..') continue;  
            if (!deleteDirectory($dir . "/" . $item)) {  
                chmod($dir . "/" . $item, 0777);  
                if (!deleteDirectory($dir . "/" . $item)) return false;  
            };  
        }  
        return rmdir($dir);  
}
@deleteDirectory("data");
?>
