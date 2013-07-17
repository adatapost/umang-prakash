<?php
$title = "Add new product";
include "header.php";
$cn = mysql_connect("localhost", "root") or die(mysql_error());
$db = mysql_select_db("prakashdb") or die(mysql_error());


?>
<div class="form">
	<h2>Product</h2>
	 <form method="post">
	 	<p><label>Category</label></p>
	 	<p>
	 		<select name="category">
	 			<option value="0">***Select***</option>
	 			<?php
				$query = "select * from category";
				
				if ($result = mysql_query($query)) {
					while ($row = mysql_fetch_array($result)) {
						echo "<option value='$row[0]'>$row[1]</option>";
					}
				}
	 			?>
	 		</select>
	 	</p>
	 	<p><label>Product Name</label></p>
	 	<p><input type="text" class="w300" name="productName"></p>
	 	
	 	<p><label>Product Price (Rs)</label></p>
	 	<p><input type="text" name="productPrice"></p>
	 	
	 	<p> </p>
	 	<p>
	 		<input type="submit" name="cmd" value="Submit"/>
	 	</p>
	 </form>
</div>
<?php
include "footer.php";
?>