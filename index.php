<?php
require('function.php');
$f->check();
?>
<meta http-equiv="Content-Type" content="text/html; charset=big5" />
<html>
<head>
<style type='text/css'>
body{
	font-family:華康儷粗黑,黑体;
	font-size:18px;
}
#checkbox{
	width:30px;
}
</style>
<script type='text/javascript' src='jquery-1.7.2.js'></script>
<script type='text/javascript'>
$(document).ready(function(){
	$('input:button').click(function(){
		a=$(this).attr("id");
		b=$(this).attr("value");
		if(b=="全選此列"){
			$('.'+a).attr('checked',true);
			$(this).attr('value','取消此列');
		}else if(b=="取消此列"){
			$('.'+a).attr('checked',false);
			$(this).attr('value','全選此列');
		}else if(b=="全選"){
			$('input:checkbox').attr('checked',true);
		}else if(b=="清空"){
			$('input:checkbox').attr('checked',false);
		}
	});
});
</script>
</head>
<body>
<form action='resault.php' method='post'>
<center>輸出項目<br/><table><tr><td>
	<input type='button' value='全選此列' id='ck1'>
	科系<input type='checkbox' name='OutList[]' value='Department' id='checkbox' class='ck1'>
	學制<input type='checkbox' name='OutList[]' value='Type' id='checkbox' class='ck1'>
	年級<input type='checkbox' name='OutList[]' value='Level' id='checkbox' class='ck1'>
	班級<input type='checkbox' name='OutList[]' value='Class' id='checkbox' class='ck1'>
	學號<input type='checkbox' name='OutList[]' value='Number' id='checkbox' class='ck1'>
	<br/>
	<input type='button' value='全選此列' id='ck2'>
	姓名<input type='checkbox' name='OutList[]' value='Name' id='checkbox' class='ck2'>
	性別<input type='checkbox' name='OutList[]' value='Sex' id='checkbox' class='ck2'>
	身分證<input type='checkbox' name='OutList[]' value='Identity' id='checkbox' class='ck2'>
	生日<input type='checkbox' name='OutList[]' value='Birthday' id='checkbox' class='ck2'>
	行動電話<input type='checkbox' name='OutList[]' value='Cell_Phone' id='checkbox' class='ck2'>
	住宅電話<input type='checkbox' name='OutList[]' value='Home_Phone' id='checkbox' class='ck2'>
	<br/>
	<input type='button' value='全選此列' id='ck3'>
	入學前學歷<input type='checkbox' name='OutList[]' value='Before_Degree' id='checkbox' class='ck3'>
	郵遞區號<input type='checkbox' name='OutList[]' value='Address_Number' id='checkbox' class='ck3'>
	戶籍地址<input type='checkbox' name='OutList[]' value='Address' id='checkbox' class='ck3'>
	<center><input type='button' value='全選'><input type='button' value='清空'></center>
	</td></tr></table></center><br/>
	<center>學號(ex:96xxxxxx,98xxxxxxx,100xxxxxx,97xxxxxx)</center>
	<center><textarea name='content' cols='50' rows='30'></textarea></center><br/>
	<center><input type='submit' value='　送出　'></center>
</form>
</body>
</html>