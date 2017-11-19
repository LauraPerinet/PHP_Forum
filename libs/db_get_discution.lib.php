<?php
try{
	//Connexion database
	$conn=new Mongo('localhost');

	// connexion à la bdd
	$bdd=$conn -> Forum;
	$collection = $bdd ->Discutions;
	
	
	$discution = $collection->findOne(array('_id' => new MongoId($_GET['id'])));
	
	$conn->close();

}
catch(MongoConnectionException $e){
	echo $e->getMessage();
}
catch (MongoException $e){
	echo $e->getMessage();

}
