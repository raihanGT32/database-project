<?php include 'config.php'; ?>

<!-- header.php -->
<header style="
    background: #0b1e3f;
    color: #fff;
    padding: 15px 30px;
    
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
    font-family: 'Poppins', sans-serif;
    box-shadow: 0 3px 8px rgba(0,0,0,0.2);
">
    <!-- Logo / Title -->
    <div style="display: flex; align-items: center; gap: 10px;">
       <a href="index.php">  <img src="img/logo.png" alt="Logo" style="height: 45px; width: 45px; font-size:200px; "></a>
       
    </div>

    <!-- Navigation Menu -->
    <nav style="display: flex; gap: 1px; flex-wrap: wrap;">
        <a href="index.php">Home</a>
        <a href="missing_person_form.php">Report Missing</a>
        <a href="found_person_form.php">Report Found</a>
        <a href="about/index.html">About</a>
        <a href="#">Contact</a>
    </nav>
</header>

<!-- Inline Hover CSS -->
<style>
     header nav a {
        color: white;
        text-decoration: none;
        text-transform: uppercase;
        padding: 8px 15px;
        border-radius: 5px;
        transition: all .5s ease;
        font-weight: 500;
        font-size: 17px
        
    }

    header nav a:hover {
        color: #ffffffff; /* nice red tone */
        background-color: #0b1e3f;
        text-decoration: underline;
        box-shadow: 0 0 7px rgba(254, 254, 254, 0.94);
         text-decoration: none;
         
        
    }

    @media (max-width: 768px) {
        header {
            flex-direction: column;
            align-items: flex-start;
        }

        header nav {
            margin-top: 10px;
            flex-direction: column;
            gap: 10px;
        }
    }
</style>
