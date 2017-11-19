<?php
require_once('libs/db_list_themes.lib.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Forum</title>
	<link href="css/styles.css" rel="text/css"/>
</head>
<body>
<div id="global">
	<header>
		<h1>Un forum pour se mettre en jambe</h1>
		<!--<div id="log">
			<p>Nouvel utilisateur</p>
			<p><a href="connexion.php">Se déconnecter</a></p>
		</div>-->
	</header>
	<div id="menu_sujets">
		<h2></h2>
		<form method="post" action="libs/actions_distribution.lib.php?action=search">
		<p>Quelle thématique vous interesse :
			<select name="theme">
				<?
				foreach($themes as $theme){?>
					<option value="<?echo $theme['_id'];?>"><?echo $theme['nom'];?></option>
				<?}?>
	
			</select>
			<input type="submit" value="Go"/>
			</form>
		</p>
		<p><a href="index.php?action=new_discution">Créer un nouveau sujet</a></p>
	</div>
	<div id="content">
		<?require_once('libs/actions_distribution.lib.php')?>
	</div>
</div>
</body>
</html>