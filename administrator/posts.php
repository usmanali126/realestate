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
$num_rec_per_page=10;


if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $num_rec_per_page;
$result = $obj->post_pagination($start_from, $num_rec_per_page);


$rs_result = $obj->get_data();
$total_records = mysqli_num_rows($rs_result);  //count number of records
$total_pages = ceil($total_records / $num_rec_per_page);
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
                                        switch ($row['category']) {
                                            case 1: $category = 'Apartment';
                                                break;
                                            case 2: $category = 'House';
                                                break;
                                            case 3: $category = 'Commercial';
                                                break;
                                        }
                                        ?>
                                        <tr><td><?php echo $i ?></td><td><a href="index.php?edit=<?php echo $i ?>&token=TRUE"><?php echo $row['post_id'] ?></a></td><td class="name"><a href="index.php?edit=<?php echo $i ?>&token=TRUE" ><?php echo $row['name'] ?></a></td><td><?php echo $category ?></td><td><?php echo $row['city'] ?></td><td><img class="" src="../upload/<?php echo $row['fimage'] ?>"></td><td><a class="btn btn-danger" href="posts.php?delete_id=<?php echo $row['post_id']; ?>">DELETE</a></td></tr>
                                                <?php
                                                $_SESSION['post_id'][$i] = $row['post_id'];
                                                $i++;
                                            }
                                            ?>
                                </tbody>
                            </table>
                            <div id="pagination" class="text-center">
                                <ul class="pagination  pagination-md">
                            <?php
                            echo "<li><a href='posts.php?page=1'>" . 'First Page' . "</a></li> "; // Goto 1st page  

                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<li id='$i'><a href='posts.php?page=" . $i . "'>" . $i . "</a> </li>";
                            };
                            echo "<li><a href='posts.php?page=$total_pages'>" . 'Last Page' . "</a> </li>"; // Goto last page
                            ?>
                                </ul></div>
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
