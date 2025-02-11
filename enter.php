<!DOCTYPE html>
<head>

<title></title>
<style>
body{
background-color: aqua;
text-align: center;
font-size: larger;
animation: simon  1s   linear infinite;
}

</style>


</head>

<body>

<?php
$servername = "localhost";
$username = "SIMON";
$password = "SIMON";
$dbname = "sample";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST['Name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $Age = $_POST['Age'];
    $password = $_POST['password'];

    // Corrected SQL statement
    $sql = "INSERT INTO sampling (Name, email, userID, gender, Age, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Corrected bind_param types: "ssisis" to "ssssss" (assuming all are strings)
    $stmt->bind_param("ssssss", $Name, $email, $userID, $gender, $Age, $password);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

</body>
</html>