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
<label for="szfkw"><?php echo changeToUtf($webName[0]).':keyword='; ?></label><input type="text" id="szfkw" name="szfkw" value="<?php echo changeToUtf($keyWord[0]);?>"/>&nbsp;
<label for="jyjkw"><?php echo changeToUtf($webName[1]).':keyword='; ?></label><input type="text" id="jyjkw" name="szfkw" value="<?php echo changeToUtf($keyWord[1]);?>"/><br/>
<label for="szf"><?php echo changeToUtf($webName[0]).':viewPage='; ?></label><input type="text" id="szf" name="szf" value="<?php echo $page[0];?>"/>&nbsp;
<label for="jyj"><?php echo changeToUtf($webName[1]).':viewPage='; ?></label><input type="text" id="jyj" name="szf" value="<?php echo $page[1];?>"/><br/>
<input type="reset"/> <input type="submit">
</fieldset>

</form>
 
<div style="padding:10px;margin:0 auto;width:90%;border:1px solid #000;">
	<h2><?php echo changeToUtf($keyWord[0]); ?></h2>
	<ul>
		<?php
		/*输出获取的指定信息*/
		for($sourceNumber=0;$sourceNumber<count($sourceWeb);$sourceNumber++){
			if($page[$sourceNumber]===1){   //只读取一页
				outputLink($webName[$sourceNumber],$sourceWeb[$sourceNumber],$sourceWebRoot[$sourceNumber],$cutSource[$sourceNumber],$keyWord[$sourceNumber]);
			}
			else{						  //读取多页
				for($pageNumber=0;$pageNumber<$page[$sourceNumber];$pageNumber++){
					if($pageNumber===0){
						$sourceWebTemp[$pageNumber] = $sourceWebRoot[$sourceNumber].'default.htm';
					}
					else{
						$sourceWebTemp[$pageNumber] = $sourceWebRoot[$sourceNumber].'default_'.$pageNumber.'.htm';
						//echo $sourceWebTemp[$pageNumber];
					}
					outputLink($webName[$sourceNumber],$sourceWebTemp[$pageNumber],$sourceWebRoot[$sourceNumber],$cutSource[$sourceNumber],$keyWord[$sourceNumber]);
				}
			}
		}
		//outputLink($webName[0],$sourceWeb[0],$cutSource[0],$keyWord);
		//outputLink($webName[1],$sourceWeb[1],$cutSource[1],$keyWord);
		/*
		$html1 = file_get_contents($sourceWeb[1]);
		$html1 = changeToUtf($html1);
		preg_match_all($cutSource[1],$html1,$result);
		//var_dump($result);
		echo $result[0][0];*/
		?> 
	</ul>
</div>
</body>
</html>