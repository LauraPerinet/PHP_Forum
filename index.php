<?php
require_once('libs/db_list_themes.lib.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Forum</title>
	<link href="https://fonts.googleapis.com/css?family=Fira+Sans|Lobster" rel="stylesheet"> 
	<link href="css/styles.css" type="text/css" rel="stylesheet"/>
	<script>
		function margeComments(id){
			var e=document.getElementById(id);
			var level=Number(e.getAttribute('datalevel'));
			e.style.marginLeft=50*level+"px";
		}
	</script>
</head>
<body>
<div id="global">
	<header>
		<h1>Super Forum</h1>
		<div id="menu_sujets">
			<form method="post" action="libs/actions_distribution.lib.php?action=search">
				<p>Quelle thématique vous interesse :
					<select name="theme">
						<option value="all">Tous les sujets</option>
						<?
						foreach($themes as $theme){?>
							<option value="<?echo $theme['_id'];?>" <?if(isset($_GET['theme']) && (String)$theme['_id']==$_GET['theme']) echo 'selected="selected"';?>><?echo $theme['nom'];?></option>
						<?}?>
			
					</select>
					<input type="submit" value="Go"/>
				</p>
			</form>
		
			<p><a href="index.php?action=new_discution">Créer un nouveau sujet</a></p>
		</div>
	</header>
	
	<div id="content">
		<?require_once('libs/actions_distribution.lib.php')?>
	</div>
</div>
</body>
</html>