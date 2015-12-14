<?php
include_once 'classes/realestate.php';

if (isset($_COOKIE['favorite'])) {
    $cookie = explode(',', $_COOKIE['favorite']);
    $fav = sizeof($cookie);
}

$obj = new realestate();
$data = $obj->get_data();
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

        <div class="cookie-message-wrapper" id="cookie-message" style="display: block;">
            <div class="container">
                <div class="row">
                    <div class="message-col col-xs-10 col-sm-9 col-md-10">
                        <p>We use cookies to ensure that we give you the best experience on our website. If you continue without changing your settings, we'll assume that you are happy to receive all cookies from this website. If you would like to change your preferences you may do so by <a href="#">following the instructions</a>.</p>
                    </div>
                    <div class="button-col col-xs-2 col-sm-3 col-md-2">
                        <span class="button-close-cookie" id="cookie-message-button"> <span class="hidden-xs button-close-cookie-text">Close</span><span class="icon icon-26"></span> </span>
                    </div>
                </div>
            </div>
        </div> 

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
                                                <li><a href="index.php">All</a></li>
                                                <li><a href="index.php?category=1">Apartment</a></li>
                                                <li><a href="index.php?category=2">House</a></li>
                                                <li><a href="index.php?category=3">Commercial</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown sorting-ico"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="#"><span class="glyphicon glyphicon-usd"></span> <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href=""><span class="glyphicon glyphicon-sort-by-attributes"></span><span> Cheapest first </span></a></li>
                                                <li><a href=""><span class="glyphicon glyphicon-sort-by-attributes-alt"></span><span> Most expensive first </span></a></li>
                                            </ul>
                                        </li>
                                        <li class="category" id="<?php echo (isset($_GET['category'])) ? $_GET['category'] : ''; ?>"><a><?php echo (isset($_GET['category'])) ? $category : 'All'; ?></a></li>

                                    </ul>
                                    <form class="navbar-form nav navbar-nav navbar-right " role="search" id="hsearch" action="record.php" method="POST">
                                        <div class="form-group">

                                            <div id="custom-search-input">
                                                <div class="input-group col-md-12">
                                                    <input class="  search-query form-control" placeholder="Search" type="text">
                                                    <span class="input-group-btn">
                                                        <button class="btn btn-danger" type="button">
                                                            <span class=" glyphicon glyphicon-search"></span>
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
                    $i = 1;
                    /*$no_of_row =0;
                    while ($row = mysqli_fetch_array($data)) {
                        if (isset($cookie) && in_array($row['post_id'], $cookie)) {
                            $result[]=$row;
                            $no_of_row ++;
                        }
                    }
//                    print_r($result);
                    //echo '<br>'.$no_of_row.'<br>';
                    
                    $j = 0;
					$i=4;
					
                      while ($j < $i) {
                      echo $j%3;
                      $result = $j % 3;
                      switch ($result) {
                      case 0: $category = 'col-sm-12';
					  $k=$i;
					  //if($j==9){
						  echo '<br>col-sm-12<br>';
						  $i=$k;
					  //}else{
						// echo '<br>col-sm-6<br>';
					  //}
                      
                      break;
                      case 1:
					  $k=$i;
                       if($j==(--$i)){
						  echo '<br>col-sm- 12<br>';
						  $i=$k;
					  }else{
						  echo'<br>col-sm-6<br>';
						  $i=$k;
					  }
                      break;
					  case 2:
					  $k=$i;
                       if($j==--$i){
						  echo '<br>col-sm-12<br>';
						  $i=$k;
					  }else{
						  echo'<br>col-sm-6<br>';
						  $i=$k;
					  }
                      break;
                     
                      }
                      $j++;
                      }
                    
                    
                    
                    exit();*/
                    
                    
                    
                    
                    
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