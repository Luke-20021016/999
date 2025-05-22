<?php include("header.inc"); ?>
<?php include("nav.inc"); ?>

<main>
  <section class="index-hero">
    <h1>Job Application Form</h1>
  </section>

  <form action="process_eoi.php" method="post" novalidate>
    <label for="ref">Job Reference Number:</label>
    <select id="ref" name="jobref" required>
      <option value="JOB001">JOB001 - Web Developer</option>
      <option value="JOB002">JOB002 - Data Analyst</option>
    </select>

    <label for="fname">First Name:</label>
    <input type="text" name="fname" maxlength="20" required>

    <label for="lname">Last Name:</label>
    <input type="text" name="lname" maxlength="20" required>

    <label for="dob">Date of Birth (dd/mm/yyyy):</label>
    <input type="text" name="dob" pattern="\d{2}/\d{2}/\d{4}" required>

    <fieldset>
      <legend>Gender:</legend>
      <label><input type="radio" name="gender" value="Male">Male</label>
      <label><input type="radio" name="gender" value="Female">Female</label>
      <label><input type="radio" name="gender" value="Other">Other</label>
    </fieldset>

    <label for="street">Street Address:</label>
    <input type="text" name="street" maxlength="40" required>

    <label for="suburb">Suburb/Town:</label>
    <input type="text" name="suburb" maxlength="40" required>

    <label for="state">State:</label>
    <select name="state" required>
      <option value="VIC">VIC</option>
      <option value="NSW">NSW</option>
      <option value="QLD">QLD</option>
      <option value="NT">NT</option>
      <option value="WA">WA</option>
      <option value="SA">SA</option>
      <option value="TAS">TAS</option>
      <option value="ACT">ACT</option>
    </select>

    <label for="postcode">Postcode:</label>
    <input type="text" name="postcode" required>

    <label for="email">Email:</label>
    <input type="email" name="email" required>

    <label for="phone">Phone Number:</label>
    <input type="tel" name="phone" required>

    <fieldset>
      <legend>Technical Skills:</legend>
      <label><input type="checkbox" name="skill1" value="HTML">HTML</label>
      <label><input type="checkbox" name="skill2" value="CSS">CSS</label>
      <label><input type="checkbox" name="skill3" value="JavaScript">JavaScript</label>
    </fieldset>

    <label for="otherskills">Other Skills:</label>
    <textarea name="otherskills" rows="4" cols="50"></textarea>

    <input type="submit" value="Submit Application">
  </form>
</main>

<?php include("footer.inc"); ?>
