<?php
session_start();
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
if(isset($_REQUEST[logout]))
{
    session_unset();
    session_destroy();
    echo "<script> location.href= 'index.php' </script>";
}
?>

<!-- <!DOCTYPE html>
<html>
<body>
<form method="post" action="">
    <button type="submit" name= "logout">Logout</button>
</form>
</body>
</html> -->

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Center Lab | Dashboard</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/d_dashboard.css">
</head>

<body>
    <div class="page">
        <header>
            <div class="university-details">
                <img class="logo" src="images/university_details.png" alt="" height="128">
            </div>

            <div class="user-details">
                <img src="images/user.png" alt="" width="40">
                <p><?php echo $user;?></p>
                <form method="post" action="">
                    <button class="logout-button" type="submit" name="logout"><img src="images/logout.png" s  alt="Logout" width="35"></button>
                </form>
            </div>
        </header>

        <div class="clearfix"></div>
        <main>
        <div class="sidebar">
                <!-- <form method="get" action="order_test.php">
                    <button type="submit" class = "button">Order Test</button><br><br>
                </form>
                <form method="get" action="status.php">
                    <button type="submit" class = "button">Check Status</button>
                </form> -->
            </div>
            <div class="content">
                <!-- <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptas omnis quasi commodi quam! Sapiente quis tempora quae provident accusamus numquam esse, debitis repudiandae libero id rem, blanditiis cum, facere architecto. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste provident harum eveniet alias libero, autem laboriosam earum modi eaque magni quia et tenetur odit natus molestias, temporibus in numquam ducimus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea itaque nulla quidem aliquam. Hic labore eum blanditiis dolorum sunt beatae dignissimos aperiam reprehenderit sit quae soluta aspernatur iure, eius facilis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis repudiandae voluptate ipsum, hic iste architecto aliquid. Eaque est qui, quisquam perferendis facilis doloribus voluptatem, error similique ipsa quia deserunt dolores!</p>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Dicta placeat est ad! Ullam, magni amet. Modi officiis accusantium temporibus quam veritatis voluptatem molestias, eius eos suscipit deserunt ipsum tempora totam! Lorem ipsum, dolor sit amet consectetur adipisicing elit. Repudiandae distinctio veniam officiis! Error perspiciatis laboriosam reiciendis impedit porro eaque pariatur sequi facere. Nihil veniam voluptas excepturi architecto. Optio, laudantium minus! Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio culpa fugit molestiae? Mollitia, accusantium quasi atque dolore illum sunt debitis dolorem odit tempora quos consequatur nihil ullam adipisci quae consequuntur?</p>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere numquam, eum, consectetur commodi natus amet ratione praesentium doloribus saepe dolorum illo maxime, distinctio pariatur labore culpa nobis aut incidunt recusandae! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure officia illum recusandae qui autem explicabo sed rem omnis doloremque itaque animi deleniti unde, nam ab architecto tenetur repudiandae quos totam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores commodi molestiae, unde rerum vero non vitae corrupti, repellendus, deleniti delectus harum iste numquam. Commodi maxime sit animi consectetur, est aute. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi dolorem, ipsam odio exercitationem consequuntur quisquam aperiam accusantium soluta dolorum modi necessitatibus corrupti blanditiis nisi accusamus porro reprehenderit ea veritatis nihil! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Facere architecto in illo aliquam alias repudiandae dolores maxime magni, illum voluptate aliquid ad eligendi. Debitis nobis distinctio minus quod, voluptates ipsum? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam voluptas, harum voluptates quos, reprehenderit mollitia dicta minus libero, odit rem maiores! Deleniti possimus magnam atque eum dignissimos eveniet impedit delectus. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque libero deserunt tenetur a amet porro tempora accusantium reiciendis asperiores praesentium, officiis nesciunt deleniti quas omnis soluta dolores minima voluptas corrupti. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Esse necessitatibus expedita est tempore obcaecati sunt, similique dolorum mollitia eveniet numquam accusantium magnam sed accusamus eligendi sapiente voluptatibus quidem hic reiciendis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta nam quo quod vel quae, excepturi nesciunt iure exercitationem earum, perferendis rerum laudantium itaque nostrum iste natus. Quo, in exercitationem! Fugit. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt, numquam soluta perspiciatis rerum excepturi illo. Tempore perferendis voluptatum architecto distinctio sequi, eveniet aliquid, nemo numquam qui veniam dolores iure laborum? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum repellat cumque quisquam, velit deserunt aperiam quae repellendus esse eaque nihil. Modi repellat consequuntur atque culpa molestiae tempore placeat nostrum natus? </p> -->
            </div>
        </main>
        <div class="clearfix"></div>
        <footer>
            <p><small>Copyright &copy; University of Hyderabad</small></p>
        </footer>
    </div>
    
</body>

</html>
