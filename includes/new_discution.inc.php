<h1>Nouvelle discution</h1>
<label>Choississez votre thématique</label>
<form action="libs/db_new_discution.lib.php" method="POST"> 
	<? if(isset($_GET['ok']) && $_GET['ok']=='no'){?>
		<p class="error">Tous les champs sont obligatoires !</p>
	<?}?>
	<select name="theme">
		<?
		foreach($themes as $theme){?>
			<option value="<?echo $theme['_id'];?>"><?echo $theme['nom'];?></option>
		<?}?>

	</select>
	<label for="subject">Précisez votre sujet</label>
	<input type="text" name="subject" id="subject" max="100" required/>
	<label for="text">Développez votre sujet</label>
	<textarea id="text" name="text" required></textarea>
	<label for="signature">Votre nom :</label>
	<input type="text" name="signature" id="signature" required/>
	<input type="submit" value="Mettre en ligne le sujet" required/>
</form>
