<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QR</title>
    <script type="text/javascript" src="lib/html5_qrcode.min.js"></script>
    <script type="text/javascript" src="lib/html5_qrcode.min.js"></script>
    <script type="text/javascript" src="src/html5_qrcode.min.js"></script>
</head>
<body>
     <div id="reader" style="width:300px;height:250px"></div>
 </div>
</body>
<script
  src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
  integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
  crossorigin="anonymous"></script>
<script>
    $('#reader').html5_qrcode(function(data){
        alert(data);
 		 //do something when code is read
 	},
 	function(error){
		//show read errors 
	}, function(videoError){
		//the video stream could be opened
	}
);
</script>
</html>