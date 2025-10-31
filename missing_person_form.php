<?php include 'config.php'; ?>
<?php include('header.php'); ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report a Missing Person</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="form-container">
    <h1 class="h1fpr">Report a Missing Person</h1>
    <p>Please provide details to help locate the missing person.</p>

    <form action="" method="POST" enctype="multipart/form-data">
      <label>Name</label>
      <input type="text" name="name" required>

      <div class="row">
        <div>
          <label>Age</label>
          <input type="number" name="age" required>
        </div>
        <div>
          <label>Gender</label>
          <select name="gender" required>
            <option value="">Select gender</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div>
          <label>Date Missing</label>
          <input type="date" name="date_missing" required>
        </div>
        <div>
          <label>Last Seen Location</label>
          <input type="text" name="last_seen_location" required>
        </div>
      </div>

      <label>Description</label>
      <textarea name="description" rows="5" placeholder="Appearance, clothing, and other details."></textarea>

      <label>Upload Photo</label>
      <input type="file" name="photo" required>

      <button type="submit" name="submit">Submit Report</button>
    </form>
  </div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $date = $_POST['date_missing'];
  $location = $_POST['last_seen_location'];
  $desc = $_POST['description'];

  $photo = $_FILES['photo']['name'];
  $target = "uploads/" . basename($photo);
  move_uploaded_file($_FILES['photo']['tmp_name'], $target);

  $sql = "INSERT INTO missing_persons (name, age, gender, date_missing, last_seen_location, description, photo)
          VALUES ('$name','$age','$gender','$date','$location','$desc','$photo')";
  if ($conn->query($sql)) {
    echo "<script>alert('Missing person report submitted successfully!');</script>";
  } else {
    echo "<script>alert('Error adding record');</script>";
  }
}
?>
