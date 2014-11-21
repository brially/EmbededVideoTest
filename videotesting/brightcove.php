<?php 
	$vidId = '';
	if(isset($_GET['videoid'])) $vidId = $_GET['videoid'];
	if(isset($_POST['videoid'])) $vidId = $_POST['videoid'];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>brightcove Video</title>
</head>
<body>
	<h1>brightcove Video</h1>
	<!-- Start of Brightcove Player -->

<div style="display:none">

</div>

<!--
By use of this code snippet, I agree to the Brightcove Publisher T and C 
found at https://accounts.brightcove.com/en/terms-and-conditions/. 
-->

<script language="JavaScript" type="text/javascript" src="http://admin.brightcove.com/js/BrightcoveExperiences.js"></script>

<object id="myExperience<?=$vidId ?>" class="BrightcoveExperience">
  <param name="bgcolor" value="#FFFFFF" />
  <param name="width" value="480" />
  <param name="height" value="270" />
  <param name="playerID" value="3889496444001" />
  <param name="playerKey" value="AQ~~,AAADiSm8JRk~,-tHEw9_RLi3Aq-qIjYw8u4v2lPKWN3-O" />
  <param name="isVid" value="true" />
  <param name="isUI" value="true" />
  <param name="dynamicStreaming" value="true" />
  
  <param name="@videoPlayer" value="3891698199001" />
</object>

<!-- 
This script tag will cause the Brightcove Players defined above it to be created as soon
as the line is read by the browser. If you wish to have the player instantiated only after
the rest of the HTML is processed and the page load is complete, remove the line.
-->
<script type="text/javascript">brightcove.createExperiences();</script>

<!-- End of Brightcove Player -->
</body>
</html>
