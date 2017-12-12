<?php 

try{
	date_default_timezone_set('UTC');
	//Connexion database
	$conn=new Mongo('localhost');

	// connexion à la bdd
	$bdd=$conn -> Forum;
	$collection = $bdd ->Discutions;
	
	
	$newAnswer=array(
		'id_sujet'=>$_GET['answer'],
		'author' => $_POST['signature'],
		'text'=>$_POST['text'],
		'date'=>date('j/m/Y - G:i:s'),
	);
	$collection ->insert($newAnswer);
	
	header("Location:../index.php?action=read&id=".$_GET['id']);
	$conn->close();
}
catch(MongoConnectionException $e){
	echo $e->getMessage();
}
catch (MongoException $e){
	echo $e->getMessage();

}
