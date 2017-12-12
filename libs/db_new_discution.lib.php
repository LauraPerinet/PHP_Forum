<?php
if(isset($_POST['theme']) && isset($_POST['subject']) && isset($_POST['text'])){ 
try{
	date_default_timezone_set('UTC');
	//Connexion database
	$conn=new Mongo('localhost');

	// connexion à la bdd
	$bdd=$conn -> Forum;
	$collection = $bdd ->Discutions;
	
	$theme=get_theme_array($bdd);

	
	$discution=array(
		'author' => $_POST['signature'],
		'subject'=>$_POST['subject'],
		'theme'=>$theme,
		'text'=>$_POST['text'],
		'date'=>date('j/m/Y - G:i:s'),
		'level'=>"1"
	);
	$collection ->insert($discution);
	
	header("Location:../index.php?action=read&id=".$discution['_id']);
	$conn->close();

}
catch(MongoConnectionException $e){
	echo $e->getMessage();
}
catch (MongoException $e){
	echo $e->getMessage();

}
}else{
	header("Location:../index.php?action=new_subject&ok=no");
}

function get_theme_array($bdd){
	$theme_col = $bdd -> Themes;
	$theme = $theme_col->findOne(array('_id' => new MongoId($_POST['theme'])));
	
	return $theme;
}