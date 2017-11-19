<?function print_comments($comment, $code, $id)
{?>
	<p>Publié le <?echo $comment['date'];?> par <? echo $comment['author'];?></p>
	<p><?echo $comment['text'];?></p>
	<p><a href="?action=read&id=<?echo $id;?>&answer=<? echo $code;?>">Répondre</a></p>
	
	<?include('includes/form_answer.inc.php');
	if(count($comment['answers'])>0){
		$code*=10;
		foreach($comment['answers'] as $com){
			print_comments($com, $code,$id);
			$code++;
			echo $code;
		}
	}
}
?>
<? require("libs/db_get_discution.lib.php");
$code=1;
?>

<h2><? echo $discution['subject']?></h2>
<p><?echo $discution['theme']['name'];?></p>
<? print_comments($discution, $code, $discution['_id']); ?>




