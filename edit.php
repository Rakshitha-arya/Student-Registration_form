<?php
include 'db.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $result = $conn->query("SELECT * FROM users WHERE id=$id");
  $row = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = $_POST['id'];
  $name = $_POST['name'];
  $usn = $_POST['usn'];
  $branch = $_POST['branch'];
  $sem = $_POST['sem'];
  $gender = $_POST['gender'];
  $domain = $_POST['domain'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];

  $sql = "UPDATE users SET 
          name='$name', usn='$usn', branch='$branch', sem='$sem',
          gender='$gender', domain='$domain', phone='$phone', address='$address'
          WHERE id=$id";

  if ($conn->query($sql) === TRUE) {
    header("Location: view.php");
    exit();
  } else {
    echo "Error updating record: " . $conn->error;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Student</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Edit Student Details</h1>
    <form method="POST" action="">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

      <div class="form-group">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
      </div>

      <div class="form-group">
        <label>USN:</label>
        <input type="text" name="usn" value="<?php echo $row['usn']; ?>" required>
      </div>

      <div class="form-group">
        <label>Branch:</label>
        <input type="text" name="branch" value="<?php echo $row['branch']; ?>" required>
      </div>

      <div class="form-group">
        <label>Semester:</label>
        <input type="text" name="sem" value="<?php echo $row['sem']; ?>" required>
      </div>

      <div class="form-group">
        <label>Gender:</label>
        <select name="gender">
          <option <?php if($row['gender']=='Male') echo 'selected'; ?>>Male</option>
          <option <?php if($row['gender']=='Female') echo 'selected'; ?>>Female</option>
          <option <?php if($row['gender']=='Other') echo 'selected'; ?>>Other</option>
        </select>
      </div>

      <div class="form-group">
        <label>Domain:</label>
        <input type="text" name="domain" value="<?php echo $row['domain']; ?>" required>
      </div>

      <div class="form-group">
        <label>Phone:</label>
        <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required>
      </div>

      <div class="form-group">
        <label>Address:</label>
        <textarea name="address" required><?php echo $row['address']; ?></textarea>
      </div>

      <button type="submit">Update</button>
    </form>

    <div class="view-link">
      <a href="view.php">⬅️ Back to View Page</a>
    </div>
  </div>
</body>
</html>
