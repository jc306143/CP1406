<?php
include("dbconnection.php")
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>PHP SQLite Database (Artists)</title>
<style type="text/css">
.subtleSet {
    border-radius:25px;
    width: 30em;
}
.deleteButton {
    color: red;
}
</style>    
</head>

<body>
<h1>Artists Database</h1>
<form id="insert" name="insert" method="post" action="dbprocessartists.php">
<fieldset class="subtleSet">
    <h2>Insert new artist:</h2>
    <p>
        <label for="artist">Artist: </label>
        <input type="text" name="artist" id="artist">
    </p>
    <p>
        <label for="phone">Phone: </label>
        <input type="text" name="phone" id="phone">
    </p>
    <p>
        <label for="website">Website: </label>
        <input type="text" name="website" id="website">    
    </p>
    <p>
        <label for="email">Email: </label>
        <input type="text" name="email" id="email">
    </p>
    <p>
        <input type="submit" name="submit" id="submit" value="Insert Entry">
    </p>
</fieldset>
</form>
    
<fieldset class="subtleSet">
<h2>Current Data:</h2>
<?php
$sql = "SELECT * FROM artists";
foreach ($dbh->query($sql) as $row)
{
?>
<form id="deleteForm" name="deleteForm" method="post" action="dbprocessartists.php">
<?php
	echo "<input type='text' name='artist' value='$row[artist]' /> <input type='text' name='phone' value='$row[phone]' /> <input type='text' name='website' value='$row[website]' /> <input type='text' name='email' value='$row[email]' />\n";
	echo "<input type='hidden' name='id' value='$row[id]' />";
?>
<input type="submit" name="submit" value="Update Entry" />
<input type="submit" name="submit" value="Delete Entry" class="deleteButton">
<input type="submit" name="submit" value="X" class="deleteButton">    
</form>
<?php
}
echo "</fieldset>\n";
$dbh = null;
?>
</body>    
</html>
