<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $usn = $_POST['usn'];
    $branch = $_POST['branch'];
    $sem = $_POST['sem'];
    $gender = $_POST['gender'];
    $domain = $_POST['domain'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    $sql = "INSERT INTO users (name, usn, branch, sem, gender, domain, phone, address)
            VALUES ('$name', '$usn', '$branch', '$sem', '$gender', '$domain', '$phone', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "
        <div style='background:#f9f9f9;padding:20px;border-radius:10px;'>
          <h2 style='color:#4a57d1;'>✅ Registration Successful</h2>
          <p><strong>Name:</strong> $name</p>
          <p><strong>USN:</strong> $usn</p>
          <p><strong>Branch:</strong> $branch</p>
          <p><strong>Semester:</strong> $sem</p>
          <p><strong>Gender:</strong> $gender</p>
          <p><strong>Domain:</strong> $domain</p>
          <p><strong>Phone:</strong> $phone</p>
          <p><strong>Address:</strong> $address</p>
          <hr>
          <p style='color:green;'>Data saved successfully.</p>
          <a href='view.php' style='color:#4a57d1;font-weight:bold;'>➡️ View All Students</a>
        </div>";
    } else {
        echo "<p style='color:red;'>❌ Error: " . $conn->error . "</p>";
    }

    $conn->close();
}
?>
