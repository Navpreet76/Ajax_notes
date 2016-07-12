<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax Posts</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#add_note").submit(function(){
				var form = $(this);

				$.post(
					form.attr("action"), 
					form.serialize() , 
					function(return_data){
						$('#messages').append("<div class='notes'>" + return_data.description + "</div>");
						$('#add_note').trigger("reset");
					}, 
					"json");
				return false;
			});
		});
	</script>
	<style>
	* {
		font-family: Helvetica, Sans-Serif;
	}
	.notes {
		width: 100px;
		height: 100px;
		border: 1px solid grey;
		border-top: 10px solid black;
		display: inline-block;
		vertical-align: top;
		padding: 10px;
		margin: 2px 0;
		background-color: yellow;
	}
	input{
		font-size: 25px;
		background-color: yellow;
	}
	</style>
</head>
<body>
	<h1>My Posts</h1>
	<div id="messages">
<?php
	foreach ($notes as $note) 
	{
?>
	<div class="notes">
		<span><?= $note['description']?></span>
	</div>
<?php
	}
?>
	</div>
	<h2>Add a note:</h2>
	<form id="add_note" action="/notes/create" method="post">
		<textarea name="note" id="note" cols="30" rows="10"></textarea>	
		<input type="submit" value="Post It!">
	</form>
</body>
</html>