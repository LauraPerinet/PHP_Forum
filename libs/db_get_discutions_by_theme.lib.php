<?php
try{
	//Connexion database
	$conn=new Mongo('localhost');

	// connexion à la bdd
	$bdd=$conn -> Forum;
	$collection = $bdd ->Discutions;
	
	
	$discutions = [];
	if($_GET['theme']=="all"){
		$req=array('level' => "1");
	}else{
		$req=array('theme._id' => new MongoId($_GET['theme']));
	}
	$cursor=$collection->find($req);
	$num_doc=$cursor->count();
	
	if($num_doc>0){
		foreach($cursor as $discution){
			array_push($discutions, $discution);
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
