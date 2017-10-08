<?php
//include('data.php'); // Our database connectivity file
if($_POST['step'] != '1')
{
	?>
	<html>
	<head><title>Reminders</title></head>
	<body>
		<h1> Insert </hi>
			<form name="event_insert" action="process.php" method="post">
				<table border='0' align='center'>
					<tr>
						<td>Event Date</td>
						<td>
							<select name="reminder_year">
								<?php
								$current_year = date("Y");
								for($counter=$current_year;$counter<=$current_year+5;$counter++)
								{
									echo("\n<option>$counter</option>");
								}
								?>
							</select>
							<select name="reminder_month">
								<?php
								for($counter=1;$counter<=12;$counter++)
								{
									if($counter < 10)
										$prefix = "0";
									else
										$prefix = "";
									echo("\n<option>$prefix$counter</option>");
								}
								?>
							</select>
							<select name="reminder_date">
								<?php
								for($counter=1;$counter<=31;$counter++)
								{
									if($counter < 10)
										$prefix = "0";
									else 
										$prefix = "";
									echo("\n<option>$prefix$counter</option>");
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>Start Time</td>
						<td>
							<select name="reminder_start_hour">
								<?php
								for($counter=0;$counter<=23;$counter++)
								{
									if($counter < 10)
										$prefix = "0";
									else
										$prefix = "";
									echo("\n<option>$prefix$counter</option>");
								}
								?>
							</select>
							<select name="reminder_start_minute">
								<?php
								for($counter=0;$counter<=59;$counter++)
								{
									if($counter < 10)
										$prefix = "0";
									else
										$prefix = "";
									echo("\n<option>$prefix$counter</option>");
								}
								?>
							</select>
							<select name="reminder_start_second">
								<?php
								for($counter=0;$counter<=59;$counter++)
								{
									if($counter < 10)
										$prefix = "0";
									else
										$prefix = "";
									echo("\n<option>$prefix$counter</option>");
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>End Time</td>
						<td>
							<select name="reminder_end_hour">
								<?php
								for($counter=0;$counter<=23;$counter++)
								{
									if($counter < 10)
										$prefix = "0";
									else
										$prefix = "";
									echo("\n<option>$prefix$counter</option>");
								}
								?>
							</select>
							<select name="reminder_end_minute">
								<?php
								for($counter=0;$counter<=59;$counter++)
								{
									if($counter < 10)
										$prefix = "0";
									else
										$prefix = "";
									echo("\n<option>$prefix$counter</option>");
								}
								?>
							</select>
							<select name="reminder_end_second">
								<?php
								for($counter=0;$counter<=59;$counter++)
								{
									if($counter < 10)
										$prefix = "0";
									else
										$prefix = "";
									echo("\n<option>$prefix$counter</option>");
								}
								?>
							</select>
						</td>
					</tr>

					<tr>
						<td>Description</td>
						<td>
							<textarea name="reminder_desc" rows="1" /></textarea>
						</td>
					</tr>

					<tr>
						<td> </td>
						<td>
							<input name="step" type="hidden" value="1" />
							<input name="insert" type="submit" value="Insert" />
						</td>
					</tr>
				</table>
			</form>


			<h1>Delete</h1>
			<form name="event_delete" action="process.php" method="post">
				<table border='0' align='center'>
					<tr>
						<td>Event ID:</td>
						<td>
							<input name="reminder_id" type="number" maxlength="11" min="0" />
						</td>
						<td>
							<input name="step" type="hidden" value="1" />
							<input name="delete" type="submit" value="Delete" />
						</td>
					</tr>
				</table>
			</form>

			<h1> Update </hi>
				<h4> Mark which field you want to update </h4>
				<form name="event_update" action="process.php" method="post">
					<table border='0' align='center'>
						<tr>
							<td>Event ID:</td>
							<td>
								<input name="update_id" type="number" maxlength="11" min="0" />
							</td>
						</tr>
						<tr>
							<td><input type="radio" name="date" value="on" unchecked>Event Date</td>
							<td>
								<select name="update_year">
									<?php
									$current_year = date("Y");
									for($counter=$current_year;$counter<=$current_year+5;$counter++)
									{
										echo("\n<option>$counter</option>");
									}
									?>
								</select>
								<select name="update_month">
									<?php
									for($counter=1;$counter<=12;$counter++)
									{
										if($counter < 10)
											$prefix = "0";
										else
											$prefix = "";
										echo("\n<option>$prefix$counter</option>");
									}
									?>
								</select>
								<select name="update_date">
									<?php
									for($counter=1;$counter<=31;$counter++)
									{
										if($counter < 10)
											$prefix = "0";
										else
											$prefix = "";
										echo("\n<option>$prefix$counter</option>");
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td><input type="radio" name="start" value="on" unchecked>Start Time</td>
							<td>
								<select name="update_start_hour">
									<?php
									for($counter=0;$counter<=23;$counter++)
									{
										if($counter < 10)
											$prefix = "0";
										else
											$prefix = "";
										echo("\n<option>$prefix$counter</option>");
									}
									?>
								</select>
								<select name="update_start_minute">
									<?php
									for($counter=0;$counter<=59;$counter++)
									{
										if($counter < 10)
											$prefix = "0";
										else
											$prefix = "";
										echo("\n<option>$prefix$counter</option>");
									}
									?>
								</select>
								<select name="update_start_second">
									<?php
									for($counter=0;$counter<=59;$counter++)
									{
										if($counter < 10)
											$prefix = "0";
										else
											$prefix = "";
										echo("\n<option>$prefix$counter</option>");
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td><input type="radio" name="end" value="on" unchecked>End Time</td>
							<td>
								<select name="update_end_hour">
									<?php
									for($counter=0;$counter<=23;$counter++)
									{
										if($counter < 10)
											$prefix = "0";
										else
											$prefix = "";
										echo("\n<option>$prefix$counter</option>");
									}
									?>
								</select>
								<select name="update_end_minute">
									<?php
									for($counter=0;$counter<=59;$counter++)
									{
										if($counter < 10)
											$prefix = "0";
										else
											$prefix = "";
										echo("\n<option>$prefix$counter</option>");
									}
									?>
								</select>
								<select name="update_end_second">
									<?php
									for($counter=0;$counter<=59;$counter++)
									{
										if($counter < 10)
											$prefix = "0";
										else
											$prefix = "";
										echo("\n<option>$prefix$counter</option>");
									}
									?>
								</select>
							</td>
						</tr>

						<tr>
							<td><input type="radio" name="description" value="on" unchecked>Description</td>
							<td>
								<textarea name="update_desc" rows="1" /></textarea>
							</td>
						</tr>

						<tr>
							<td> </td>
							<td>
								<input name="step" type="hidden" value="1" />
								<input name="update" type="submit" value="Update" />
							</td>
						</tr>
					</table>
				</form>
				<h1>Print Table</h1>
				<form name="event_print" action="process.php" method="post">
					<table border='0' align='center'>
						<tr>
							<td>Display all event:</td>
							<td>
								<input name="step" type="hidden" value="1" />
								<input name="print" type="submit" value="Print" />
							</td>
						</tr>
						<tr>
							<td>Display all event of date:</td>

							<td>
								<select name="print_year">
									<?php
									$current_year = date("Y");
									for($counter=$current_year;$counter<=$current_year+5;$counter++)
									{
										echo("\n<option>$counter</option>");
									}
									?>
								</select>
								<select name="print_month">
									<?php
									for($counter=1;$counter<=12;$counter++)
									{
										if($counter < 10)
											$prefix = "0";
										else
											$prefix = "";
										echo("\n<option>$prefix$counter</option>");
									}
									?>
								</select>
								<select name="print_date">
									<?php
									for($counter=1;$counter<=31;$counter++)
									{
										if($counter < 10)
											$prefix = "0";
										else
											$prefix = "";
										echo("\n<option>$prefix$counter</option>");
									}
									?>
								</select>
							</td>
							<td>
								<input name="step" type="hidden" value="1" />
								<input name="printbydate" type="submit" value="Print" />
							</td>
						</tr>
					</table>
				</form>
			</body>
			</html>
			<?php
		}