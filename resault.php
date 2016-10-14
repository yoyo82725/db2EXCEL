<?php
require("function.php");
$f->check();
echo '<meta http-equiv="Content-Type" content="text/html; charset=big5" />';
$OutList = $_POST['OutList'];//傳來的選項，陣列
@$OutLists = implode(',',$OutList);//字串
if(!$OutList){//無選項輸出
	echo "<script type='text/javascript'>alert('請至少選一項輸出！'); history.go(-1);</script>";
	exit;
}else{
	$ListAmount = count($OutList);
	$content = $_POST['content']; 
	if(!$content){//無內容
		echo "<script type='text/javascript'>alert('搜索結果為空！'); history.go(-1);</script>";
		exit;
	}else{
		$field = NULL ;//插入資料庫的欄位
		for($i=0 ; $i<$ListAmount ; $i++){
			$field .= '`'.$OutList[$i].'`,';
		}
		@$field = substr($field,0,-1);
		for($i=0;$i<$ListAmount;$i++){//中文欄位
			switch($OutList[$i]){
				case 'Department':
					$List_CH[$i]='科系'; break;
				case 'Type':
					$List_CH[$i]='學制'; break;
				case 'Level':
					$List_CH[$i]='年級'; break;
				case 'Class':
					$List_CH[$i]='班級'; break;
				case 'Number':
					$List_CH[$i]='學號'; break;
				case 'Name':
					$List_CH[$i]='姓名'; break;
				case 'Sex':
					$List_CH[$i]='性別'; break;
				case 'Identity':
					$List_CH[$i]='身分證'; break;
				case 'Birthday':
					$List_CH[$i]='生日'; break;
				case 'Cell_Phone':
					$List_CH[$i]='行動電話'; break;
				case 'Home_Phone':
					$List_CH[$i]='住宅電話'; break;
				case 'Before_Degree':
					$List_CH[$i]='入學前學歷'; break;
				case 'Address_Number':
					$List_CH[$i]='郵遞區號'; break;
				case 'Address':
					$List_CH[$i]='戶籍地址'; break;
				default:
					$List_CH[$i]='NULL';
			}
		}
		@$field_CH = implode(',',$List_CH);
		$Content_array=split(',',$content);
		$content = NULL ;
		for($i=0 ; $i<count($Content_array) ; $i++){
			$content .= "".$Content_array[$i].",";
		}
		@$content = substr($content,0,-1);
		$select = "SELECT {$field} FROM `new_student_data` WHERE `Number` IN ({$content}) ORDER BY `Number`";
		$result=mysql_query($select,setdb());
		$num = mysql_num_rows($result);
		if($num == 0){//搜索結果為空
			echo "<script type='text/javascript'>alert('搜索結果為空！'); history.go(-1);</script>";
			exit;
		}else{
			echo "<center><a href='index.php'>回首頁</a><br/>
			輸出：".$field_CH."<br/><table border='1'><tr>";
			for($i=0;$i<$ListAmount;$i++){
				echo "<td>".$List_CH[$i]."</td>";
			}
			echo "</tr>";
			for($i=0;$row = mysql_fetch_array($result,MYSQL_BOTH);$i++){
				echo "<tr>";
				$temp = '';
				for($j=0;$j<$ListAmount;$j++){
					echo "<td>".$row[$OutList[$j]]."</td>";
					$temp.=$row[$OutList[$j]];
					if($j!=$ListAmount-1) $temp.=',';
				}
				echo "</tr>";
			}
			echo "</table>
			<br/><a href='#'>Top</a>
			<br/><form action='csv.php' method='post' target='_blank'>
			<input type='hidden' name='field_CH' value='{$field_CH}'>
			<input type='hidden' name='OutLists' value='{$OutLists}'>
			<input type='hidden' name='select' value='{$select}'>
			<input type='submit' value='輸出成Excel'></form>";
		}
	}
}
?>
