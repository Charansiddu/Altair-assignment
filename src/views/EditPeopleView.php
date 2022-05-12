<html>
<body>
	<h2>Edit</h2>
    <form method="POST" action="/people/<?php echo $id; ?>">
        <input name="_method" type="hidden" value="PATCH">
		<label>Name:</label><input type="text" value=<?php echo '"'.$name.'"';?> name="name" required>
		<label>Phone:</label><input type="text" value=<?php echo '"'.$phone.'"'; ?> name="phone" required>
		<label>Company:</label>
			<Select name="company">
			<?php
			foreach($companies as $row)
			{
			    echo "<option value='".$row['id']."|".$row['name']. "'>" . $row['name'];
			}
			?>

			</Select>
		<input type="submit" name="submit">
		<a href="/people">Back</a>
	</form>
</body>
</html>
