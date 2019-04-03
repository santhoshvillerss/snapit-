<!DOCTYPE html>
<html>
<head>
<script>
function yHandler(){
	// Watch video for line by line explanation of the code
	// http://www.youtube.com/watch?v=eziREnZPml4
	var wrap = document.getElementById('wrap');
	var contentHeight = wrap.offsetHeight;
	var yOffset = window.pageYOffset;
	var y = yOffset + window.innerHeight;
	if(y >= contentHeight){
		// Ajax call to get more dynamic data goes here
		wrap.innerHTML += '<div class="newData"></div>';
	}
	var status = document.getElementById('status');
	status.innerHTML = contentHeight+" | "+y;
}
window.onscroll = yHandler;
</script>
<style>
div#status{position:fixed; font-size:24px;}
div#wrap{width:75%; margin:0px auto;}
div.newData{height:1000px; background:#09F; margin:10px 0px;}
</style>
</head>
<body>
<div id="status">0 | 0</div>
<div id="wrap"><img src="images/img.jpg" alt="not"></div>
</body>
</html>
