<?php
try{
	//Connexion database
	$conn=new Mongo('localhost');

	// connexion à la bdd
	$bdd=$conn -> Forum;
	$collection = $bdd ->Discutions;
	
	
	$cursor = $collection->find($req);
	$num_doc=$cursor->count();
	
	$conn->close();

}
catch(MongoConnectionException $e){
	echo $e->getMessage();
}
catch (MongoException $e){
	echo $e->getMessage();

}
