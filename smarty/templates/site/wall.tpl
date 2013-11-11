{extends file="site/main.tpl"}
{block name="Content"}
<form action="index.php?page=insertPin" method="post">
  	<input type="hidden" value="{$id}" name="id">
  	<input type="text" size="50" name="text">
	<input type="submit" value="Anpinnen" name="anpinnen">
</form>
{$content}
{/block}