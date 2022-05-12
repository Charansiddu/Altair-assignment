<link rel="stylesheet" type="text/css" href="style.css">

<table>
<tr>
<th>ID</th><th>Name</th><th>E-mail</th><th colspan="2">Action</th>
</tr>


<? 
foreach ($companies as $row) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . "<a href='mailto:" . $row['email'] . "'>" . $row['email'] . "</a>" . "</td>";
    echo "<td>" . "<a href='company/" . $row['id'] . "'>" . "Edit" . "</a>" . "</td>";
    echo "<td>" . "<form action='company/".$row['id']."' method='POST'>
                  <input type='submit' value='Delete' />
                  </form>" . "</td>";
    echo "</tr>";
}
?>

</table>
<br><br>
<table
<tr>
<th>Add new </th>
</tr>
<tr>
<form method="POST" action="/company">
  <td><label>Name:</label><input type="text" name="name" required></td>
</tr>
<tr>
<td><label>E-mail:</label><input type="text" name="email" required></td>
</tr>
<tr><td><input type="submit" name="add"></td></tr>
</form>    
</table>
<h3 style="text-align:center;color:red">Warning: deleting/editing a company will delete/edit all the people in that company</h3>
