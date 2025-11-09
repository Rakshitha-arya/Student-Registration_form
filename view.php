<?php
include 'db.php';
$result = $conn->query("SELECT * FROM users ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Registered Students</title>
  <link rel="stylesheet" href="style.css">
  <style>
    table { width:100%; border-collapse:collapse; }
    th, td { padding:10px; border:1px solid #ccc; text-align:center; }
    th { background:#5563DE; color:white; }
    a.action-btn {
      text-decoration:none;
      padding:6px 10px;
      border-radius:5px;
      color:white;
    }
    .edit { background:#3B49B8; }
    .delete { background:#E74C3C; }
  </style>
</head>
<body>
  <div class="container" style="width:90%;max-width:1000px;">
    <h1>📋 Registered Students</h1>
    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>USN</th>
        <th>Branch</th>
        <th>Sem</th>
        <th>Gender</th>
        <th>Domain</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Actions</th>
      </tr>
      <?php
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<tr>
                  <td>{$row['id']}</td>
                  <td>{$row['name']}</td>
                  <td>{$row['usn']}</td>
                  <td>{$row['branch']}</td>
                  <td>{$row['sem']}</td>
                  <td>{$row['gender']}</td>
                  <td>{$row['domain']}</td>
                  <td>{$row['phone']}</td>
                  <td>{$row['address']}</td>
                  <td>
                    <a href='edit.php?id={$row['id']}' class='action-btn edit'>Edit</a>
                    <a href='delete.php?id={$row['id']}' class='action-btn delete' onclick=\"return confirm('Are you sure you want to delete this record?');\">Delete</a>
                  </td>
                </tr>";
        }
      } else {
        echo "<tr><td colspan='10' style='text-align:center;'>No records found</td></tr>";
      }
      ?>
    </table>
    <div style="text-align:center;margin-top:20px;">
      <a href="index.html" style="color:#4a57d1;font-weight:bold;">⬅️ Back to Registration</a>
    </div>
  </div>
</body>
</html>
