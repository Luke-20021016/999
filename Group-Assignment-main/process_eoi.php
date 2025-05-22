<?php
include("settings.php");

function sanitize_input($data) {
  return htmlspecialchars(stripslashes(trim($data)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $jobref = sanitize_input($_POST["jobref"]);
  $fname = sanitize_input($_POST["fname"]);
  $lname = sanitize_input($_POST["lname"]);
  $dob = sanitize_input($_POST["dob"]);
  $gender = $_POST["gender"] ?? "Not specified";
  $street = sanitize_input($_POST["street"]);
  $suburb = sanitize_input($_POST["suburb"]);
  $state = sanitize_input($_POST["state"]);
  $postcode = sanitize_input($_POST["postcode"]);
  $email = sanitize_input($_POST["email"]);
  $phone = sanitize_input($_POST["phone"]);
  $skill1 = isset($_POST["skill1"]) ? "HTML" : "";
  $skill2 = isset($_POST["skill2"]) ? "CSS" : "";
  $skill3 = isset($_POST["skill3"]) ? "JavaScript" : "";
  $otherskills = sanitize_input($_POST["otherskills"]);

  if ($jobref && $fname && $lname && $email && $phone) {
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
      echo "<p>Database connection failure.</p>";
    } else {
      $create_table = "CREATE TABLE IF NOT EXISTS eoi (
        EOInumber INT AUTO_INCREMENT PRIMARY KEY,
        jobref VARCHAR(10),
        fname VARCHAR(20),
        lname VARCHAR(20),
        dob VARCHAR(20),
        gender VARCHAR(10),
        street VARCHAR(40),
        suburb VARCHAR(40),
        state VARCHAR(10),
        postcode VARCHAR(4),
        email VARCHAR(40),
        phone VARCHAR(15),
        skill1 VARCHAR(20),
        skill2 VARCHAR(20),
        skill3 VARCHAR(20),
        otherskills TEXT,
        status VARCHAR(10) DEFAULT 'New'
      );";

      mysqli_query($conn, $create_table);

      $query = "INSERT INTO eoi
        (jobref, fname, lname, dob, gender, street, suburb, state, postcode, email, phone, skill1, skill2, skill3, otherskills)
        VALUES
        ('$jobref', '$fname', '$lname', '$dob', '$gender', '$street', '$suburb', '$state', '$postcode', '$email', '$phone', '$skill1', '$skill2', '$skill3', '$otherskills')";

      if (mysqli_query($conn, $query)) {
        $eoi_id = mysqli_insert_id($conn);
        echo "<h2>Thank you! Your EOI number is: $eoi_id</h2>";
      } else {
        echo "<p>Failed to submit your application. Try again later.</p>";
      }

      mysqli_close($conn);
    }
  } else {
    echo "<p>Required fields are missing. Please go back and complete the form.</p>";
  }

} else {
  header("Location: apply.php");
}
?>
