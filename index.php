<?php include 'config.php'; ?>
<?php include('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>All Records</title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>


<!-- the main nav is of.. now active the php nav.....

<header>
    <div class="logo"><a href="records.php">Logo</a></div>

    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="missing_person_form.php">Missing Report</a></li>
            <li><a href="found_person_form.php">Found Report</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    <button class="login-btn">Login / Register</button>
</header>


 end-->

    <main>
      
        <div class="hero-content">
            <div class="text-buttons">
                <h1 class="animated-title">Lost Person & Identity<br>Records Database<br>System</h1>
                <p class="tagline">Miles Rejoin - A Centralized Missing person</p>
                <p class="description">
                    Our comprehensive platform helps you quickly report a missing or <br>
                    found person, ensuring vital information reaches all organizations. <br>
                    Together, we are bring families back together.
                </p>
               <div class="action-buttons">
  <a href="missing_person_form.php" class="report-btn" target="_blank">Report a Missing Person</a>
  <a href="found_person_form.php" class="search-btn" target="_blank">Search Found Records</a>
</div>

            </div>

            <div class="illustration-container">
                <div class="illustration-placeholder">
                    <div class="icon-circle">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
        </div>
    </main>
	
	
 <h1 class="h1Records">All Records</h1>
  <div class="records-container1"  id="found-section">
   

    <h2 class="found_sections">🧍 Found Persons Data</h2>



  <div class="grid">
  <?php
    $result = $conn->query("SELECT * FROM found_persons ORDER BY created_at DESC");
    while($row = $result->fetch_assoc()){
      echo "<div class='card'>
        <span class='found-badge'>Found</span>
              <a href='view_found_person.php?id=".$row['id']."'>
                <img src='uploads/".$row['photo']."' alt='No Photo'>
                <h3>".$row['name']."</h3>
                <p><b>Age:</b> ".$row['estimated_age']." | <b>Gender:</b> ".$row['gender']."</p>
                <p><b>Location Found:</b> ".$row['location_found']."</p>
                <p>".$row['description']."</p>
              </a>
            </div>";
    }
  ?>
</div>
</div>



 <div class="records-container2" id="missin-section">

    <h2 class="missin_section">🕵 Missing Persons</h2>


  <div class="grid">
    
  <?php
    $result = $conn->query("SELECT * FROM missing_persons ORDER BY created_at DESC");
    while($row = $result->fetch_assoc()){
      echo "<div class='card'>
               <span class='missing-badge'>Missing</span>
              <a href='view_missing_person.php?id=".$row['id']."'>
                <img src='uploads/".$row['photo']."' alt='No Photo'> 
               
                <h3>".$row['name']."</h3>
                <p><b>Age:</b> ".$row['age']." | <b>Gender:</b> ".$row['gender']."</p>
                <p><b>Last Seen:</b> ".$row['last_seen_location']."</p>
                <p>".$row['description']."</p>
              </a>
            </div>";
    }
  ?>
</div>

</div>



  <section class="platform-help-section">
        <div class="header-contentw">
            <h2>How Our Platform Helps</h2>
            <p>Connecting communities, authorities, and families through advanced database technology and compassionate support services.</p>
        </div>

        <div class="benefits-container">
            
            <div class="benefit-card">
                <div class="icon-box heart">
                    <i class="fa-solid fa-heart"></i>
                </div>
                <h3>For Families</h3>
                <p>Search our comprehensive database to find information about missing loved ones. Access real-time updates and connect with support resources during difficult times.</p>
            </div>

            <div class="benefit-card">
                <div class="icon-box shield">
                    <i class="fa-solid fa-shield"></i>
                </div>
                <h3>For Authorities</h3>
                <p>Manage cases efficiently with our secure platform. Access cross-jurisdictional data, coordinate with other agencies, and maintain detailed investigation records.</p>
            </div>

            <div class="benefit-card">
                <div class="icon-box building">
                    <i class="fa-solid fa-building"></i>
                </div>
                <h3>For Community</h3>
                <p>Report found individuals and contribute to reunification efforts. Every community member plays a vital role in bringing families back together.</p>
            </div>

        </div>
    </section>

<!-- JS JS jS -->>
<script>
document.addEventListener("DOMContentLoaded", function() {
  const cards = document.querySelectorAll('.card');

  function showCards() {
    cards.forEach(card => {
      const rect = card.getBoundingClientRect();
      if (rect.top < window.innerHeight - 100) {
        card.classList.add('show');
      }
    });
  }

  window.addEventListener('scroll', showCards);
  showCards(); // Run once on load
});
</script>




<?php include('footer.php'); ?>

</body>
</html>
