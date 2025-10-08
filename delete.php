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
            height: 330px;
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
        <h1 style="margin-bottom: 30px;">DELETE RECORD</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="sid">SID <br><input type="text" name="sid" id="sid"></label><br><br>
            <input type="submit" value="DELETE" id="submit" name="submit">
        </form>
    </div>
    <script>
        function deleted(){
            alert("Record Deleted Successfully");
        }
    </script>
    <?php
        if(isset($_POST['submit'])){
            $sid=$_POST['sid'];
            $conn=new mysqli('localhost','root','12345678','newcrud');
            $q="DELETE FROM students WHERE sid='$sid'";
            $conn->query($q);
            echo "<script>deleted()</script>";
        }
    ?>
</body>
</html>