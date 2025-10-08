<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALL RECORD</title>
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
            margin-left:20px;
            margin-top: 40px;
            height: auto;
            width: 98%;
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
        table{
            width: 99%;
            text-align:center;
            padding:5px;
            
        }
        table th button{
            border-radius:30px;
            padding:5px;
            width: 80px;
            height:30px;
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
        <h1 style="margin-bottom: 30px;">ALL RECORD</h1>
        <table name="form1" border="2px">
            <tr>
                <th>SID</th>
                <th>NAME</th>
                <th>COURSE</th>
                <th>SESSION</th>
                <th>GRADE</th>
                <th>PHOTO</th>
                <th></th>
                <th></th>
            </tr>
            <?php
                $conn = mysqli_connect("localhost","root","12345678","newcrud");
                if(!$conn){
                    die("Connection Failed: ".mysqli_connect_error());
                }
                $sql = "SELECT * FROM students";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<tr>
                                <td>".$row['sid']."</td>
                                <td>".$row['name']."</td>
                                <td>".$row['course']."</td>
                                <td>".$row['session']."</td>
                                <td>".$row['grade']."</td>
                                <td><img src='image/".$row['photo']."' height='100px' width='100px'></td>
                                <td><a href='update.php?sid=".$row['sid']."&form1=all'><button>UPDATE</button></a></td>
                                <td><a href='all.php?sid=".$row['sid']."&form1=all'><button>DELETE</button></a></td>
                              </tr>";
                    }
                }else{
                    echo "<tr><td colspan='8'>No Records Found</td></tr>";
                }
            ?>
        </table>
        <h3><a href="index.php">Add New Record</a></h3>
    </div>
    <script>
        function deleted(){
            alert("Record Deleted Successfully");
        }
        function updated(){
            alert("Record Updated Successfully");
        }
    </script>
    <?php
        
        mysqli_close($conn);
        $delete_sid = isset($_GET['sid']) ? $_GET['sid'] : '';
        if($delete_sid){
            $conn = mysqli_connect("localhost","root","12345678","newcrud");
            if(!$conn){
                die("Connection Failed: ".mysqli_connect_error());
            }
            $sql = "DELETE FROM students WHERE sid='$delete_sid'";
            if(mysqli_query($conn,$sql)){
                echo "<script>deleted()</script>";
            }else{
                echo "Error: ".mysqli_error($conn);
            }
            mysqli_close($conn);
        }
        $update_sid = isset($_GET['sid']) ? $_GET['sid'] : '';
        if($update_sid && isset($_GET['form1']) && $_GET['form1']=='all'){
            header("Location: update.php?sid=$update_sid&form1=all");
        }
        

    ?>
</body>
</html>