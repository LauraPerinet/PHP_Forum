<?php 
function test_comment_level($code, $id){
	$req=$js = "function() {
		return this.id_subject == '".$id."' || this.level == '".$code."';
	}";
	$req=array('$where' => $req);
	include('./db_get_comments.lib.php');
	if($num_doc > 0){
		$result=true;
	}else{
		$result=false;
	}
	return $result;
}

function setLevel($parentLevel, $id_subject){
	
	$i=0;
	while(test_comment_level($parentLevel.'_'.$i, $id)){
		$i++;
	}
	return $parentLevel.'_'.$i;
}
try{
	date_default_timezone_set('UTC');
	//Connexion database
	$conn=new Mongo('localhost');

	// connexion à la bdd
	$bdd=$conn -> Forum;
	$collection = $bdd ->Discutions;
	
	$discution = $collection->findOne(array('_id' => new MongoId($_GET['id'])));
	
	
	$newAnswer=array(
		'id_sujet'=>$_GET['id'],
		'level'=>setLevel($_GET['level'], $_GET['id']),
		'author' => $_POST['signature'],
		'text'=>$_POST['text'],
		'date'=>date('j/m/Y - G:i:s'),
	);
	$collection ->insert($newAnswer);
	
	header("Location:../index.php?action=read&id=".$discution['_id']);
	$conn->close();
}
catch(MongoConnectionException $e){
	echo $e->getMessage();
}
catch (MongoException $e){
	echo $e->getMessage();

}
