<?php // update.php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM Student WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $fname = $_POST['First_Name'];
    $mname = $_POST['Middle_Name'];
    $lname = $_POST['Last_Name'];
    $address = $_POST['Address'];
    $dob = $_POST['Birth_Date'];
    $gender = $_POST['Gender'];
    $email = $_POST['email'];
    $contact = $_POST['Contact'];
    $faculty = $_POST['Faculty'];

    $sql = "UPDATE Student SET First_Name='$fname', Middle_Name = '$mname', Last_Name = '$lname', Address = '$address', Birth_Date = '$dob', Gender = '$gender', email='$email', Contact = '$contact', Faculty = '$faculty' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<p class='success'>Record updated successfully!</p>"; // Use the styled success message
        header("Location: disp.php");
        exit(); // Important: Exit after the redirect
    } else {
        echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>"; // Use the styled error message
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Student Information</title>
</head>

<body>
    <div class="container">
        <h1>Update Student Information</h1>
        <form method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
            <div class="form-group inline-group">
                <label>Name:</label><br><br>
                <input type="text" name="First_Name" placeholder="First Name" value="<?php echo $row['First_Name']; ?>" required>
                <input type="text" name="Middle_Name" placeholder="Middle Name" value="<?php echo $row['Middle_Name']; ?>">
                <input type="text" name="Last_Name" placeholder="Last Name" value="<?php echo $row['Last_Name']; ?>" required>
            </div>
            <div class="form-container">
                <label>Address:</label><br><br>
                <input type="text" name="Address" value="<?php echo $row['Address']; ?>" required>
            </div>
            <div class="form-group inline-group">
                <label>Date of Birth:</label><br><br>
                <input type="date" name="Birth_Date" value="<?php echo $row['Birth_Date']; ?>" required>
            </div>
            <div class="form-group inline-group">
                <label>Gender:</label><br><br>
                <input type="radio" name="Gender" value="Male" <?php echo ($row['Gender'] == 'Male') ? 'checked' : ''; ?>>Male
                <input type="radio" name="Gender" value="Female" <?php echo ($row['Gender'] == 'Female') ? 'checked' : ''; ?>>Female
                <input type="radio" name="Gender" value="Others" <?php echo ($row['Gender'] == 'Others') ? 'checked' : ''; ?>>Others
            </div>
            <div class="form-group inline-group">
                <label>Email:</label><br><br>
                <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
            </div>
            <div class="form-group inline-group">
                <label>Contact:</label><br><br>
                <input type="tel" name="Contact" pattern="\d{10}" value="<?php echo $row['Contact']; ?>" required>
            </div>
            <div class="form-group inline-group">
                <label>Faculty:</label><br><br>
                <select name="Faculty" id="Faculty">
                    <option value="Science" <?php echo ($row['Faculty'] == 'Science') ? 'selected' : ''; ?>>Science</option>
                    <option value="Management" <?php echo ($row['Faculty'] == 'Management') ? 'selected' : ''; ?>>Management</option>
                </select>
            </div>
            <div class="form-group">
                <button type="Submit">Update</button>
            </div>
        </form>
    </div>
</body>

</html>