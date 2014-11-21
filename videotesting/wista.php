<?php 

	if(isset($_GET['videoid'])) $vidId = $_GET['videoid'];
	if(isset($_POST['videoid'])) $vidId = $_POST['videoid'];
	$projectId = '33d4sxezit';
	$apiPasswordUpload = 'bbb9b32ac3c8f79e26034e4008721d121f7c967b4a6aa4a331db734d238e2819';
	$apiPasswordRead = '57de6e043a87f84288dd2216a77ac83d10b063d3c93bc2925ba708540c50a3c0';
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Wista Video</title>
<script
	src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet"
	href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
<script
	src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script type="text/javascript">

</script>
<style type="text/css">
.videolinkblock {
	float: left;
	width: 200px;
	height: 200px;
}

#uploadedVids {
	clear: right;
}

.contentSection {
	clear: both;
}
#videoDisp{ width: 800px; }
</style>
</head>
<body>
		
		<div id="dialog-form" title="Upload Video">
			<form id="uploadFrm" action="https://upload.wistia.com"
				enctype="multipart/form-data" method="post">
				<input type="hidden" id="api_password" name="api_password"
					value="<?=$apiPasswordUpload ?>" /> <input type="hidden"
					id="access_token" name="" value="access_token" /> <input
					type="hidden" id="project_id" name="project_id"
					value="<?=$projectId ?>" /> <input type="hidden" id="contact_id"
					name="contact_id" value="930691" /> <label labelfor="name">Name: </label>
				<input type="text" id="name" name="name" value="" /><br /> <label
					labelfor="description">Description:</label> <input type="text"
					id="description" name="description" value="" /><br /> <input
					type="file" id="file" name="file" />
			</form>
		</div>
	<h1>Wista Video</h1>
	<div id="accordion">
		<h2>Display</h2>
		<div class="contentSection">
		<div id="videoDisp" >
		<?php if(isset($vidId)) {?>
			<iframe
				src="//fast.wistia.net/embed/iframe/<?=$vidId ?>?videoFoam=true"
				allowtransparency="true" frameborder="0" scrolling="no"
				class="wistia_embed" name="wistia_embed" allowfullscreen
				mozallowfullscreen webkitallowfullscreen oallowfullscreen
				msallowfullscreen width="640" height="480"></iframe>
			<script src="//fast.wistia.net/assets/external/iframe-api-v1.js"></script>
		<?php }?>
		</div>
		</div>
		<h2>Library</h2>
		<div class="contentSection">
			<button id="openUploadForm">Upload Video</button><br /><br />
			<div id="uploadedVids"></div>
		</div>
	</div>

	<div id="videoUploadConfDlg" title="Video Uploaded"></div>


	<script type="text/javascript">
	var dialog;
	function getVideoBlock(data){
		var linkHtml = '<a href="wista.php?videoid='+data['hashed_id']+'" ><img src="'+ data['thumbnail']['url'] +'" /><br />'+ data['name'] +'</a> ';
		var descriptionhtml = '<div class="videodesc">'+data['description']+'</div>';
		return '<div class="videolinkblock">' + linkHtml + descriptionhtml + '</div>';
	}
	 function displayVideoLink(data){
			var targetdivnme = '#uploadedVids';
			$(targetdivnme).append(getVideoBlock(data)); 
		}
	function displayVideoUploadConf(data){
		 $( "#videoUploadConfDlg" ).html(getVideoBlock(data));
		 $( "#videoUploadConfDlg" ).dialog({
			 modal: true,
			 buttons: {
			 Ok: function() {
			 $( this ).dialog( "close" );
			 }
			 }
			 });
	}
	function displayCurrentLinks(){
		var url = "https://api.wistia.com/v1/medias.json?api_password=<?=$apiPasswordRead ?>";	
		$.get(url,function(data,status){
		    if(status == "success" ){
			    for(x=0; x < data.length; x++){
			    	displayVideoLink(data[x]);
			    }
		    }
		  });
	}
	function displayProjectLinks(){
		var url = "https://api.wistia.com/v1/projects/<?=$projectId ?>.json?api_password=<?=$apiPasswordRead ?>";		
		$.get(url,function(data,status){
		    if(status == "success" ){
			    for(x=0; x < data['medias'].length; x++){
			    	displayVideoLink(data['medias'][x]);
			    }
		    }
		  });
	}
	//Program a custom submit function for the form
	$("form#uploadFrm").submit(function(event){
	 
	  //disable the default form submission
	  event.preventDefault();
	 
	  //grab all form data  
	  var formData = new FormData($(this)[0]);
	 
	  $.ajax({
	    url: 'https://upload.wistia.com',
	    type: 'POST',
	    data: formData,
	    async: false,
	    cache: false,
	    contentType: false,
	    processData: false,
	    success: function (data,status){
	    	dialog.dialog( "close" );
		    //alert("Data: " + data + "\nStatus: " + status);
		    if(status == "success" ) { 
			    displayVideoLink(data); 
			    displayVideoUploadConf(data);
		    }
	    }
	  });
	 
	  return false;
	});
	 $(function() {


		 dialog = $( "#dialog-form" ).dialog({
			 autoOpen: false,
			 height: 300,
			 width: 350,
			 modal: true,
			 buttons: {
			 "Upload Video": function() {$("form#uploadFrm").submit();},
			 Cancel: function() {
			 dialog.dialog( "close" );
			 }
			 },
			 close: function() {
			 
			 }
		});
		 $( "#accordion" ).accordion();
		 displayCurrentLinks();
		 $( "#openUploadForm" ).button().on( "click", function() {
			 dialog.dialog( "open" );
			 });
	 });
	//$.ready(function(){
		
	//}); 
	

	</script>
</body>
</html>
