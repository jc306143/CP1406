<?php
include("dbconnection.php");
$debugOn = true;

if ($_REQUEST['submit'] == "X")
{
    $sql = "DELETE FROM artists WHERE id = '$_REQUEST[id]'";
    if ($dbh->exec($sql))
        header("Location: artists.php");
}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>PHP SQLite Database (Artists) - Results Page</title>
</head>

<body>
<h1>Results</h1>
<?php
echo "<h2>Form Data</h2>";
echo "<pre>";
print_r($_REQUEST);
echo "</pre>";
if ($_REQUEST['submit'] == "Insert Entry")
{
    $sql = "INSERT INTO artists.sqlite (artist, phone, website, email) VALUES ('$_REQUEST[artist]', '$_REQUEST[phone]', '$_REQUEST[website]', '$_REQUEST[email]')";
    echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql))
        echo "Inserted $_REQUEST[artist]";
    else
        echo "Not inserted";
}
else if ($_REQUEST['submit'] == "Delete Entry")
{
    $sql = "DELETE FROM artists.sqlite WHERE id = '$_REQUEST[id]'";
    echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql))
        echo "Deleted $_REQUEST[name]";
    else
        echo "Not deleted";
}
else if ($_REQUEST['submit'] == "Update Entry")
{
    $sql = "UPDATE artists.sqlite SET artist = '$_REQUEST[artist]', phone = '$_REQUEST[phone]', website = '$_REQUEST[website]', email = '$_REQUEST[email]' WHERE id = '$_REQUEST[id]'";
    echo "<p>Query: " . $sql . "</p>\n<p><strong>";
    if ($dbh->exec($sql))
        echo "Updated $_REQUEST[artist]";
    else
        echo "Not updated";
}
else {
    echo "This page did not come from a valid form submission.<br />\n";
}
echo "</strong></p>\n";

echo "<h2>Artists in Database Now</h2>\n";
$sql = "SELECT * FROM artists.sqlite";
$result = $dbh->query($sql);
$resultCopy = $result;

if ($debugOn) {
    echo "<pre>";
    $rows = $result->fetchall(PDO::FETCH_ASSOC);
    echo count($rows) . " records in table<br/>\n";
    print_r($rows);
    echo "</pre>";
    echo "<br />\n";
}
foreach ($dbh->query($sql) as $row)
{
    print $row[artist] . ' - ' . $row[phone] . ' - ' . $row[website] . ' - ' . $row[email] . "<br />\n";
}
$dbh = null;
?>
<p><a href="artists.php">Return to database test page</a></p>
</body>
</html>