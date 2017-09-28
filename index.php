<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html;charset=utf-8"  />
	<!--<script src="scripts/news.js"></script>-->
</head>
<body>
<?php include 'init.php';?>
<?php include 'functions.php';?>

<form action="#" method="POST" >
<fieldset style="width:90%;margin:10px auto;padding:10px;">
<legend>optionSet</legend>
<?php echo changeToUtf('1.À´Ô´ÍøÕ¾  2.¹Ø¼ü×Ö');?>
<input type="reset"/> <input type="submit">
</fieldset>

</form>

<div style="padding:10px;margin:0 auto;width:90%;border:1px solid #000;">
	<h2><?php echo changeToUtf($keyWord[0]); ?></h2>
	<ul>
		<?php
			readPage($webName,$sourceWeb,$sourceWebRoot,$sourceWebIndexName,$sourceWebIndexFormat,$cutSource,$keyWord,$page);
		?> 
	</ul>
</div>
</body>
</html>