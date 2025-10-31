<?php include 'config.php'; ?>
<?php include('header.php'); ?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create a Found Person Record</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="form-container">
    <h1 class="h1fpr">Create a Found Person Record</h1>
    <p>If you have found someone who appears to be lost or cannot identify themselves, please create a record.</p>

    <form action="" method="POST" enctype="multipart/form-data">
      <label>Name (if known)</label>
      <input type="text" name="name" value="Unknown" required>

      <div class="row">
        <div>
          <label>Estimated Age</label>
          <input type="number" name="estimated_age" placeholder="Enter age" required>
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
          <label>Date Found</label>
          <input type="date" name="date_found">
        </div>
        <div>
          <label>Location Found</label>
          <input type="text" name="location_found" placeholder="Found location">
        </div>
		
		<div>
          <label>Mobile number</label>
          <input type="number" name="phn_number" placeholder="Enter mobile number">
        </div>
		
		
      </div>

      <label>Description & Circumstances</label>
      <textarea name="description" rows="5" placeholder="Include appearance, clothing, condition, and any other relevant details."></textarea>

      <label>Upload Photo</label>
      <input type="file" name="photo" required>

      <button type="submit" name="submit">Create Record</button>
    </form>
  </div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $age = $_POST['estimated_age'];
  $gender = $_POST['gender'];
  $date = $_POST['date_found'];
  $location = $_POST['location_found'];
  $desc = $_POST['description'];

  $photo = $_FILES['photo']['name'];
  $target = "uploads/" . basename($photo);
  move_uploaded_file($_FILES['photo']['tmp_name'], $target);

  $sql = "INSERT INTO found_persons (name, estimated_age, gender, date_found, location_found, description, photo)
          VALUES ('$name','$age','$gender','$date','$location','$desc','$photo')";
  if ($conn->query($sql)) {
    echo "<script>alert('Record added successfully!');</script>";
  } else {
    echo "<script>alert('Error adding record');</script>";
  }
}
?>
