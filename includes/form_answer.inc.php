<?if(isset($_GET['answer']) && $_GET['answer']===$code){?>
<?echo 'get ='.$_GET['answer'].' et code ='.$code;?>
<form method="post" action="libs/db_new_answer.lib.php?id=<?echo $id;?>&level=<?echo $code;?>">
	<label for="text">Développez votre sujet</label>
	<textarea id="text" name="text" required></textarea>
	<label for="signature">Votre nom :</label>
	<input type="text" name="signature" id="signature" required/>
	<input type="submit" value="Répondre" />
</form>
<?}