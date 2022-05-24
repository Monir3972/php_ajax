<?php

	include '../db.php';

	$return_data = array();
	
	$req = isset($_POST['req']) ? $_POST['req'] : 0;
	$param = isset($_POST['param']) ? $_POST['param'] : 0;
	$data = isset($_POST['data']) ? $_POST['data'] : 0;

	
	//for defining tables
	switch($req)
	{
		case '1': // Request for emp list
			$table = 'users';
			break;


		default:
			$table = '';

	}


	//paramater 
	switch($param)
		{

			case '1': // 1-SELECT EmP list in table
				$sql = 'SELECT * FROM '.$table.' WHERE status = 1 ORDER BY id DESC';

				// $sql .= ($data!='0')? ' AND '.$data : '' ;

				// $return_data = ($data!='0')? $return_data = getHTML_empModal($sql,true) : $return_data = getHTML_empTable($sql,true);

				$return_data = getHTML_empTable($sql,true);
				break;
					case '2': // 1-SELECT specific emp list in modal
				$sql = 'SELECT * FROM '.$table.' WHERE  '.$data;
				$return_data = getHTML_empModal($sql,true);
				// $return_data = getHTML_editModal($sql,true);
				break;
				case '3': // 1-SELECT specific emp list in modal
				$sql = 'SELECT * FROM '.$table.' WHERE  '.$data;
				$return_data = getHTML_empEditModal($sql,true);
				// $return_data = getHTML_editModal($sql,true);
				break;

				// UPDATE `users` SET `status`='0' WHERE id = '$emp_id'";

				// case '4': // 1-SELECT specific emp list in modal
				// $sql = 'UPDATE  '.$table.' SET 'status' = '0' WHERE  '.$data;
				// $return_data = getHTML_empDelete($sql,true);
				// $return_data = getHTML_editModal($sql,true);
				break;

		}
	echo json_encode($return_data);




	//functions
	function getHTML_empTable($sql)
	{
		global $connection;
		try
		{
			$bHTML = '';
			$stmt = $connection->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			$stmt->execute();
			$c = 1;
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
			{
				$bHTML .= '
							<tr>
	                          	<th scope="row"> '.$c.' </th> 
	                            <td> '.$row['name'].' </td> 
	                            <td> '.$row['email'].' </td> 
	                            <td> '.$row['contact'].' </td> 

	                           
	                            <td>
	                             
	                                <button type="button" class="btn btn-default btn-sm" id="view_id" data-id='.$row["id"].'>View</button>
	                                <button type="button" class="btn btn-default btn-sm" id="edit_id" data-id='.$row["id"].'>Edit</button>
	                                <a href="" type="button" class="btn btn-default btn-sm delete_confirm" id="delete_id" data-id='.$row["id"].'>Delete</a>
	                             
	                              
	                            </td>
	                        </tr>  
                          ';
                          $c++;
			}
			
			
			
			$rHTML =  $bHTML;
		}
		catch (PDOException $e) 
		{
			$rHTML = $e->getMessage();
		}
		
		return $rHTML;
	}
	function getHTML_empModal($sql)
	{
		global $connection;
		try
		{
			$bHTML = '';
			$stmt = $connection->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			$stmt->execute();
			while ($row = $stmt->fetch(PDO::FETCH_ASSOC, PDO::FETCH_ORI_NEXT))
			{
				$bHTML .= '
							<div class="row">
	                            <div class="col-md-12"> '.$row['name'].' </div> 
	                            <div class="col-md-12"> '.$row['email'].' </div> 
	                            <div class="col-md-12"> '.$row['contact'].' </div> 
	                           
	                        </div>  
                          ';
			}
			
			
			$rHTML =  $bHTML;
		}
		catch (PDOException $e) 
		{
			$rHTML = $e->getMessage();
		}
		
		return $rHTML;
	}

	function getHTML_empEditModal($sql)
	{
		global $connection;
		try
		{
			$bHTML = '';
			$stmt = $connection->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			$stmt->execute();
			$row = $stmt->fetchall(PDO::FETCH_ASSOC);
			
			
			$rHTML =  $row;
		}
		catch (PDOException $e) 
		{
			$rHTML = $e->getMessage();
		}
		
		return $rHTML;
	}

		function getHTML_empDelete($sql)
	{
		global $connection;
		try
		{
			$bHTML = '';
			$stmt = $connection->prepare($sql, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
			$stmt->execute();
			$row = $stmt->fetchall(PDO::FETCH_ASSOC);
			
			
			$rHTML =  $row;
		}
		catch (PDOException $e) 
		{
			$rHTML = $e->getMessage();
		}
		
		return $rHTML;
	}




