<?php
include_once '../classes/realestate.php';

if (!isset($_SESSION['login']) && $_SESSION['login'] != 'login') {
    header("Location:../index.php");
}

$obj = new realestate();

if (isset($_GET['delete_id'])) {
    $param = $_GET['delete_id'];
    $result = $obj->delete_post($param);
}

$result = $obj->get_data();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include 'head.php'; ?>
    </head>
    <body>
        <header>
            <?php include 'header.php'; ?>
        </header>
        <section class="section-main-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <div class="table-responsive"> 
                            <table class="table  table-hover">
                                <thead>
                                    <tr><th>Sr.</th><th>Post Id</th><th>Post Name</th><th>Category</th><th>City</th><th>Featured Image</th><th>Delete</th></tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_array($result)) {
                                        ?>
                                        <tr><td><?php echo $i ?></td><td><a href="index.php?edit=<?php echo $i ?>&token=TRUE"><?php echo $row['post_id'] ?></a></td><td class="name"><a href="index.php?edit=<?php echo $i ?>&token=TRUE" ><?php echo $row['name'] ?></a></td><td><?php echo $row['category'] ?></td><td><?php echo $row['city'] ?></td><td><img class="" src="../upload/<?php echo $row['fimage'] ?>"></td><td><a class="btn btn-danger" href="posts.php?delete_id=<?php echo $row['post_id']; ?>">DELETE</a></td></tr>
                                                <?php
                                                $_SESSION['post_id'][$i] = $row['post_id'];
                                                $i++;
                                            }
                                            ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <?php include 'footer.php'; ?>
        </footer>
    </body>
</html>
