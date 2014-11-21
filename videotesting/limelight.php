<?php 
	$vidId = '';
	if(isset($_GET['videoid'])) $vidId = $_GET['videoid'];
	if(isset($_POST['videoid'])) $vidId = $_POST['videoid'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Limelight Video</title>
</head>
<body>
	<h1>Limelight Video</h1>
	<span class="LimelightEmbeddedPlayer"><script
			src="//video.limelight.com/player/embed.js"></script>
		<object type="application/x-shockwave-flash"
			id="limelight_player_500789" name="limelight_player_500789"
			class="LimelightEmbeddedPlayerFlash" width="480" height="321"
			data="//video.limelight.com/player/loader.swf">
			<param name="movie" value="//video.limelight.com/player/loader.swf" />
			<param name="wmode" value="window" />
			<param name="allowScriptAccess" value="always" />
			<param name="allowFullScreen" value="true" />
			<param name="flashVars"
				value="mediaId=<?=$vidId ?>&amp;playerForm=Player" />
		</object>
		<script>LimelightPlayerUtil.initEmbed('limelight_player_500789');</script></span>
</body>
</html>
