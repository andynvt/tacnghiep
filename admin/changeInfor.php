<?php
$conn = new mysqli("localhost", "root", "", "preschool");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
else{
    echo "alert('Connected successfully');";
}
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}

mysqli_close($conn);

?>
