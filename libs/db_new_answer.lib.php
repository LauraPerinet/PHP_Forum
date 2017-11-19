<?php 
try{
	date_default_timezone_set('UTC');
	//Connexion database
	$conn=new Mongo('localhost');

	// connexion à la bdd
	$bdd=$conn -> Forum;
	$collection = $bdd ->Discutions;
	
	$discution = $collection->findOne(array('_id' => new MongoId($_GET['id'])));
	$answers = $discution['answers'];

	
	$insertCode=str_split($_GET['level']);
	
	for($i=1; $i<count($insertCode); $i++){
		$answers=$answers[$insertCode[$i]]['answers'];
		echo $i.' ';
	}	
	print_r($answers);
	$newAnswer=array(
		'author' => $_POST['signature'],
		'text'=>$_POST['text'],
		'date'=>date('j/m/Y - h:M:s'),
		'answers'=>array(),
		'level'=>$_GET['level']+1
	);
	array_push($answers, $newAnswer);
	
	print_r($answers);
	//$discution['answers']=$answers;
	echo '<br/>';
	print_r($discution['answers']);
	$collection ->save($discution);
	
	//header("Location:../index.php?action=read&id=".$discution['_id']);
	$conn->close();

}
catch(MongoConnectionException $e){
	echo $e->getMessage();
}
catch (MongoException $e){
	echo $e->getMessage();

}
