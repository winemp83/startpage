<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<title>{$title}</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="http://www.spaceoflegends.de/inc/css/default.css">
<script src="http://www.spaceoflegends.de/inc/js/default.js" type="text/javascript"></script>
</HEAD>
<BODY>
<div id="wrapper">
<div id="left_top">
{block "Left"}
	<table style="text-align:center;width:180px;height:180px;">
	<tr>
		<td>Username :</td>
	</tr>
	<tr>
	<form method="post">
		<td><input type="text" name="user" size="15" max-size="30"></td>
	</tr>
	<tr>
		<td>Passwort :</td>
	</tr>
	<tr>
		<td><input type="password" name="pass" size="15" max-size="30"></td> 
	</tr>
	<tr>
		<td><input type="submit" name="Login" value="Login"></td>
	</form>
	</table>
{/block}
</div>
<div id="header">
{block "Header"}
<p>
	<h3>Space of Legends<br />
	Ein episches Weltall Abenteuer</h3>
</p>
{/block}
</div>
<div id="content">
{block "Content"}
<p>
	Willkommen bei Space of Legends,<br />
	Bitte gedulden Sie sich einwenig. Die Seite befindet sich noch im Aufbau!<br />
</p>
{/block}
</div>
<div id="menue">
{block "Menue"}
<div id="menue_button"><a href="http://game.spaceoflegends.de" target="_blank">zum Spiel</a></div>
<div id="menue_button"><a href="http://mantis.spaceoflegends.de" target="_blank">zum Mantis</a></div>
<div id="menue_button"><a href="http://team.spaceoflegends.de" target="_blank">zum Forum</a></div>
{/block}
</div>
</div>
</BODY>
</HTML>
