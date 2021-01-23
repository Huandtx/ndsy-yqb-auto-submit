<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>宁师疫情表</title>
<style>
input{
    outline-style: none ;
    border: 1px solid #ccc; 
    border-radius: 3px;
    padding: 13px 14px;
    width: 500px;
    font-size: 14px;
    font-weight: 700;
    font-family: "Microsoft soft";
}
input:focus{
    border-color: #66afe9;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6)
}
.all{
	width: 800px;
	height: 450px;
	position:absolute;
    top:50%;
    left:50%;
    margin:-200px 0 0 -300px;
}
</style>
</head>
<body style="background-color:pink">
<h1 align='center'>请输入疫情表链接</h1>
<div class="all">
<form name=”form” method="post" action="#">
	<input type="text" name="link" required="required"/>
	<input type="submit" name="submit" style="width:100px;" value="提交">
</form>
</div>
</body>
</html>
<?php
//header("Content-type:text/html;charset=utf-8");
if(isset($_POST['submit'])){
	$repeat=$_POST['link'];
	if(filter_var($repeat, FILTER_VALIDATE_URL) !== false){
	$data = file_get_contents("/home/www/htdocs/name.txt");
	$array = explode("\r\n", $data);
	if(in_array($repeat,$array)){
		echo "<script>alert('该链接已提交')</script>";
	}
	else{
		file_put_contents("/home/www/htdocs/name.txt",$repeat.PHP_EOL,FILE_APPEND);
		echo "<script>alert('链接添加成功')</script>";
	}
	}
	else{
		echo "<script>alert('请提交正确的链接')</script>";
}
}
?>
