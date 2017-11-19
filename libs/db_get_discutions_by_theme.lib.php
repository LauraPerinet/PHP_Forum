<?php
try{
	//Connexion database
	$conn=new Mongo('localhost');

	// connexion à la bdd
	$bdd=$conn -> Forum;
	$collection = $bdd ->Discutions;
	
	
	$discutions = [];
	
	$cursor=$collection->find();
	$num_doc=$cursor->count();
	
	if($num_doc>0){
		foreach($cursor as $discution){
			
			if($discution['theme']['_id']==$_GET['theme'] && $discution['level']==1){
				array_push($discutions, $discution);
			}
			
			
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
