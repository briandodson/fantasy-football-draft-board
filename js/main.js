$(document).ready(function(){
		
	var formsave = new autosaveform({
		formid: 'theboard', 
		savingmsg: "Updating Board&hellip;"
	});
	
	function loadBoard(){
		$.getJSON("data.json", function(data){
			$('#liveBoard').html(data.board);
		});
		setTimeout("loadBoard()",1000);
	}

});
