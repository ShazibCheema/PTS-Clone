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
        $html .='<tr>
        <th>Subject</th>
        <th>Category</th>
        <th>Name</th>
        <th>Father Name</th>
        <th>Date of Birth</th>
        <th>CNIC</th>
        <th>Form Number</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Postal Address</th>
        <th>Project Name</th>
        <th>Description</th>
    </tr>';
        while ($row = mysqli_fetch_array($sqery)) {
            $html .= '<tr> <td>' . $row['Subject'] . '</td> <td>' . $row['Category'] . '</td> <td>' . $row['Name'] . '</td><td>' . $row['Fname'] . '</td><td>' . $row['DOB'] . '</td><td>' . $row['CNIC'] . '</td><td>' . $row['Formno'] .'</td><td>' . $row['Email'] . '</td><td>' . $row['Contact'] . '</td><td>' . $row['Address'] . '</td><td>' . $row['ProjectName'] . '</td><td>' . $row['Description'] . '</td>';
        }
    } else {
        echo "Error in query: " . mysqli_error($conn);
    }

}

mysqli_close($conn);
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PTS Contact Form</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Articles-Cards-images.css">
    <link rel="stylesheet" href="assets/css/Navbar-With-Button-icons.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./assets/css/custom_css.css">

    <link rel="shortcut icon" href="./assets/IMG/logo1.jpg" type="image/x-icon">
</head>

<body>
<nav class="navbar navbar-expand-md bg-primary py-3">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#"><span class="text-light">PTS Contact
                    Form</span></a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-2">
                <span class="visually-hidden">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navcol-2" class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active link-light" href="./ContactForm.php">PTS Contact Form</a></li>
                    <li class="nav-item"><a class="nav-link link-light" href="./Applicationstats.php">Track Contact Form</a></li>
                </ul>
                <a class="btn btn-light link-dark ms-md-2" role="button" href="./index.php">Go to pts</a>
            </div>
        </div>
    </nav>
    <div id="alertdiv" class="d-flex justify-content-end position-fixed" style="top: 50px; right: 20px;"></div>

    <section class="position-relative py-4 py-xl-5">
        <div class="container position-relative">
            <div class="row d-flex justify-content-center">
                <div class="col">
                    <div class="card mb-5">
                        <div class="card-body p-sm-5">
                            <form id="myForm" method="get">
                                <div class="mb-3"><input type="text" class="form-control" name="CNIC" id="CNIC" placeholder="CNIC (without dashes)" required></div>
                                <div class="mb-3"><input type="text" class="form-control" name="reference" id="reference" placeholder="Reference Number / Form Number / Roll Number" required></div>
                                <div><button id="submitbtn" class="btn btn-primary d-block w-100" type="button" onclick="validateForm()">Search</button></div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
    <hr>
    <div id="content" class="container">
        <table class="table mt-4">
            <?php 
                echo "$html";
            ?>
        </table>
    </div>

    <footer class="text-center">
        <div class="container text-muted py-4 py-lg-5">
            <ul class="list-unstyled d-flex flex-column align-items-start">
                <li class="list-inline-item me-4">Pakistan Testing Service</li>
                <li class="list-inline-item me-4">PTS Head Quarters, 3rd Floor, Adeel Plaza, Fazal-e-Haq Road, Blue
                    Area, Islamabad</li>
                <li class="list-inline-item"><a class="link-secondary text-primary" href="tel:+9251111111787">+92 51 111
                        111 787</a></li>
                <li><a class="link-secondary text-primary" href="#">www.pts.org.pk</a></li>
            </ul>
            <p class="mb-0">© Copyright 2021 - Pakistan Testing Service - PTS (Designed by PTS-IT Department) I Privacy
                Policy</p>
        </div>
    </footer>

    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script>
        function validateForm() {
            var cnic = document.getElementById('CNIC').value;
            var reference = document.getElementById('reference').value;

            var alertdiv = document.getElementById('alertdiv');
            alertdiv.innerHTML = ''; // Clear previous alert messages

            if (cnic === '') {
                showAlert('Fill CNIC.');
                return false;
            }


            if (reference === '') {
                showAlert('Fill Reference Number / Form Number / Roll Number.');
                return false;
            }

            fetchData();
        }

        function showAlert(message) {
            var alertdiv = document.getElementById('alertdiv');
            alertdiv.innerHTML +=
                `<div class="alert alert-danger alert-dismissible fade show bg-danger shadow-1 text-warning" role="alert">
                    ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>`;
        }

        function fetchData() {
            document.getElementById('myForm').submit();
        }

    </script>

</body>

</html>