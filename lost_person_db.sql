CREATE DATABASE lost_person_db;

USE lost_person_db;

CREATE TABLE found_persons (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  estimated_age INT,
  gender VARCHAR(10),
  date_found DATE,
  location_found VARCHAR(255),
  description TEXT,
  photo VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE missing_persons (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  age INT,
  gender VARCHAR(10),
  date_missing DATE,
  last_seen_location VARCHAR(255),
  description TEXT,
  photo VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
