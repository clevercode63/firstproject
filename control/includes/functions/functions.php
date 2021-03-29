<?php

    /*
	** Get All Function v2.0
	** Function To Get All Records From Any Database Table
	*/

	function getAllFrom($field, $table, $where = NULL, $and = NULL, $orderfield, $ordering = "DESC") {

		global $con;

		$getAll = $con->prepare("SELECT $field FROM $table $where $and ORDER BY $orderfield $ordering");

		$getAll->execute();

		$all = $getAll->fetchAll();

		return $all;

	}

	
	 /*
	 == Title Function v1.0 
	 == Title Function That Echo The Page Title In Case The Page
	 == Has The Variable $pageTitle And Echo Defult Title For Other Pages
	  */

	 function getTitle() {

		global $pageTitle;

		if (isset($pageTitle)) {

			echo $pageTitle;

		                        } else {

			echo 'Default';

		                                }
	                       }


	    /*
	    == Index Redirect Function v2.0
	    == This Function Accept Parameters
	    == $theMsg = Echo The  Message [ Error | Success | Warning ]
	    == $url = The Link You Want To Redirect To
	    == $seconds =Seconds Before Redircting

	    */


	    function redirectHome ($theMsg, $url = null, $seconds = 5){

	    	if ($url === null) {

	    		$url = 'index.php';
	    		$link = 'Homepage';
	    	                      } else {



	    	                      	if(isset($_SERVER['HTTP_REFERER']) && ['HTTP_REFERER'] !== '' ){
	    	                      			$url = $_SERVER['HTTP_REFERER'];
	    	                      			$link = 'Previous Page';
	    	                      		} else {

	    	                      			$url = 'index.php';
	    	                      			$link = 'Homepage';
	    	                      		}

	    	                      
	            }
	    	echo $theMsg;
	    	echo "<div class ='alert alert-info'>You Will Be Redirected to $link After $seconds Seconds</div>";

	    	header("refresh:$seconds;url=$url");
	    	exit();
	  
	    }

	    /*
	    == Check Item Function v1.0
	    == Function to Check Item In Database [ Function Accept Parameters]
	    == $select = The Item To Select [ Example: user,item,category]
	    == $from = The Table To Select From [  Example:users,items,categories]
	    == $value = The Value Of Select [ Eample: user1, tplink, modem]
	    */

	    function checkItem($select, $from, $value) {

	    	global $con;

	    	$statment = $con->prepare("SELECT $select FROM $from WHERE $select= ?");

	    	$statment ->execute(array($value));

	    	$count = $statment->rowCount();

	    	return $count;

	    }


	    /*
	== Count Number Of Items Function v1.0
	== Function To Count Number Of Items Rows
	== $item = The Item To Count
	== $table = The Table To Choose From
	*/

	function countItems($item, $table) {

		global $con;

		$stmt2 = $con->prepare("SELECT COUNT($item) FROM $table");

		$stmt2->execute();

		return $stmt2->fetchColumn();

	}
	/*
	== Get Latest Record Function v1.0
	== Function To Get Latest Items From Database [ Users, Item, Comments ]
	== $select = Field To Select
	== $table = The Table To Choose From
	== $order = The Desc Order
	== $limit = Number Of Records To Get
	*/

	function getLatest($select, $table, $order, $limit = 5){

		global $con;

		$satement= $con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT 5");
		$satement->execute();
		$rows = $satement->fetchAll();

		return $rows;
	}