<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script>
        function updateSubjects(){
            const faculty = document.getElementById('Faculty').value;
            const subjectbox = document.getElementById('subjects');

            let subjectsHTML = '';

            if(faculty === 'Science'){
                subjectsHTML = `
                <h3>Compulsory Subjects</h3>
                <ul>
                <li>English</li>
                <li>Physics</li>
                <li>Chemistry</li>
                <li>Mathematics</li>
                </ul>
                <label for="scienceElective">Choose an elective subject:</label>
                <select id="scienceElective" name="scienceElective" required>
                    <option value="Computer">Computer</option>
                    <option value="Bio">Biology</option>
                </select>
            `;
            } else if(faculty === 'Management'){
                subjectsHTML = ` 
                <h3>Compulsory Subjects</h3>
                <ul>
                <li>English</li>
                <li>Nepali</li>
                <li>Account</li>
                <li>Mathematics</li>
                </ul>
                <label for="managementElective">Choose an elective subject:</label>
                <select id="managementElective" name="managementElective" required>
                    <option value="Computer">Computer</option>
                    <option value="HM">Hotel Management</option>
                    <option value="Eco">Economics</option>
                    <option value="Business">Business Studies</option>
                </select>
                `;
            }

            subjectbox.innerHTML = subjectsHTML;
        }
    </script>
    <title>College Admission Form</title>
</head>
<body>
    <div class="container">
        <h1>College Admission Form</h1>
        <p>Enter your admission information below</p>
        
        <form method="POST">
            <div class="form-group inline-group">
                <label>Name</label> <br><br>
                <input type="text" name="First_Name" placeholder="First Name" required>
                </span>
                <input type="text" name="Middle_Name" placeholder="Middle Name">
                <input type="text" name="Last_Name" placeholder="Last Name" required>
            </div>
            <div class="form-container">
                <label>Address</label> <br><br>
                <input type="address" name="Address" required>
            </div>
            <div class="form-group inline-group">
                <label>Date of Birth</label><br><br>
                <input type="date" name="Birth_Date" required>
            </div>
            <div class="form-group inline-group">
                <label>Gender:</label><br><br>
                <input type="radio" name="Gender" value="Male"> Male
                <input type="radio" name="Gender" value="Female"> Female
                <input type="radio" name="Gender" value="Others"> Others
            </div>
            <div class="form-group inline-group">
                <label>Email</label><br><br>
                <input type="email" name="Email" required>
            </div>
            <div class="form-group inline-group">
                <label>Contact</label><br><br>
                <input type="tel" name="Contact" placeholder="Contact Number" pattern="\d{10}" required>
            </div>
            <div class="form-group inline-group">
                <label>Faculty</label><br><br>
                <select name="Faculty" id="Faculty" onchange="updateSubjects()" required>
                    <option value="">Select Faculty</option>
                    <option value="Science">Science</option>
                    <option value="Management">Management</option>
                </select>
            </div>
            <div id="subjects" class="form-group inline-group"></div>
            <div class="form-group">
                <input type="submit" name="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>

<!-- PHP CODE BELOW -->
<?php
include 'db.php';
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    $fname = $_POST['First_Name'];
    $mname = $_POST['Middle_Name'];
    $lname = $_POST['Last_Name'];
    $address = $_POST['Address'];
    $dob = $_POST['Birth_Date'];
    $gender = $_POST['Gender'];
    $email = $_POST['Email'];
    $contact = $_POST['Contact'];
    $faculty = $_POST['Faculty'];

    $sql = "INSERT INTO Student(First_Name, Middle_Name, Last_Name, Address, Birth_Date, Gender, Faculty, Email, Contact) 
    VALUES('$fname', '$mname', '$lname', '$address', '$dob', '$gender', '$faculty', '$email', '$contact')";

    if($conn->query($sql) === TRUE){
        echo "<p class='success'>Information added Successfully!</p>";
    } else {
        echo "<p class='error'>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}
?>

