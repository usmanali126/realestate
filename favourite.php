<?php
include_once 'classes/realestate.php';
    $obj=new realestate();
    $param['submit']='fresh';
    $get_data = $obj->contactus($param);
    while ($row = mysqli_fetch_array($get_data)) {
        $_DATA[$row['name']]=$row['value'];
    }

if (isset($_COOKIE['favorite'])) {
    $cookie = explode(',', $_COOKIE['favorite']);
    $fav = sizeof($cookie);
}

if (isset($_GET['search'])) {
    $search['search'] = $_GET['search'];
} elseif (isset($_GET['price'])) {
    if($_GET['price']==1){
       $search['price-down'] = 'price-down'; 
    }else{
       $search['price-up'] = 'price-up'; 
    }
    
} elseif (isset($_GET['category'])) {
    $search['category'] = $_GET['category'];
    
} else {
    $search['category'] = '';
}

//print_r($cookie);
//echo '<br>'.$fav;
$obj = new realestate();
$data = $obj->get_data($search);

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
        <title>Favourite | The Leading Properties of the Pakistan</title>
        <?php include 'inc/head.php'; ?>
    </head>
    <body>


        <header>
            <?php include 'inc/header.php'; ?>
        </header>
        <section class="section-main-content">
            <div class="container">
                <div id="page-title-container">
                    <h1>Favorite objects:<span class="fav"><?php echo isset($fav)?$fav:''; ?></span><a><sup class="glyphicon glyphicon-remove-circle fremove"></sup></a></h1>
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
                                                    <li><a href="favourite.php">All</a></li>
                                                    <li><a href="favourite.php?category=1">Apartment</a></li>
                                                    <li><a href="favourite.php?category=2">House</a></li>
                                                    <li><a href="favourite.php?category=3">Commercial</a></li>
                                                </ul>
                                            </li>
                                            <li class="dropdown sorting-ico"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#"><span class="glyphicon glyphicon-usd"></span> <span class="caret"></span></a>
                                                <ul class="dropdown-menu">
                                                    <li><a href='favourite.php?price=1'><span class="glyphicon glyphicon-sort-by-order"></span><span> Cheapest first </span></a></li>
                                                    <li><a href='favourite.php?price=9'><span class="glyphicon glyphicon-sort-by-order-alt"></span><span> Most expensive first </span></a></li>
                                                    <span id="price-order" class="hidden"><?php echo (isset($_GET['price'])) ? $_GET['price'] : ''; ?></span>
                                                </ul>
                                            </li>
                                            <li class="category" id="<?php echo (isset($_GET['category'])) ? $_GET['category'] : ''; ?>"><a><?php echo (isset($_GET['category'])) ? $category : 'All'; ?></a></li>

                                        </ul>
                                        <form class="navbar-form nav navbar-nav navbar-right " role="search" id="hsearch" action="favourite.php" method="GET">
                                            <div class="form-group">

                                                <div id="custom-search-input">
                                                    <div class="input-group col-md-12">
                                                        <input class="search-query form-control" placeholder="Search" name="search" type="text">
                                                        <span id="search" class="hidden"><?php echo (isset($_GET['search'])) ? $_GET['search'] : ''; ?></span>
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-danger" type="button">
                                                                <a href='favourite.php?search=1'><span class=" glyphicon glyphicon-search"></span></a>
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

                    $i = 1;
                    
                    //mysqli_data_seek($result,0);
                    while ($row = mysqli_fetch_array($data)) {
                        if (isset($cookie) && in_array($row['post_id'], $cookie)) {
                        switch ($row['category']) {
                            case 1: $category = 'Apartment';
                                break;
                            case 2: $category = 'House';
                                break;
                            case 3: $category = 'Commercial';
                                break;
                        }
                        
                      
                        switch ($i) {
                            case 1:
                                ?>
                                <div class="row">
                                    <article class="object-item post_box object-item-regular object-wide col-sm-12" id="<?php echo $row['post_id']; ?>">
                                        <div class="object-inner-wrapper">
                                            <div class="object-thumbnail">
                                                <a href="single.php?get_id=<?php echo $row['post_id']; ?>">
                                                    <img class="img-responsive" src="upload/<?php echo $row['fimage']; ?>">
                                                </a>
                                                <div class="add-favorite-button" data-obj_id="56198">
                                                    <span class="glyphicon glyphicon-bookmark <?php
                                                    if (isset($cookie)) {
                                                        echo in_array($row['post_id'], $cookie) ? "bmark" : "cookie";
                                                    } else {
                                                        echo "cookie";
                                                    }
                                                    ?>" data-post-id="<?php echo $row['post_id']; ?>"><span class="glyphicon glyphicon-star"></span></span>
                                                </div>
                                            </div>
                                            <div class="object-info-holder">
                                                <div class="info-address col-sm-12">
                                                    <a href=""><?php echo $row['city'] ?></a>
                                                    <a href="" class="category" id="<?php echo $row['category']; ?>"><?php echo $category; ?></a>
                                                    
                                                </div>
                                                <h2 class="info-title col-sm-12" itemprop="name">
                                                    <a href="" title="undefined" target="_blank"><?php echo $row['name']; ?></a>
                                                </h2>
                                                <p class="info-details col-sm-12">
                                                    <span itemprop="offers" >
                                                        <span itemprop="price" class="price-wrapper"><span itemprop="lowPrice"><?php echo $row['price']; ?></span>&nbsp;–&nbsp;
                                                            
                                                            <span itemprop="priceCurrency" content="EUR">RS.</span>
                                                        </span>
                                                    </span>, 
                                                    
                                                    <span><?php echo $row['rooms']; ?></span>&nbsp;rooms, 
                                                    
                                                    <span><?php echo $row['area']; ?></span>&nbsp;m
                                                    
                                                </p>
                                            </div>
                                            <div>

                                            </div>
                                        </div>
                                    </article> 
                                    <?php
                                    break;
                                case 2:
                                    ?>
                                    <article class="object-item post_box object-item-regular object-wide  <?php
                                    if ($no_of_row == 2) {
                                        echo "col-sm-12";
                                    } else {
                                        echo "col-sm-6";
                                    }
                                    ?>" id="<?php echo $row['post_id']; ?>">
                                        <div class="object-inner-wrapper">
                                            <div class="object-thumbnail">
                                                <a href="single.php?get_id=<?php echo $row['post_id']; ?>">
                                                    <img class="img-responsive" src="upload/<?php echo $row['fimage']; ?>">
                                                </a>
                                                <div class="add-favorite-button" data-obj_id="56198">
                                                    <span class="glyphicon glyphicon-bookmark <?php
                                                    if (isset($cookie)) {
                                                        echo in_array($row['post_id'], $cookie) ? "bmark" : "cookie";
                                                    } else {
                                                        echo "cookie";
                                                    }
                                                    ?>" data-post-id="<?php echo $row['post_id']; ?>"><span class="glyphicon glyphicon-star"></span></span>
                                                </div>
                                            </div>
                                            <div class="object-info-holder">
                                                <div class="info-address col-sm-12">
                                                    <a href=""><?php echo $row['city'] ?></a>
                                                    <a href=""><?php echo $category; ?></a>
                                                    
                                                </div>
                                                <h2 class="info-title col-sm-12" itemprop="name">
                                                    <a href="" title="undefined" target="_blank"><?php echo $row['name']; ?></a>
                                                </h2>
                                                <p class="info-details col-sm-12">
                                                    <span itemprop="offers" >
                                                        <span itemprop="price" class="price-wrapper"><span itemprop="lowPrice"><?php echo $row['price']; ?></span>&nbsp;–&nbsp;
                                                            
                                                            <span itemprop="priceCurrency" content="EUR">RS.</span>
                                                        </span>
                                                    </span>, 
                                                    
                                                    <span><?php echo $row['rooms']; ?></span>&nbsp;rooms, 
                                                    
                                                    <span><?php echo $row['area']; ?></span>&nbsp;m
                                                    
                                                </p>
                                            </div>
                                            <div>

                                            </div>
                                        </div>
                                    </article>
                                    <?php
                                    break;
                                case 3:
                                    ?>
                                    <article class="object-item post_box object-item-regular object-wide col-sm-6" id="<?php echo $row['post_id']; ?>">
                                        <div class="object-inner-wrapper">
                                            <div class="object-thumbnail">
                                                <a href="single.php?get_id=<?php echo $row['post_id']; ?>">
                                                    <img class="img-responsive" src="upload/<?php echo $row['fimage']; ?>">
                                                </a>
                                                <div class="add-favorite-button" data-obj_id="56198">
                                                    <span class="glyphicon glyphicon-bookmark <?php
                                                    if (isset($cookie)) {
                                                        echo in_array($row['post_id'], $cookie) ? "bmark" : "cookie";
                                                    } else {
                                                        echo "cookie";
                                                    }
                                                    ?>" data-post-id="<?php echo $row['post_id']; ?>"><span class="glyphicon glyphicon-star"></span></span>
                                                </div>
                                            </div>
                                            <div class="object-info-holder">
                                                <div class="info-address col-sm-12">
                                                    <a href=""><?php echo $row['city']; ?></a>
                                                    <a href=""><?php echo $category; ?></a>
                                                    
                                                </div>
                                                <h2 class="info-title col-sm-12" itemprop="name">
                                                    <a href="" title="undefined" target="_blank"><?php echo $row['name']; ?></a>
                                                </h2>
                                                <p class="info-details col-sm-12">
                                                    <span itemprop="offers" >
                                                        <span itemprop="price" class="price-wrapper"><span itemprop="lowPrice"><?php echo $row['price']; ?></span>&nbsp;–&nbsp;
                                                            
                                                            <span itemprop="priceCurrency" content="EUR">RS.</span>
                                                        </span>
                                                    </span>, 
                                                    
                                                    <span><?php echo $row['rooms']; ?></span>&nbsp;rooms, 
                                                    
                                                    <span><?php echo $row['area']; ?></span>&nbsp;m
                                                    
                                                </p>
                                            </div>
                                            <div>

                                            </div>
                                        </div>
                                    </article>
                                    <?php
                                    break;
                            }
                            if($i==3){
                               $i=1; 
                            }else{
                              $i++;  
                            }
                    }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <?php include 'inc/footer.php'; ?>
        </footer>
    </body>
</html>