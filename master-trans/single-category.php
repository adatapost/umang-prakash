<?php
 $cmd = "";
 $categoryName = "";
 $categoryId = 0;
 $message = "";
 
 if(isset($_POST["cmd"])){
 	$cmd = $_POST["cmd"];
 }
 
 $cn = mysql_connect("localhost","root") or die(mysql_error());
 $db = mysql_select_db("prakashdb") or die(mysql_error());
 if($cmd == "Search" || $cmd == "Select"){
 	$categoryId = 0 + $_POST["categoryId"];
	$query = "select * from category where categoryid=$categoryId";
	if($result = mysql_query($query)){
		if($row = mysql_fetch_array($result)){
			$categoryId = $row[0];
			$categoryName = $row[1];
		}
	} 
 }
 
 if($cmd == "Add"){
 	 $categoryName = $_POST["categoryName"];
	 $query = "insert into category (categoryName) values ('$categoryName')";
	 
	 $result = mysql_query($query);
	 if($result)
	   $message = "Record added";
	 else {
		 $message = "Cannot add category " . mysql_error();
	 }
 }
?>

<form method="post" action="single-category.php">
	<p>Search by Category ID</p>
	<p><input type="text" name="categoryId" value="<?=$categoryId?>" placeholder="Category ID"/>
		<input type="submit" name="cmd" value="Search"/>
	</p>
	<p>Enter category Name</p>
	<p><input placeholder="Enter category name" value="<?=$categoryName?>"  type="text" name="categoryName"/></p>
	<p><input type="submit" name="cmd" value="Add"/></p>
	<p><?=$message?></p>
</form>

<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		   $query = "select * from category";// where categoryid=$categoryId";
		   if($result = mysql_query($query))
		   {
		   	  while($row = mysql_fetch_array($result)){
		   	  	?>
		   	  	 <tr>
		   	  	 	<td><?=$row[0]?></td>
		   	  	 	<td><?=$row[1]?></td>
		   	  	 	<td>
		   	  	 		<form method="post">
		   	  	 			<input type="hidden" name="categoryId" value="<?=$row[0]?>"/>
		   	  	 			<input type="submit" name="cmd" value="Select"/>
		   	  	 		</form>
		   	  	 	</td>
		   	  	 </tr>
		   	  	<?php
		   	  }
		   }
		?>
	</tbody>
</table>

<select>
	<?php
		   $query = "select * from category";// where categoryid=$categoryId";
		   if($result = mysql_query($query))
		   {
		   	  while($row = mysql_fetch_array($result)){
		   	   echo "<option value='$row[0]'>$row[1]</option>";	 
		      }
		   }
		?>
</select>