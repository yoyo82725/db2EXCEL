<?php
require('function.php');
$f->check();
?>
<meta http-equiv="Content-Type" content="text/html; charset=big5" />
<html>
<head>
<style type='text/css'>
body{
	font-family:�رd�ײʶ�,���^;
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
		if(b=="���惡�C"){
			$('.'+a).attr('checked',true);
			$(this).attr('value','�������C');
		}else if(b=="�������C"){
			$('.'+a).attr('checked',false);
			$(this).attr('value','���惡�C');
		}else if(b=="����"){
			$('input:checkbox').attr('checked',true);
		}else if(b=="�M��"){
			$('input:checkbox').attr('checked',false);
		}
	});
});
</script>
</head>
<body>
<form action='resault.php' method='post'>
<center>��X����<br/><table><tr><td>
	<input type='button' value='���惡�C' id='ck1'>
	��t<input type='checkbox' name='OutList[]' value='Department' id='checkbox' class='ck1'>
	�Ǩ�<input type='checkbox' name='OutList[]' value='Type' id='checkbox' class='ck1'>
	�~��<input type='checkbox' name='OutList[]' value='Level' id='checkbox' class='ck1'>
	�Z��<input type='checkbox' name='OutList[]' value='Class' id='checkbox' class='ck1'>
	�Ǹ�<input type='checkbox' name='OutList[]' value='Number' id='checkbox' class='ck1'>
	<br/>
	<input type='button' value='���惡�C' id='ck2'>
	�m�W<input type='checkbox' name='OutList[]' value='Name' id='checkbox' class='ck2'>
	�ʧO<input type='checkbox' name='OutList[]' value='Sex' id='checkbox' class='ck2'>
	������<input type='checkbox' name='OutList[]' value='Identity' id='checkbox' class='ck2'>
	�ͤ�<input type='checkbox' name='OutList[]' value='Birthday' id='checkbox' class='ck2'>
	��ʹq��<input type='checkbox' name='OutList[]' value='Cell_Phone' id='checkbox' class='ck2'>
	��v�q��<input type='checkbox' name='OutList[]' value='Home_Phone' id='checkbox' class='ck2'>
	<br/>
	<input type='button' value='���惡�C' id='ck3'>
	�J�ǫe�Ǿ�<input type='checkbox' name='OutList[]' value='Before_Degree' id='checkbox' class='ck3'>
	�l���ϸ�<input type='checkbox' name='OutList[]' value='Address_Number' id='checkbox' class='ck3'>
	���y�a�}<input type='checkbox' name='OutList[]' value='Address' id='checkbox' class='ck3'>
	<center><input type='button' value='����'><input type='button' value='�M��'></center>
	</td></tr></table></center><br/>
	<center>�Ǹ�(ex:96xxxxxx,98xxxxxxx,100xxxxxx,97xxxxxx)</center>
	<center><textarea name='content' cols='50' rows='30'></textarea></center><br/>
	<center><input type='submit' value='�@�e�X�@'></center>
</form>
</body>
</html>