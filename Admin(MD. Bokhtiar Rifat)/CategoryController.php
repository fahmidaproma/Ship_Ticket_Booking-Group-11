<?php
	require_once 'addcategories.php';
	?>
	<?php
	//declare validation variables
	if(isset($_POST["add_category"])){
		//do validation
		insertCategory($_POST["name"]);
	}
	if(isset($_POST["edit_category"])){
		editCategory($_POST["id"],$_POST["name"]);
	}
	if(isset($_POST["yes"])){
		//do validation
		deleteCategory($_POST["id"]);
	}
	function editCategory($id,$name){
		$query = "update categories set name='$name' where id=$id";
		execute($query);
		header("Location: allcategories.php");
	}
	function insertCategory($name){
		$query = "insert into categories values(NULL,'$name')";
		execute($query);
		header("Location: allcategories.php");
	}
	function deleteCategory($id){
		$query = "delete from categories where id=$id";
		$result = get($query);
		header("Location: allcategories.php");
	}
	
	function getCategory($id){
		$query = "select * from categories where id=$id";
		$result = get($query);
		if(count($result) > 0){
			return $result[0];
		}
		return false;
	}
	function getAllCategories(){
		$query = "select * from categories";
		$result = get($query);
		return $result;
	}
?>