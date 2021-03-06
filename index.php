<!DOCTYPE HTML>
<html>
<head>
<title>解析爱奇艺视频地址</title>
<meta charset="UTF-8">
<link rel="shortcut icon" href="http://www.iqiyi.com/favicon.ico" type="image/x-icon"/>
<style>
body{color:#333;font-family:"segoe ui",Arial,sans-serif}#page{width:90%;margin:40px auto 0;padding:20px 0}h1{text-align:center}form{text-align:center;margin:40px 0}#url{width:100%;height:48px;font-size:18px;color:#888;background:#f2f2f2;border:0;padding:0 10px;outline:0;text-align:center;box-sizing:border-box}#url,#submit{transition:color,background .2s ease-out}#url:focus{color:#000;background:#C7EAEA}#submit{margin:0;padding:8px 18px;font-size:16px;cursor:pointer;color:#fff;background:#32B1BD;border:0;border-radius:3px}#submit:hover{background:#379AA3}#submit:active{background:#238993;padding:9px 18px 7px}.type{margin:15px;display:inline-block;vertical-align:middle;cursor:pointer}pre{font-family:monaco,consolas;font-size:13px;background:#f8f8f8;padding:10px;border:1px solid #e3e3e3;overflow-x:auto}span{color:#E47;font-weight:bold}@media screen and (max-width:1080px){#url{font-size:16px}pre{font-size:12px}}
</style>
</head>

<body>
	<div id="page">
		<h1>解析爱奇艺视频地址</h1>
		<form action="index.php" method="get">
			<input id="url" name="url" type="text" placeholder="请在此输入视频地址"<?php echo isset($_GET['url']) && $_GET['url'] != '' ? ' value="' . $_GET['url'] . '"' : ''?>>
			<label class="type"><input type="radio" value="fluent" name="type" <?php echo isset($_GET['type']) && $_GET['type'] == "fluent" ? ' checked="checked"' : ''?>/>极速</label>
			<label class="type"><input type="radio" value="normal" name="type" <?php echo isset($_GET['type']) && $_GET['type'] == 'normal' ? ' checked="checked"' : ''?>/>流畅</label>
			<label class="type"><input type="radio" value="high" name="type" <?php echo isset($_GET['type']) && $_GET['type'] == 'high' ? ' checked="checked"' : ''?>/>高清</label>
			<label class="type"><input type="radio" value="super" name="type" <?php echo isset($_GET['type']) && $_GET['type'] == 'super' ? ' checked="checked"' : ''?>/>720P</label>
			<label class="type"><input type="radio" value="hd" name="type" <?php echo isset($_GET['type']) && $_GET['type'] == 'hd' ? ' checked="checked"' : ''?>/>1080P</label>
			<label class="type"><input type="radio" value="all" name="type" <?php echo isset($_GET['type']) && $_GET['type'] == 'all' || !isset($_GET['type']) ? ' checked="checked"' : ''?>/>全部</label>
			<label class="type"><input type="submit" id="submit" value="解析"/></label>
		</form>
<?php
require "iqiyi.class.php";

function debug($url,$type){
	$result = Iqiyi::parse($url,$type);
	echo "<pre>\n<span>下载链接10分钟内有效，请尽快下载，若失效刷新本页面！</span> <br>";
	if ($result){
		if ($type == 'all'){
			print_r($result);
		} else {
			echo "\n标题：" . $result['title'] . "\n";
			echo "时长：" . $result['seconds'] . "秒\n";
			echo "<ol>";
			$value = array_slice($result,2,1);
			foreach ($value as $key => $vals){
				foreach ($vals as $val){
					echo "<li>" .$val. "</li>";
				}
			}
			echo "</ol>";
		}
	}
	else {
		echo "\n<span>获取失败！</span>";
	}
		echo "</pre>\n";
}

###### output video urls ######
$type = isset($_GET['type']) && $_GET['type'] != '' ? $_GET['type'] : 'all';
if (isset($_GET['url'])){
	if ($_GET['url'] != ''){
		$url = $_GET['url'];
		debug($url,$type);
	} else if ($_GET['url'] == ''){
		$url = 'http://www.iqiyi.com/v_19rroonq48.html';
		debug($url,$type);
	}
}
?>
	</div>
</body>
</html>