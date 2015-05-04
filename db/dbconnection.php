<?php
try {
    $dbh = new PDO("sqlite:artists.sqlite");
}
catch(PDOException $e)
{
    echo $e->getMessage();
}
?>