<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<style>
div{
    background-color: lightblue;
width: 240px;
border-color:yellow ;
border: 2px solid black;
}
body{
text-align: center;
background-color: black;
}
h1{
    background-color: yellowgreen;
    filter: blur(0.61px);
margin-top: -8px;
height: 100px;
}
form{
width: 90px;
border-color: black;
display: flex;
align-items: center;

}

</STYLE>
</head>
<body>

</body>
</html>
<h1>WELCOME TO SIMAX INTERNATIONAL STUDENTS PORTAL</h1>

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$email = $_POST['email'];

$sql = "SELECT userID, Name, email, gender, Age, password FROM sampling WHERE email=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();
//////////////////////<br>
/////////////////////////

if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {


echo '<div>'. '<form>' ."userID:". '<p>' .$row["userID"]. '</p>'.'</form>';
echo  '<form>' ."Email:  ". '<p>' .  $row["email"]. '</p>'.'</form>';
echo  '<form>' ."Name:  ". '<p>' .  $row["Name"]. '</p>'.'</form>';
echo  '<form>' ."Age:  ". '<p>' .  $row["Age"]. '</p>'.'</form>';
echo  '<form>' ."Password:  ". '<p>' .  $row["password"]. '</p>'.'</form>'.'</div>';




/*
"<p>Name </p> ". $row["Name"] . 
" <p> Email </p>" . $row["email"] .
" <p>Gender</p> " . $row["gender"] . 
"<p> Age </p> " .$row["Age"] .
" <p>Password</p> " . $row["password"].  ;
*/
}

} else {
echo "<br>"."NOT IN DATABASE";
}

$stmt->close();
}
$conn->close();
?>
<a href="fetch.html">back</a>

