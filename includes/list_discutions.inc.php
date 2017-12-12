<?
if($_GET['theme']=="all"){
	$title="Toutes les discutions";
}else{
	include('libs/db_themes_by_id.php');
	$title="Les discutions autour de ".$theme['nom'];
}
?>
<h2><?php echo $title;?> </h2>

<?php
include('libs/db_get_discutions_by_theme.lib.php');
foreach($discutions as $discution){?>

	<div class="discution">
		<div class="sujet">
			<a href="?action=read&id=<? echo $discution['_id']; ?>">
				<?echo $discution['subject'];?>
			</a>
		</div>
		<div class="infoSujet">
			<p>Par <span> <?echo $discution['author'];?></span> le <?echo $discution['date'];?></p>
		</div>
	</div>
<?}?>
