<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FIND RECORD</title>
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
        <h1 style="margin-bottom: 30px;">FIND RECORD</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="sid">SID <br><input type="text" name="sid" id="sid"></label><br><br>
            <input type="submit" value="FIND" id="submit" name="submit">
        </form>
    </div>
    <?php
        if(isset($_POST['submit'])){
            $sid = $_POST['sid'];
            $conn = mysqli_connect("localhost","root","12345678","newcrud");
            if(!$conn){
                die("Connection Failed: ".mysqli_connect_error());
            }
            $sql = "SELECT * FROM students WHERE sid='$sid'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                echo "<div class='form1' style='margin-top:20px; height:auto; width:98%; margin-left:10px;'>
                <h1 style='margin-bottom:30px;'>RECORD FOUND</h1>
                <table border='1' style='width:100%; text-align:center;'>
                <tr>
                    <th>SID</th>
                    <th>NAME</th>
                    <th>COURSE</th>
                    <th>SESSION</th>
                    <th>GRADE</th>
                    <th>PHOTO</th>
                </tr>";
                while($row=mysqli_fetch_assoc($result)){
                    echo "<tr>
                        <td>".$row['sid']."</td>
                        <td>".$row['name']."</td>
                        <td>".$row['course']."</td>
                        <td>".$row['session']."</td>
                        <td>".$row['grade']."</td>
                        <td><img src='image/".$row['photo']."' width='100px' height='100px'></td>
                    </tr>";
                }
                echo "</table></div>";
            }else{
                echo "<script>alert('No Record Found');</script>";
            }
        }
    ?>
</body>
</html>