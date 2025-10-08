<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD RECORD</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .nav1{
            width: 99%;
            height: 60px;
            background-color: black;
        }
        .nav1 a{
            color: white;
            line-height: 60px;
            text-decoration: none;
            font-size: 30px;
            margin-left: 150px;
        }
        .form1{
            text-align: center;
            border: 2px solid black;
            margin-left: 650px;
            margin-top: 40px;
            height: 530px;
            width: 350px;
            padding: 20px;
            border-radius: 50px;
        }
        #photo{
            margin-left: 70px;
        }
        #submit{
            padding: 10px;
            width: 100px;
            border-radius: 25px;
        }
        input{
            width: 70%;
            line-height: 20px;
        }
        label{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="nav1">
        <nav>
            <a href="all.php">AllRec</a>
            <a href="index.php">ADD</a>
            <a href="update.php">UPDATE</a>
            <a href="find.php">FIND</a>
            <a href="delete.php">DELETE</a>
        </nav>
    </div>
    <div class="form1">
        <form action="" method="POST" enctype="multipart/form-data">
            <h2>UPDATE STUDENT RECORD</h2><br>
            <label for="sid">SID:</label><br>
            <input type="text" name="sid" id="sid" required><br><br>
            <label for="name">NAME:</label><br>
            <input type="text" name="name" id="name" required><br><br>
            <label for="course">COURSE:</label><br>
            <input type="text" name="course" id="course" required><br><br>
            <label for="session">SESSION:</label><br>
            <input type="text" name="session" id="session" required><br><br>
            <label for="grade">GRADE:</label><br>
            <input type="text" name="grade" id="grade" required><br><br>
            <label for="photo">PHOTO:</label><br>
            <input type="file" name="photo" id="photo" required><br><br>
            <input type="submit" value="UPDATE" name="submit" id="submit">
        </form>
    </div>
    <?php
        if(isset($_POST['submit'])){
            $sid = $_POST['sid'];
            $name = $_POST['name'];
            $course = $_POST['course'];
            $session = $_POST['session'];
            $grade = $_POST['grade'];
            $photo = $_FILES['photo']['name'];
            $tempname = $_FILES['photo']['tmp_name'];
            move_uploaded_file($tmpname,"images/$photo");
 
            $conn = mysqli_connect("localhost","root","12345678","newcrud");
            if(!$conn){
                die("Connection Failed: ".mysqli_connect_error());
            }
            $sql = "UPDATE students SET name='$name', course='$course', session='$session', grade='$grade', photo='$photo' WHERE sid='$sid'";
            if(mysqli_query($conn,$sql)){
                echo "<script>submitted()</script>";
            }else{
                echo "Error: ".mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    ?>
</body>
</html>