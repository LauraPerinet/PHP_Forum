<?php
if(isset($_GET['action'])){
	switch($_GET['action']){
		case 'new_discution' :
			require('includes/new_discution.inc.php');
			break;
		case 'read' :
			require('includes/discution.inc.php');
			break;
		case 'list' :
			require('includes/list_discutions.inc.php');
			break;
		case 'search' :
			searchTheme();
			break;
		default :
			require('includes/welcome.inc.php');
	}
}else{
	require('includes/welcome.inc.php');
}

function searchTheme(){
	if(isset($_POST['theme'])){
		echo $_POST['theme'];
		header('Location:../index.php?action=list&theme='.$_POST['theme']);
	}
}