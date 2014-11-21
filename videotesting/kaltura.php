<?php 
	require_once '../extensions/kaltura/php5/KalturaClient.php';
	$vidId = '';
	if(isset($_GET['videoid'])) $vidId = $_GET['videoid'];
	if(isset($_POST['videoid'])) $vidId = $_POST['videoid'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Kaltura Video</title>
</head>
<body>
	<h1>Kaltura Video</h1>
	<div id="kaltura_player_1416409769"
		style="width: 400px; height: 333px;" itemprop="video" itemscope
		itemtype="http://schema.org/VideoObject">
		<span itemprop="name" content="corkscrewHD"></span> <span
			itemprop="description" content=""></span> <span itemprop="duration"
			content="60"></span> <span itemprop="thumbnail"
			content="http://cdnbakmi.kaltura.com/p/1841881/sp/184188100/thumbnail/entry_id/<?=$vidId ?>/version/100000/acv/161"></span>
		<span itemprop="width" content="400"></span> <span itemprop="height"
			content="333"></span> <a
			href="http://corp.kaltura.com/products/video-platform-features">Video
			Platform</a> <a
			href="http://corp.kaltura.com/Products/Features/Video-Management">Video
			Management</a> <a href="http://corp.kaltura.com/Video-Solutions">Video
			Solutions</a> <a
			href="http://corp.kaltura.com/Products/Features/Video-Player">Video
			Player</a>
	</div>
	<script
		src="http://cdnapi.kaltura.com/p/1841881/sp/184188100/embedIframeJs/uiconf_id/26354192/partner_id/1841881?autoembed=true&entry_id=<?=$vidId ?>&playerId=kaltura_player_1416409769&cache_st=1416409769&width=400&height=333"></script>
</body>
</html>
