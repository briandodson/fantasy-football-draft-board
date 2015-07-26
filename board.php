<!DOCTYPE html>  
<html>  
<head>  
<title>2013 Tomahawk League Virtual Draft Board</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="stylesheet" href="css/main.css">
<script src="js/vendor/modernizr-2.6.2.min.js"></script>
</head>  
<body>
<div id="wrapper">
	<header><h1>2013 Tomahawk League Virtual Draft Board</h1>
		<div id="draftOrder">
			<span id="pos1"></span>
			<span id="pos2"></span>
			<span id="pos3"></span>
			<span id="pos4"></span>
			<span id="pos5"></span>
			<span id="pos6"></span>
			<span id="pos7"></span>
			<span id="pos8"></span>
			<span id="pos9"></span>
			<span id="pos10"></span>
			<span id="pos11"></span>
			<span id="pos12"></span>
			<span id="pos13"></span>
			<span id="pos14"></span>
			<span id="pos15"></span>
			<span id="pos16"></span>
		</div>
		<div class="onTheClock">
				On The Clock: <span class="now"></span>
			</div>
	</header>
	<section id="draftRoom">
		<div class="liveBoard">
			<h2>Draft Picks:</h2>
			<div id="liveBoard">
				Loading…
			</div>
		</div>
		<div id="chatroom">
			<form id="chat" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
				<fieldset>
					<legend>Chat Room</legend>
					<div id="chats"></div>
					<input type="text" name="name" id="name" placeholder="Your Name?">
					
					<input type="text" name="msg" id="msg" placeholder="Type your message, click GO">
					<a id="goBtn">GO</a>
				</fieldset>
			</form>
		</div>
		<a name="end" id="end"></a>
	</section>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
<script src="js/vendor/jquery.cookie.js"></script>
<script src="js/vendor/autosaveform_chat.js"></script>
<script>
$.ajaxSetup({cache:false});
function loadDraftOrder(){
	$.getJSON("data.json", function(data){
		$('#pos1').html('<b>1</b>'+data.position1); 
		$('#pos2').html('<b>2</b>'+data.position2); 
		$('#pos3').html('<b>3</b>'+data.position3); 
		$('#pos4').html('<b>4</b>'+data.position4); 
		$('#pos5').html('<b>5</b>'+data.position5); 
		$('#pos6').html('<b>6</b>'+data.position6); 
		$('#pos7').html('<b>7</b>'+data.position7); 
		$('#pos8').html('<b>8</b>'+data.position8); 
		$('#pos9').html('<b>9</b>'+data.position9); 
		$('#pos10').html('<b>10</b>'+data.position10); 
		$('#pos11').html('<b>11</b>'+data.position11); 
		$('#pos12').html('<b>12</b>'+data.position12); 
		$('#pos13').html('<b>13</b>'+data.position13); 
		$('#pos14').html('<b>14</b>'+data.position14); 
		$('#pos15').html('<b>15</b>'+data.position15); 
		$('#pos16').html('<b>16</b>'+data.position16);
	});
	setTimeout("loadDraftOrder()",10000);
}
function loadBoard(){
	$.getJSON("data.json", function(data){
		var theboard = data.board, 
				theboard = theboard.replace(/\n/g,"<br>");
		var now = parseInt(data.ontheclock);
		$('#liveBoard').html(theboard);
		$("#draftOrder span").removeClass('active');
		$("#draftOrder span#pos"+(now+1)).addClass('active');
		$('.onTheClock span.now').html($("#draftOrder span#pos"+(now+1)).clone());
	});
	setTimeout("loadBoard()",1000);
}
function loadChat(){
	$('#chats').load('chat.json').scrollTop($('#chats').prop("scrollHeight"));
	setTimeout("loadChat()",1000);
}

$(document).ready(function(){
	loadDraftOrder(); //load the results
	loadBoard(); //load the results
	loadChat(); //load the results
	
	var formsave = new autosaveform({
		formid: 'chat', 
		savingmsg: "Loading&hellip;"
	});
	
	$('a#goBtn').click(function(){
		//submit chat
		var name = $('input#name').val();
		var msg = $('input#msg').val();
		$.ajax({
			type: "POST", 
			url: "chatroom.php", 
			data: "formdata=<div class='chat'><span class='name'>"+name+"</span>: <span class='msg'>"+msg+"</span></div>\n"
		});

		$('input#msg').val('');
	});
});
</script>
</body>  
</html>