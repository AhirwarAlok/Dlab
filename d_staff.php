<?php
session_start();
if (!isset($_SESSION["uid"]))
   {
    echo '<script>alert("Please login first!")</script>';
    header("location: index.php");
   }
$uid = $_SESSION['uid'];
$servername = "localhost";
    $username = "Alok";
    $password = "pass";
    $dbname = "test";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) 
    {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT Name FROM employee where EmployeeID = '$uid'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $user = $row[Name];
    $conn->close();
// echo "Welcome " . $user;
if(isset($_REQUEST[logout]))
{
    session_unset();
    session_destroy();
    echo "<script> location.href= 'index.php' </script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Center Lab | Dashboard</title>
    <!-- <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">  -->
    <link rel="stylesheet" href="css/d_dashboard.css">
</head>

<body>
    <div class="page">
        <header>
            <div class="university-details">
            <a href= "index.php"><img  class="logo" src="images/university_details.png" alt="" height="128"></a>
            </div>

            <div class="user-details">
                <img src="images/user.png" alt="" width="40">
                <p><?php echo $user?></p>
                <form method="post" action="">
                    <button class="logout-button" type="submit" name="logout"><img src="images/logout.png" s  alt="Logout" width="35"></button>
                </form>
            </div>
        </header>

        <div class="clearfix"></div>
        <main>
        <div class="clearfix"></div>
        <main> 
        <div class="sidebar">
                <form method="post" action="pending_status.php">
                    <button type="submit" class="button">Pending Order</button>
                </form>
                <!-- <form method="post" action="update_status.php">
                    <button type="submit" class="button">Update Status</button>
                </form>
                <form method="post" action="update_report.php">
                    <button type="submit" class="button">Update Report</button>
                </form> -->
                <form method="post" action="status.php">
                    <button type="submit" class="button">Patient Report</button>
                </form>
            </div>
            <div class="content">
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas omnis quasi commodi quam! Sapiente quis tempora quae provident accusamus numquam esse, debitis repudiandae libero id rem, blanditiis cum, facere architecto. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste provident harum eveniet alias libero, autem laboriosam earum modi eaque magni quia et tenetur odit natus molestias, temporibus in numquam ducimus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea itaque nulla quidem aliquam. Hic labore eum blanditiis dolorum sunt beatae dignissimos aperiam reprehenderit sit quae soluta aspernatur iure, eius facilis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis repudiandae voluptate ipsum, hic iste architecto aliquid. Eaque est qui, quisquam perferendis facilis doloribus voluptatem, error similique ipsa quia deserunt dolores!</p>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta placeat est ad! Ullam, magni amet. Modi officiis accusantium temporibus quam veritatis voluptatem molestias, eius eos suscipit deserunt ipsum tempora totam! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae distinctio veniam officiis! Error perspiciatis laboriosam reiciendis impedit porro eaque pariatur sequi facere. Nihil veniam voluptas excepturi architecto. Optio, laudantium minus! Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio culpa fugit molestiae? Mollitia, accusantium quasi atque dolore illum sunt debitis dolorem odit tempora quos consequatur nihil ullam adipisci quae consequuntur?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem deserunt expedita, aspernatur in corporis obcaecati labore veniam aliquam veritatis soluta mollitia, laboriosam porro perferendis saepe aperiam vel natus ipsum fuga! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deleniti veniam, consectetur eaque animi deserunt minima recusandae perferendis non adipisci enim velit accusamus quasi necessitatibus reiciendis est iure dolore esse labore. Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat nostrum voluptate omnis illo ipsa? Hic, praesentium veniam! Beatae, reprehenderit totam at numquam libero explicabo iste assumenda a similique quidem voluptatibus? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magni doloremque accusantium illum animi incidunt fugiat. Dolore repellendus culpa officiis reprehenderit omnis vitae at eius nam unde provident consequuntur, rerum perferendis! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Distinctio ducimus similique voluptatem dolorum corporis molestias sunt! Corporis cumque voluptatibus necessitatibus, molestiae quis eligendi ad, modi voluptate quo ut, distinctio sed! Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis aperiam unde, ipsam ex sint consectetur cupiditate officiis quod illo fugiat vero autem facere molestias illum obcaecati corporis dicta, est commodi.</p>
            </div>
        </main>
        <div class="clearfix"></div>
        <footer>
            <p><small>Copyright &copy; University of Hyderabad</small></p>
        </footer>
</body>
</html>
