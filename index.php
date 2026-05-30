<?php
// test upadate
include("db.php");

if(isset($_POST['submit']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $query = "INSERT INTO students(name,email,course)
              VALUES('$name','$email','$course')";

    if(mysqli_query($conn,$query))
{
    echo "Data Inserted";
}
else
{
    echo "Error";
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student CRUD</title>
</head>
<body>

<h2>Add Student</h2>

<form method="POST">

    Name:
    <input type="text" name="name" required>
    <br><br>

    Email:
    <input type="email" name="email" required>
    <br><br>

    Course:
    <input type="text" name="course" required>
    <br><br>

    <button type="submit" name="submit">
        Save
    </button>

</form>

<hr>

<h2>Student Records</h2>

<table border="1" cellpadding="10">

<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Course</th>
    <th>Action</th>
</tr>

<?php

$result = mysqli_query($conn,"SELECT * FROM students");

while($row = mysqli_fetch_assoc($result))
{
?>

<tr>

    <td><?php echo $row['id']; ?></td>

    <td><?php echo $row['name']; ?></td>

    <td><?php echo $row['email']; ?></td>

    <td><?php echo $row['course']; ?></td>

    <td>

        <a href="edit.php?id=<?php echo $row['id']; ?>">
            Edit
        </a>

        <br><br>

        <a href="delete.php?id=<?php echo $row['id']; ?>">
            Delete
        </a>

    </td>

</tr>

<?php
}
?>

</table>

</body>
</html>