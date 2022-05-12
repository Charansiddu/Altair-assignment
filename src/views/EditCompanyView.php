<html>
   <body>
      <h2>Edit Company</h2>
      <form method="POST" action="/company/<?php echo $id; ?>">
        <input name="_method" type="hidden" value="PATCH">
         <label>Name:</label><input type="text" value=<?php echo '"' . $name . '"'; ?> name="name" required>
         <label>E-mail:</label><input type="text" value=<?php echo '"' . $email . '"'; ?> name="email" required>
         <input type="submit" name="submit">
         <a href="/company">Back</a>
      </form>
   </body>
</html>