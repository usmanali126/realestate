<?php
include_once 'classes/realestate.php';

$obj = new realestate();
$param['submit'] = 'fresh';
$get_data = $obj->contactus($param);
while ($row = mysqli_fetch_array($get_data)) {
    $_DATA[$row['name']] = $row['value'];
}

if (isset($_COOKIE['favorite'])) {
    $cookie = explode(',', $_COOKIE['favorite']);
    $fav = sizeof($cookie);
}

if (isset($_GET['category'])) {
    $category = $_GET['category'];
    switch ($category) {
        case 1: $category = 'Apartment';
            break;
        case 2: $category = 'House';
            break;
        case 3: $category = 'Commercial';
            break;

        default:
            $category = 'All';
            break;
    }
} else {
    $category = '';
}

if (isset($_GET['last_msg_id'])) {
    $last_msg_id = $_GET['last_msg_id'];
    $action = $_GET['action'];
} else {
    $action = '';
}
if ($action <> "get") {
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
            <?php include 'inc/head.php'; ?>
        </head>
        <body>
            <?php if (!isset($_COOKIE['front_msg']) ) {
                ?>
                <div class="cookie-message-wrapper" id="cookie-message" style="display: block;">
                    <div class="container">
                        <div class="row">
                            <div class="message-col col-xs-10 col-sm-9 col-md-10">
                                <p>We use cookies to ensure that we give you the best experience on our website. If you continue without changing your settings, we'll assume that you are happy to receive all cookies from this website. If you would like to change your preferences you may do so by <a href="privacy.php">following the instructions</a>.</p>
                            </div>
                            <div class="button-col col-xs-2 col-sm-3 col-md-2">
                                <span class="button-close-cookie" id="cookie-message-button"> <span class="hidden-xs button-close-cookie-text">Close</span><span class="icon icon-26"></span> </span>
                            </div>
                        </div>
                    </div>
                </div> 
            <?php } ?>
            <header>
                <?php include 'inc/header.php'; ?>
            </header>
            <section class="section-main-content">
                <div class="container">
                    <div id="page-title-container">
                        <h1>The Leading Properties of the Pakistan</h1>
                    </div>
                    <div class="search-panel-wrapper">
                        <div id="search_panel" class="search_panel form_hidden">
                            <nav class="navbar navbar-default" >
                                <div class="">
                                    <!-- Brand and toggle get grouped for better mobile display -->
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#search-navbar-collapse-1" aria-expanded="false">
                                            <span class="sr-only">Toggle navigation</span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>

                                    <!-- Collect the nav links, forms, and other content for toggling -->
                                    <div class="collapse navbar-collapse" id="search-navbar-collapse-1">
                                        <ul class="nav navbar-nav">
                                            <li class="dropdown sorting-ico"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#">Category<span class="glyphicon glyphicon-folder-open"></span> <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="index.php">All</a></li>
                                                    <li><a href="index.php?category=1">Apartment</a></li>
                                                    <li><a href="index.php?category=2">House</a></li>
                                                    <li><a href="index.php?category=3">Commercial</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown sorting-ico"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#"><span class="glyphicon glyphicon-usd"></span> <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href='index.php?price=1'><span class="glyphicon glyphicon-sort-by-order"></span><span> Cheapest first </span></a></li>
                                                    <li><a href='index.php?price=9'><span class="glyphicon glyphicon-sort-by-order-alt"></span><span> Most expensive first </span></a></li>
                                                    <span id="price-order" class="hidden"><?php echo (isset($_GET['price'])) ? $_GET['price'] : ''; ?></span>
                                                </ul>
                                            </li>
                                            <li class="category" id="<?php echo (isset($_GET['category'])) ? $_GET['category'] : ''; ?>"><a><?php echo (isset($_GET['category'])) ? $category : 'All'; ?></a></li>

                                        </ul>
                                        <form class="navbar-form nav navbar-nav navbar-right " role="search" id="hsearch" action="record.php" method="POST">
                                            <div class="form-group">

                                                <div id="custom-search-input">
                                                    <div class="input-group col-md-12">
                                                        <input class="search-query form-control" placeholder="Search" type="text">
                                                        <span id="search" class="hidden"><?php echo (isset($_GET['search'])) ? $_GET['search'] : ''; ?></span>
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-danger" type="button">
                                                                <a href='index.php?search=1'><span class=" glyphicon glyphicon-search"></span></a>
                                                            </button>
                                                        </span>
                                                    </div>

                                                </div>
                                            </div>

                                        </form>
                                    </div><!-- /.navbar-collapse -->
                                </div><!-- /.container-fluid -->
                            </nav>
                        </div>
                    </div>
                    <div class="content">
                        <?php
//                    if ($action <> "get") {
                        include('load_first.php');
//                        
                        ?>
                        <div id="last_msg_loader"></div>
                        <div id="scroll_up" class="to_top_visible hidden-xs"><span class="glyphicon glyphicon-arrow-up"></span></div>
                    </div>
                </div>
            </section>

            <footer>
                <?php include 'inc/footer.php'; ?>
            </footer>
        </body>
    </html>
    <?php
} else {
    include('load_second.php');
}
?>