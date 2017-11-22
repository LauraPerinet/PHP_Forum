<?
function getMax($tab){
	for($i=0; $i<count($tab); $i++){
		$code=explode("-",$tab[$i]['level']);
		if($code[0]>$count) $count=$code[0];
	}
	return $count;
}
function range_comments($tab){
	$count=getMax($tab);
	$tabRanged=[];
	for($i=0; $i<count($tab);$i++){
		$code=explode("-",$tab[$i]['level']);
		for($j=0; $j<$count;$j++){
			$tabRanged[$j];
			if($count[$i]==$j) 
		}
	}

}

function print_comments($comment, $id){
	$req=array('id_sujet' => $_GET['id']);
	include('libs/db_get_comments.lib.php');
	$tab=array();
	if($num_doc>0){
		foreach($cursor as $com){
			array_push($tab, $com);
			print_text($com, $id);
		}
		$tabOK=range_comments($tab);
	}
}
function print_text($comment, $id)
{
	if(isset($comment['level'])){
		$code=$comment['level'];
	}else{
		$code=0;
	}
	?>
	<p>Publié le <?echo $comment['date'];?> par <? echo $comment['author'];?></p>
	<p><?echo $comment['text'].' code = '.$code;?> </p>
	<p><a href="?action=read&id=<?echo $id;?>&answer=<? echo $code;?>">Répondre</a></p>
	
	<?include('includes/form_answer.inc.php');
	
}
?>
<? require("libs/db_get_discution.lib.php");?>

<h2><? echo $discution['subject']?></h2>
<p><?echo $discution['theme']['name'];?></p>
<? print_text($discution, $discution['_id']); 
print_comments($discution, $discution['_id']); 

?>




