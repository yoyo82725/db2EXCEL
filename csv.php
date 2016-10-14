<?php
require('function.php');
$f->check();
echo '<meta http-equiv="Content-Type" content="text/html; charset=big5" />';
$field_CH = $_POST['field_CH'];
$select = $_POST['select'];
$OutLists = $_POST['OutLists'];
$OutList = split(",",$OutLists);
$ListAmount = count($OutList);
$result=mysql_query($select,setdb());
$num = mysql_num_rows($result);
$name = substr(md5(date("m.d.y H:i:s")),1,15);//亂名
$fileName = date("Y_m_d H_i_s_").$name;

@mkdir("data");//新建目錄
if($num == 0){//搜索結果為空
	echo "<script type='text/javascript'>alert('搜索結果為空！'); history.go(-1);</script>";
	exit;
}else{
	$file = fopen("data/".$fileName.".csv","w");
	fputcsv($file,split(',',$field_CH));
	for($i=0;$row = mysql_fetch_array($result,MYSQL_BOTH);$i++){
		$temp = '';
		for($j=0;$j<$ListAmount;$j++){
			$temp.=$row[$OutList[$j]];
			if($j!=$ListAmount-1) $temp.=',';
		}
		fputcsv($file,split(',',$temp));
	}
	fclose($file);
	echo "<script type='text/javascript'>location.href='data/".$fileName.".csv';</script>";
}
?>