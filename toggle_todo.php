<?php
include 'db.php';

$id = $_GET['id'];
$completed = $_GET['completed'] ? 0 : 1;
$sql = "UPDATE todos SET completed=$completed WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

