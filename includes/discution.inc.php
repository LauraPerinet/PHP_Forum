<?

function print_comments($parentId, $sujetId, $niveau, $title){
	$req=array('id_sujet' => (String)$parentId);
	include('libs/db_get_comments.lib.php');
	if($num_doc>0){
		$niveau++;
		
		foreach($cursor as $com){
			
			print_text($com, $sujetId, $niveau, $title);
			print_comments($com['_id'], $sujetId, $niveau, $title);
		}
		$niveau--;
	}
}
function print_text($comment, $sujetId, $niveau, $title)
{	?>
	
	<div class="<?echo ($niveau==0)?"sujet":"comment";?>"  id="<?echo $comment['_id'];?>" dataLevel="<? echo $niveau; ?>">
		<div class="entete">
		<p><? if($niveau!=0){ echo 'Re : ';} echo $title;?></p>
			
		<p class="infoSujet">Publié le <?echo $comment['date'];?> par <span><? echo $comment['author'];?></span></p>
		</div>
		<p class="text"><?echo $comment['text'];?> </p>
		<p class="repondre"><a href="index.php?action=read&id=<?echo $sujetId;?>&answer=<? echo $comment['_id'];?>">Répondre</a></p>

		<?include('includes/form_answer.inc.php');?>
		<script type="text/javascript">
		   margeComments('<?echo $comment['_id'];?>');
		</script>
		
	</div>
<?}
?>
<? require("libs/db_get_discution.lib.php"); 
$niveau=0;
print_text($discution, $discution['_id'],  $niveau, $discution['subject']); 
print_comments($discution['_id'],  $discution['_id'], $niveau, $discution['subject']); 

?>




