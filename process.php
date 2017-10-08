<?php
$database = "cs699db.event";

$mysqli = new mysqli ("1.db.cse.iitb.ac.in", "cs699user", "cs699user@123");

if($mysqli === false){
	die("Error: Could not connect." . mysqli_connect_error());
}

//echo "Connected Successfully. Host Info:" . mysqli_get_host_info($mysqli);

if(isset($_POST['insert'])){

	$start_time = $_POST['reminder_start_hour'].":".$_POST['reminder_start_minute'].":".$_POST['reminder_start_second'];
	$end_time = $_POST['reminder_end_hour'].":".$_POST['reminder_end_minute'].":".$_POST['reminder_end_second'];
	$event_date = $_POST['reminder_year']."-".$_POST['reminder_month']."-".$_POST['reminder_date'];
	$desc = $_POST['reminder_desc'];
	$today = date("Y-m-d H:i:s");
	$start_date = $event_date." ".$start_time;
	$end_date = $event_date." ".$end_time;
	if($start_date >= $end_date)
		echo "ERROR: Event starts after or while it ends.<br>";
	elseif($today > $start_date)
		echo "ERROR: Event starts in the past.";
	//elseif(empty($desc))
	//	echo "ERROR: No description for the event.";
	else{


		$sql_insert = "INSERT into $database (description,event_date,start_time,end_time) 
		VALUES ('".$desc."','".$event_date."','".$start_time."','".$end_time."')";

		if(mysqli_query($mysqli, $sql_insert)){
			$event_id = $mysqli->insert_id;
			echo "<br>Event Id of Inserted Event is: " . $event_id;

		} else{
			echo "ERROR: Could not able to execute $sql_insert. " . mysqli_error($mysqli);
		}
	}


}elseif(isset($_POST['delete'])) {
	$event_delete_id = $_POST['reminder_id'];


	$query = "SELECT event_id FROM $database WHERE event_id = '$event_delete_id'";
	$result = mysqli_query($mysqli, $query);

	if(mysqli_num_rows($result) > 0)
	{

		$sql_delete = "DELETE FROM $database WHERE event_id = '$event_delete_id'";
		if(mysqli_query($mysqli, $sql_delete)){

			echo "<br>Event Id of Deleted Event is: " . $event_delete_id;
		} else{
			echo "ERROR: Could not able to execute $sql_delete. " . mysqli_error($mysqli);
		}
	}else{
		echo "ERROR: Event Id doesn't exist.";

	}

}elseif(isset($_POST['update'])){
	$event_update_id = $_POST['update_id'];
	$query = "SELECT event_id FROM $database WHERE event_id = '$event_update_id'";
	$result = mysqli_query($mysqli, $query);
	if(mysqli_num_rows($result) > 0)
	{
		$start_time = $_POST['update_start_hour'].":".$_POST['update_start_minute'].":".$_POST['update_start_second'];
		$end_time = $_POST['update_end_hour'].":".$_POST['update_end_minute'].":".$_POST['update_end_second'];
		$event_date = $_POST['update_year']."-".$_POST['update_month']."-".$_POST['update_date'];
		$desc = $_POST['update_desc'];
		if($_POST['start'] != "on"){
			$query = "SELECT start_time FROM $database WHERE event_id = '$event_update_id'";
			$result = mysqli_query($mysqli, $query);
			$row = mysqli_fetch_array($result);
			$start_time = $row[0];
		}
		if($_POST['end'] != "on"){
			$query = "SELECT end_time FROM $database WHERE event_id = '$event_update_id'";
			$result = mysqli_query($mysqli, $query);
			$row = mysqli_fetch_array($result);
			$end_time = $row[0];
		}
		if($_POST['date'] != "on"){
			$query = "SELECT event_date FROM $database WHERE event_id = '$event_update_id'";
			$result = mysqli_query($mysqli, $query);
			$row = mysqli_fetch_array($result);
			$event_date = $row[0];
		}
		if($_POST['description'] != "on"){
			$query = "SELECT description FROM $database WHERE event_id = '$event_update_id'";
			$result = mysqli_query($mysqli, $query);
			$row = mysqli_fetch_array($result);
			$desc = $row[0];
		}

		$today = date("Y-m-d H:i:s");
		$start_date = $event_date." ".$start_time;
		$end_date = $event_date." ".$end_time;
		if($start_date >= $end_date){
			echo "ERROR: Event starts after or while it ends.<br>";
		}
		elseif($today > $start_date){
			echo "ERROR: Event starts in the past.";
		}
		//elseif(empty($desc)){
		//	echo "ERROR: No description for the event.";
		//}
		else{



			if($_POST['start'] == "on"){
				$sql_update = "UPDATE $database SET start_time = '$start_time' WHERE event_id = '$event_update_id'";
				if(mysqli_query($mysqli, $sql_update)){

					echo "<br>Start time updated of Event ID: " . $event_update_id;
				} else{
					echo "ERROR: Could not able to execute $sql_update. " . mysqli_error($mysqli);
				}

			}

			if($_POST['end'] == "on"){
				$sql_update = "UPDATE $database SET end_time = '$end_time' WHERE event_id = '$event_update_id'";
				if(mysqli_query($mysqli, $sql_update)){

					echo "<br>End time updated of Event ID: " . $event_update_id;
				} else{
					echo "ERROR: Could not able to execute $sql_update. " . mysqli_error($mysqli);
				}

			}

			if($_POST['description'] == "on"){
				$sql_update = "UPDATE $database SET  description = '$desc' WHERE event_id = '$event_update_id'";
				if(mysqli_query($mysqli, $sql_update)){

					echo "<br>Description updated of Event ID: " . $event_update_id;
				} else{
					echo "ERROR: Could not able to execute $sql_update. " . mysqli_error($mysqli);
				}

			}

			if($_POST['date'] == "on"){
				$sql_update = "UPDATE $database SET event_date = '$event_date' WHERE event_id = '$event_update_id'";
				if(mysqli_query($mysqli, $sql_update)){

					echo "<br>Event Date updated of Event ID: " . $event_update_id;
				} else{
					echo "ERROR: Could not able to execute $sql_update. " . mysqli_error($mysqli);
				}

			}
			if($_POST['date'] != "on" && $_POST['end'] != "on" && $_POST['description'] != "on" && $_POST['start'] != "on") {
				echo "No Field Selected.";
			}


		}
	}
	else{
		echo "ERROR: Event Id doesn't exist.";

	}




}elseif(isset($_POST['print'])){

	$query = "SELECT * FROM $database"; 
	$result = mysqli_query($mysqli, $query);

	echo "<table>";
	echo "<tr><td>" . "Event ID" . "</td><td>" . "Event Date" . "</td><td>"."Start Time"."</td><td>" . "End Time" . "</td><td>" . "Description" . "</td></tr>"; 

	while($row = mysqli_fetch_array($result)){  
		echo "<tr><td>" . $row['event_id']. "</td><td>" . $row['event_date'] . "</td><td>". $row['start_time']."</td><td>". $row['end_time']."</td><td>". $row['description'] ; 
	}

	echo "</table>"; 


}

elseif(isset($_POST['printbydate'])){

	$query = "SELECT * FROM $database"; 
	$result = mysqli_query($mysqli, $query);
	$event_date = $_POST['print_year']."-".$_POST['print_month']."-".$_POST['print_date'];

	echo "<table>";
	echo "<tr><td>" . "Event ID" . "</td><td>" . "Event Date" . "</td><td>"."Start Time"."</td><td>" . "End Time" . "</td><td>" . "Description" . "</td></tr>"; 

	while($row = mysqli_fetch_array($result)){  
		if($event_date == $row['event_date'])
			echo "<tr><td>" . $row['event_id']. "</td><td>" . $row['event_date'] . "</td><td>". $row['start_time']."</td><td>". $row['end_time']."</td><td>". $row['description'] ; 
	}

	echo "</table>"; 


}







?>