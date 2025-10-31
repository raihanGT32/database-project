<?php
include('config.php'); // DB connection
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Person Details</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f8fa;
      margin: 0;
      padding: 20px;
    }

    .container {
      max-width: 1280px;
      margin: 40px auto;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
      display: flex;
      flex-wrap: wrap;
      overflow: hidden;
    }

    .container img {
      width: 100%;
      max-width: 400px;
      height: auto;
      object-fit: cover;
      border-right: 1px solid #eee;
    }

    .details {
      flex: 1;
      padding: 30px;
    }

    .details h2 {
      margin-top: 0;
      font-size: 28px;
      margin-bottom: 10px;
      color: #111;
    }

    .details .status {
      display: inline-block;
      padding: 4px 10px;
      font-size: 12px;
      color: white;
      background-color: green;
      border-radius: 999px;
      margin-bottom: 10px;
    }

    .details p {
      font-size: 16px;
      color: #555;
      line-height: 1.6;
      margin: 8px 0;
    }

    .details p span {
      font-weight: bold;
      color: #111;
    }

    .details .back-btn {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background-color: #007bff;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      transition: background 0.3s ease;
    }

    .details .back-btn:hover {
      background-color: #0056b3;
    }

    @media(max-width: 768px){
      .container {
        flex-direction: column;
      }

      .container img {
        border-right: none;
        border-bottom: 1px solid #eee;
      }
    }
  </style>
</head>
<body>

<?php
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM found_persons WHERE id = $id");

    if ($row = $result->fetch_assoc()) {
        echo "<div class='container'>";
        echo "<img src='uploads/" . htmlspecialchars($row['photo']) . "' alt='Person Photo'>";
        echo "<div class='details'>";
        echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
        echo "<div class='status'>Found</div>";
        echo "<p><span>Estimated Age:</span> " . htmlspecialchars($row['estimated_age']) . "</p>";
        echo "<p><span>Gender:</span> " . htmlspecialchars($row['gender']) . "</p>";

        echo "<p><span>Found date:</span> " . htmlspecialchars($row['date_found']) . "</p>";

        echo "<p><span>Location Found:</span> " . htmlspecialchars($row['location_found']) . "</p>";
        echo "<p><span>Description:</span> " . htmlspecialchars($row['description']) . "</p>";
        echo "<a href='index.php#found-section' class='back-btn'>Back to All Records</a>";
        echo "</div></div>";
    } else {
        echo "<p>Person not found.</p>";
    }
} else {
    echo "<p>No person selected.</p>";
}
?>


</body>
</html>
