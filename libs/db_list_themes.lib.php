<?php
try{
	//Connexion database
	$conn=new Mongo('localhost');

	// connexion à la bdd
	$bdd=$conn -> Forum;
	$collection = $bdd ->Themes;

	$cursor = $collection ->find();
	$num_doc=$cursor->count();
	
	$themes=[];
	
	if($num_doc>0){
		foreach($cursor as $theme){
			array_push($themes, $theme);
		}
	}
	$conn->close();

}
catch(MongoConnectionException $e){
	echo $e->getMessage();
}
catch (MongoException $e){
	echo $e->getMessage();

}
