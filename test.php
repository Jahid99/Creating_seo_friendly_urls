<?php
include 'inc/config.php';
include 'inc/Database.php';
	$db = new Database();
	$one = 4;
 	
	if(isset($_GET['programming']) &&isset($_GET['cat']) &&isset($_GET['subcat']))
	{
		//echo $_GET['programming'].' '.$_GET['cat'].' '.$_GET['subcat'].' 1st';



		 $cat_name = $_GET['subcat'];

		$stmt = $db->link->prepare("SELECT * FROM category where name=?");
		$stmt->bind_param("s",$cat_name);
 	    $stmt->execute();
 	    $stmt->bind_result($id,$prog_id,$name);
 	    $stmt->store_result();
 	    if($stmt->num_rows>0){
 	    while ($stmt->fetch()) {
        $c_id = $id;
		    }
		}else{
			echo "not found";
		}

		$stmt = $db->link->prepare("SELECT * FROM subcategory where cat_id=?");
		$stmt->bind_param("i",$c_id);
 	    $stmt->execute();
 	    $stmt->bind_result($id,$cat_id,$subcategory,$description);
 	    $stmt->store_result();
 	    if($stmt->num_rows>0){
 	    while ($stmt->fetch()) {
        echo $subcategory.'<br>';
        echo $description.'<br>';
		    }
		}else{
			echo "not found";
		}



	}

	

	else if(isset($_GET['cat']))
	{


		//echo $_GET['cat'].' 2nd <br>';
		$cat_name = $_GET['cat'];

		$stmt = $db->link->prepare("SELECT * FROM programming where name=?");
		$stmt->bind_param("s",$cat_name);
 	    $stmt->execute();
 	    $stmt->bind_result($id,$name);
 	    $stmt->store_result();
 	    if($stmt->num_rows>0){
 	    while ($stmt->fetch()) {
        $p_id = $id;
		    }
		}else{
			echo "not found";
		}

		$stmt = $db->link->prepare("SELECT * FROM category where prog_id=?");
		$stmt->bind_param("i",$p_id);
 	    $stmt->execute();
 	    $stmt->bind_result($id,$prog_id,$name);
 	    $stmt->store_result();
 	    if($stmt->num_rows>0){
 	    while ($stmt->fetch()) {
        echo "<a href='learn_framework_$name/'>$name</a><br>";
		    }
		}else{
			echo "not found";
		}




	




	}

	else if(isset($_GET['platforms']))
	{
		
			//echo $_GET['platforms'].' 3rd<br>';
// 		$stmt = $db->link->prepare("SELECT * FROM programming where id=?");
// 		$stmt->bind_param("i",$one);
//  	    $stmt->execute();
//  	    $stmt->bind_result($id,$name);
//  	    $stmt->store_result();
//  	    if($stmt->num_rows>0){
//  	    while ($stmt->fetch()) {
//         echo $name;
//     }
// }else{
// 	echo "not found";
// }

		$stmt = $db->link->prepare("SELECT * FROM programming");
 	    $stmt->execute();
 	    $stmt->bind_result($id,$name);
 	    $stmt->store_result();
 	    if($stmt->num_rows>0){
 	    while ($stmt->fetch()) {
        echo "<a href='platform_$name/'>$name</a><br>";
    	}
		}else{
			echo "not found";
		}


	}

 ?>