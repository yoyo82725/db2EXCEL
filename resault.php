<?php
require("function.php");
$f->check();
echo '<meta http-equiv="Content-Type" content="text/html; charset=big5" />';
$OutList = $_POST['OutList'];//�ǨӪ��ﶵ�A�}�C
@$OutLists = implode(',',$OutList);//�r��
if(!$OutList){//�L�ﶵ��X
	echo "<script type='text/javascript'>alert('�Цܤֿ�@����X�I'); history.go(-1);</script>";
	exit;
}else{
	$ListAmount = count($OutList);
	$content = $_POST['content']; 
	if(!$content){//�L���e
		echo "<script type='text/javascript'>alert('�j�����G���šI'); history.go(-1);</script>";
		exit;
	}else{
		$field = NULL ;//���J��Ʈw�����
		for($i=0 ; $i<$ListAmount ; $i++){
			$field .= '`'.$OutList[$i].'`,';
		}
		@$field = substr($field,0,-1);
		for($i=0;$i<$ListAmount;$i++){//�������
			switch($OutList[$i]){
				case 'Department':
					$List_CH[$i]='��t'; break;
				case 'Type':
					$List_CH[$i]='�Ǩ�'; break;
				case 'Level':
					$List_CH[$i]='�~��'; break;
				case 'Class':
					$List_CH[$i]='�Z��'; break;
				case 'Number':
					$List_CH[$i]='�Ǹ�'; break;
				case 'Name':
					$List_CH[$i]='�m�W'; break;
				case 'Sex':
					$List_CH[$i]='�ʧO'; break;
				case 'Identity':
					$List_CH[$i]='������'; break;
				case 'Birthday':
					$List_CH[$i]='�ͤ�'; break;
				case 'Cell_Phone':
					$List_CH[$i]='��ʹq��'; break;
				case 'Home_Phone':
					$List_CH[$i]='��v�q��'; break;
				case 'Before_Degree':
					$List_CH[$i]='�J�ǫe�Ǿ�'; break;
				case 'Address_Number':
					$List_CH[$i]='�l���ϸ�'; break;
				case 'Address':
					$List_CH[$i]='���y�a�}'; break;
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
		if($num == 0){//�j�����G����
			echo "<script type='text/javascript'>alert('�j�����G���šI'); history.go(-1);</script>";
			exit;
		}else{
			echo "<center><a href='index.php'>�^����</a><br/>
			��X�G".$field_CH."<br/><table border='1'><tr>";
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
			<input type='submit' value='��X��Excel'></form>";
		}
	}
}
?>
