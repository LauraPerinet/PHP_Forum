<?if(isset($_GET['answer']) && $_GET['answer']==$comment['_id']){?>
<form id="comment" method="post" action="libs/db_new_answer.lib.php?id=<?echo $_GET['id'];?>&answer=<?echo $comment['_id'];?>">
	<label for="text">Développez votre sujet</label>
	<textarea id="text" name="text" required></textarea>
	<label for="signature">Votre nom :</label>
	<input type="text" name="signature" id="signature" required/>
	<input type="submit" value="Répondre" />
</form>
<?}