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
	<header><h1>2013 Tomahawk League Virtual Draft Board</h1></header>
	<section id="go">
		<form id="theboard" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
			<fieldset>
				<legend>The Board</legend>
				<p>Please type players names and positions, as they are selected in the correct order.</p>
				<textarea rows="" cols="" name="board" id="board"></textarea>
				<br><br>
				<p>Who's up next?</p>
				<table cellspacing="10" cellpadding="0" border="0" id="draftorder">
					<tr>
						<td>
							<label for="position1">1</label>
							<input type="radio" name="ontheclock" value="position1">
							<input type="text" name="position1" placeholder="Name" class="namefield">
							<br>
							
							<label for="position2">2</label>
							<input type="radio" name="ontheclock" value="position2">
							<input type="text" name="position2" placeholder="Name"  class="namefield">
							<br>
							
							<label for="position3">3</label>
							<input type="radio" name="ontheclock" value="position3">
							<input type="text" name="position3" placeholder="Name"  class="namefield">
							<br>
							
							<label for="position4">4</label>
							<input type="radio" name="ontheclock" value="position4">
							<input type="text" name="position4" placeholder="Name"  class="namefield">
							
						</td>
						<td>
							<label for="position5">5</label>
							<input type="radio" name="ontheclock" value="position5">
							<input type="text" name="position5" placeholder="Name" class="namefield">
							<br>
							
							<label for="position6">6</label>
							<input type="radio" name="ontheclock" value="position6">
							<input type="text" name="position6" placeholder="Name"  class="namefield">
							<br>
							
							<label for="position7">7</label>
							<input type="radio" name="ontheclock" value="position7">
							<input type="text" name="position7" placeholder="Name"  class="namefield">
							<br>
							
							<label for="position8">8</label>
							<input type="radio" name="ontheclock" value="position8">
							<input type="text" name="position8" placeholder="Name"  class="namefield">
							
						</td>
						<td>
							<label for="position9">9</label>
							<input type="radio" name="ontheclock" value="position9">
							<input type="text" name="position9" placeholder="Name" class="namefield">
							<br>
							
							<label for="position10">10</label>
							<input type="radio" name="ontheclock" value="position10">
							<input type="text" name="position10" placeholder="Name"  class="namefield">
							<br>
							
							<label for="position11">11</label>
							<input type="radio" name="ontheclock" value="position11">
							<input type="text" name="position11" placeholder="Name"  class="namefield">
							<br>
							
							<label for="position12">12</label>
							<input type="radio" name="ontheclock" value="position12">
							<input type="text" name="position12" placeholder="Name"  class="namefield">
							
						</td>
						<td>
							<label for="position13">13</label>
							<input type="radio" name="ontheclock" value="position13">
							<input type="text" name="position13" placeholder="Name" class="namefield">
							<br>
							
							<label for="position14">14</label>
							<input type="radio" name="ontheclock" value="position14">
							<input type="text" name="position14" placeholder="Name"  class="namefield">
							<br>
							
							<label for="position15">15</label>
							<input type="radio" name="ontheclock" value="position15">
							<input type="text" name="position15" placeholder="Name"  class="namefield">
							<br>
							
							<label for="position16">16</label>
							<input type="radio" name="ontheclock" value="position16">
							<input type="text" name="position16" placeholder="Name"  class="namefield">
							
						</td>
					</tr>
				</table>
			</fieldset>
		</form>
		
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
	</section>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>
<script src="js/vendor/jquery.cookie.js"></script>
<script src="js/vendor/autosaveform.js"></script>
<script>
function loadChat(){
	$('#chats').load('chat.json').scrollTop($('#chats').prop("scrollHeight"));
	setTimeout("loadChat()",1000);
}

$(document).ready(function(){
		
	var formsave = new autosaveform({
		formid: 'theboard', 
		savingmsg: "Updating Board&hellip;"
	});
	
	loadChat(); //load the results
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