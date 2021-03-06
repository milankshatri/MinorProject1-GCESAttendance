<?php 
include_once 'connection.php'; 
$flag=0;
$score=0;

if (isset($_POST['submit'])) { //checks if submit button is clicked

	if($_POST['attendance_status']){ //checks if any radio buttons are checked

		foreach($_POST['attendance_status'] as $id=>$attendance_status){ //loops through checked radio buttons


			if($_POST['attendance_status'][$id]=="absent"){ //If anu student is absent it is recorded in the database
				$student_name=$_POST['student_name'][$id];
				$roll_no=$_POST['roll_no'][$id];
				$date=date("Y-m-d H:i:s");
				$attendance_table= strtolower ($_POST['table_name'] ."_attendance_record");
				$sql="INSERT INTO $attendance_table (id ,student_name ,roll_number ,attendance_status , date) VALUES(0,'$student_name','$roll_no','$attendance_status', '$date')";
				$result=mysqli_query($conn,$sql);
		
				if($result){
				$flag=1;
				}
				else{
					$flag=-1;
					echo "Absent error";
				}
				}

			if($_POST['attendance_status'][$id]=="present"){ //If student is present score is added by one
				$score++;
				$flag=1;
				}
		}

		}
	else{
		$flag=2;
	}
}	
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="CSS/HomeStyle.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@600&display=swap" rel="stylesheet">
	
</head>
<body>
	<header>
		<div class="navigation">	
			<nav>
				<ul> 
				<li><a href="Home.php">Home</a> </li>
				<li><a href="view.php">View</a> </li>
				<li><a href="Statistics.php">Statistics</a> </li>        <!-- nav bar -->
				<li><a href="index.php">logout</a> </li>
				</ul>
			</nav>
		</div>

		<div class="container" >
			<h1>Attendance For<h1>
		</div>

		<form action="Home.php" method="POST">
			<div class="batchselector">
				<select id="batch_select" class="batch" name="batch_name1" onchange="populate('batch_select','batch_name')">
						<option disabled selected value="error">Choose Your Batch</option> 
					
					<?php 
						$sql_select_batch="SELECT * FROM `batch_list`;";
						$result_batch=mysqli_query($conn ,$sql_select_batch);
						while($row= mysqli_fetch_assoc($result_batch)){         
		   			?>
					<option required value="<?php echo $row['batchname']?>" name="option_value" >       <!-- Batch Select Option Menu-->
						<?php echo $row['batchname'] ;?>
					</option>
					<?php }?>
			</select>
			<input class="btn1" type="submit" name="batch_submit" value="Enter"  >
		</form>


		</div class="record_submit_message">
	<!--	<script type="text/javascript">
				var s3;
				function populate(s1,s2){
				var s1=document.getElementById(s1);
				var s2=document.getElementById(s2);
				s3=s1.value;
				s2.innerHTML=s3;
				}
			</script> -->
		</div>
		<br><br>
		<div class="pannel">
			<button class="btn"><a href="view.php" id="viewbtn">View</a></button>
			<div class="time">Day:<?php $dayofweek =date("l"); echo $dayofweek ?></div>
			<div class="time">Date:<?php $today_date = date("Y-m-d"); echo $today_date	?></div>
			<button class="btn" id="addbtn0"><a href="AddBatch.php" id="add_txt">Add Batch</a></button>
			<button class="btn" id="addbtn1"><a href="AddTeacher.php" id="add_txt">Add Teacher</a></button>   <!--Add Buttons -->
			<button class="btn" id="addbtn2"><a href="AddStudent.php" id="add_txt">Add Student</a></button> 

			<?php if($flag==1){ ?>
			<div class="attendance_success" style="color: green">Attendance is taken succesfully</div>
			<?php } ?>
			<?php if($flag==-1){ ?>
			<div class="attendance_success" style="color: red">All Students attendance were not taken</div><!--shows succes or fail -->
			<?php } ?>
			<div id="batch_name">
				
			
			 

			
			<div id="batch_name">
				<?php if (isset($_POST['batch_submit'])) { echo $_POST['batch_name1']; } ?>
			</div>

			<?php if (isset($_POST['batch_submit']) ){ ?>

			<form method="POST" action="Home.php" value="attendance">
				<table class="table1">
					<thead>
						<tr>
							<th>Roll no</th>
							<th>Name       </th>
							<th>Attendance </th>
						</tr>
					</thead>
					<tbody>
					<?php 

						$table_name = $_POST['batch_name1'];
						$sql="SELECT * FROM $table_name";
						$result=mysqli_query($conn ,$sql);
						$serial_number=0;
						$counter=0;
						while($row= mysqli_fetch_assoc($result)){
							$serial_number++;
						?>
 																								<!--Attendance Sheet-->
						<tr>
							<input type="hidden" name="table_name" value=<?php echo $table_name; ?>>
							<td><?php echo $serial_number; ?></td>
							<input type="hidden" name="roll_no[]" value=<?php echo $serial_number; ?>>
							<td><?php echo $row['student_name'] ; ?></td>
							<input type="hidden" value="<?php echo $row['student_name'] ; ?>" name="student_name[]">
							
							<td>
							<div class="status">
							<input  type="radio"  id="present+<?php echo $counter;?>" name="attendance_status[<?php echo $counter;?>]" value="present" >
							<label for="present+<?php echo $counter;?>" class="present_class" >Present</label>

							<input  type="radio" id="absent+<?php echo $counter;?>" name="attendance_status[<?php echo $counter;?>]" value="absent" required >
							<label for="absent+<?php echo $counter;?>" class="absent_class" >Absent</label> 
							</div>

							</td>
						</tr>
					<?php 
				$counter++;} ?>
					</tbody>
				</table>
				<input class="btn" type="submit" name="submit" value="SUBMIT">
			</form>
<?php } ?>

</div>
</header>
</body>
</html>