<?php
session_start();
require('../../../Model/db.php');
$conn=getConnection();
$c_id = $_GET['id'];
$sql="select * from register_student where course_id='{$c_id}'";
$result= mysqli_query($conn, $sql);
// if(isset($_SESSION['flag']))
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/University-Management/Resources/css/Admin/studentList.css">
    <title>Student List</title>
</head>

<body>
    <div class="container">
        <!-- top-nav started -->
        <div class="top-nav">
            <div class="left">
                <h3>LOGO</h3>
            </div>
            <div class="right">
                <ul>
                    <li><a href="/University-Management/Resources/view/Admin/Dashboard.php">Home</a> </li>
                    <li>Logout</li>
                </ul>
            </div>
        </div>
        <!-- top-nav ended -->
        <!-- main-content started -->
        <div class="main-content">

            <div class="right-main">
                <center>
                    <table>
                        <tr>
                            <th width="200px">ID</th>
                            <th width="200px">Name</th>
                            <th width="200px">Status</th>
                            <th width="200px">Title</th>
                            <th width="200px">Marks</th>
                            <th width="200px">Action</th>

                        </tr>
                        <?php while($row=mysqli_fetch_array($result)){?>
                        <?php
                        $sql2="select * from user where id='{$row['stu_id']}'";
                        $result2= mysqli_query($conn, $sql2);
                     ?>
                        <tr>
                        <?php while($r=mysqli_fetch_array($result2)){?>
                            <td><?php echo $r['id'];?></td>
                            <td><?php echo $r['name'];?></td>
                            <?php } ?>
                            <td><?php echo $row['status'];?></td>
                            <td><input type="text" id="title" placeholder="Title"></td>
                            <td><input type="number" id="marks" placeholder="Marks"></td>
                            <td><button id="add-marks">ADD MARKS</button></td>


                        </tr>
                        <?php } ?>

                    </table>
                </center>
            </div>
        </div>
        <!-- main-content ended -->
    </div>
</body>

</html>
<?php
}
{
 // header('location:login.php');
}

?>