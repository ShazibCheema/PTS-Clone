
<?php
$servername = "localhost";
$username = "root";
$password = '';
$database = "ptsdatabase"; // Add your database name here
$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if "CNIC" and "reference" keys are set in $_GET array
$CNIC = isset($_GET["CNIC"]) ? mysqli_real_escape_string($conn, $_GET["CNIC"]) : '';
$FormNumber = isset($_GET["reference"]) ? mysqli_real_escape_string($conn, $_GET["reference"]) : '';
$html = "";

// Only proceed if both keys are set
if (!empty($CNIC) && !empty($FormNumber)) {
    $selectquery = "SELECT * FROM info WHERE Formno = '$FormNumber' AND CNIC = '$CNIC'";
    $sqery = mysqli_query($conn, $selectquery);

    if ($sqery) {
        $num = mysqli_num_rows($sqery);

        while ($row = mysqli_fetch_array($sqery)) {
            $FName = isset($row['FName']) ? $row['FName'] : '';
            $CINC = isset($row['CINC']) ? $row['CINC'] : '';

            $html .= '<tr> <td>' . $row['Formno'] . '</td> <td>' . $row['Subject'] . '</td> <td>' . $row['Category'] . '</td> <td>' . $row['Name'] . '</td><td>' . $FName . '</td><td>' . $row['DOB'] . '</td><td>' . $CINC . '</td><td>' . $row['Email'] . '</td><td>' . $row['Contact'] . '</td><td>' . $row['Address'] . '</td><td>' . $row['ProjectName'] . '</td><td>' . $row['Description'] . '</td><td>' . $row['Subject'] . '</td><td>';
        }
    } else {
        echo "Error in query: " . mysqli_error($conn);
    }
} else {
    echo "CNIC and reference are required.";
}

mysqli_close($conn);


?>
