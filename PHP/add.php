<?php

$servername = "localhost";
$username = "root";
$password = '';
$conn = mysqli_connect($servername, $username, $password);

$query = "use ptsdatabase";

if (!$conn) {
    echo("Connection failed: ");
} else {
    echo("connection success");
    mysqli_query($conn, $query);
    $Subject = $_POST["subject"];
    $Category = $_POST["category"];
    $Name = $_POST["name"];
    $FatherName = $_POST["fname"];
    $DateofBirth = $_POST["date"];
    $CNIC = $_POST["CNIC"];
    $FormNumber = $_POST["reference"];
    $Email = $_POST["email"];
    $Contact = $_POST["Contact"];
    $PostalAddress = $_POST["address"];
    $ProjectName = $_POST["Projectname"];
    $Description = $_POST["message"];

    $insert_query = "INSERT INTO info (Formno,Category,Name,Fname,DOB,CNIC,Email,Contact,Address,ProjectName,Description,Subject) VALUES ('$FormNumber','$Category', '$Name', '$FatherName','$DateofBirth','$CNIC', '$Email', '$Contact','$PostalAddress','$ProjectName', '$Description', '$Subject')";
    if(mysqli_query($conn,$insert_query)){
        header("Location: FormSubmitted.html");
        exit(); 
    }else{
       
        
    }
    
}

?>
