<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<title>{$title}</title>
<link rel="stylesheet" type="text/css" href="http://www.spaceoflegends.de/inc/css/default.css">
<script src="http://www.spaceoflegends.de/inc/js/default.js" type="text/javascript"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
 <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
</HEAD>
<BODY>
<div id="wrapper">
<div id="lefttop">
{block "Left"}
	<table style="text-align:center;width:180px;">
	<form action="index.php">
		<tr>
		<td><input type="submit" name="page" value="Logout"></td>
		</tr>
	</form>
	</table>
	<br/>
	{$info}
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
{/block}
</div>
<div id="inmenu">
{block "Menue"}
<div id="menue_button"><a href="http://game.spaceoflegends.de" target="_blank" title="Hier gelangst du zum Spiel">zum Spiel</a></div>
<div id="menue_button"><a href="http://mantis.spaceoflegends.de" target="_blank" title="Hier gelangst du zum Bugtracker">zum Mantis</a></div>
<div id="menue_button"><a href="http://team.spaceoflegends.de" target="_blank" title="Hier gelangst du zum Forum">zum Forum</a></div>
<div id="menue_button"><a href="index.php?page=search" target="_self" title="Suche hier nach anderen Spielern">Suche</a></div>
<div id="menue_button"><a href="index.php?page=news" target="_self" title="Schau dir hier deine Nachrichten an">Nachrichten</a></div>
<div id="menue_button"><a href="index.php?page=wall" target="_self" title="Deine Pinnwand, teile mit anderen Spielern was dich bewegt">Pinnwand</a></div>
<div id="menue_button"><a href="index.php?page=archivment" target="_self" title="Deine Spiel Erfolge">Erfolge</a></div>
<div id="menue_button"><a href="index.php?page=bote" target="_self" title="Der Letzte Commander-Bericht">Commander Bericht</a></div>
{if $adm}
<div id="menue_button"><a href="?page=adm" target="_self">Administration</a></div>
{/if}
{/block}
</div>
</div>
</BODY>
</HTML>