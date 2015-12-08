<?php
$last_msg_id = $_GET['last_msg_id'];
//exit();
$obj = new realestate();
$second_load = $obj->second_load($last_msg_id);
$last_msg_id = "";
$total_rows = mysqli_num_rows($second_load);
$j = 1;
while ($row = mysqli_fetch_array($second_load)) {
    switch ($j) {
        case 1:
            ?>
            <article class="object-item post_box object-item-regular object-wide col-sm-12" id="<?php echo $row['post_id']; ?>">
                <div class="object-inner-wrapper">
                    <div class="object-thumbnail">
                        <a href="single.php">
                            <img class="img-responsive" src="upload/<?php echo $row['fimage']; ?>">
                        </a>
                        <div class="add-favorite-button" data-obj_id="56198">
                            <span class="glyphicon glyphicon-bookmark"><span class="glyphicon glyphicon-star"></span></span>
                        </div>
                    </div>
                    <div class="object-info-holder">
                        <div class="info-address col-sm-12">
                            <a href=""><?php echo $row['city'] ?></a>
                            <a href="">Burgas Province</a>
                            <a href="">Kosharitsa</a>
                        </div>
                        <h2 class="info-title col-sm-12" itemprop="name">
                            <a href="" title="undefined" target="_blank"><?php echo $row['name']; ?></a>
                        </h2>
                        <p class="info-details col-sm-12">
                            <span itemprop="offers" itemscope="" itemtype="http://schema.org/AggregateOffer">
                                <span itemprop="price" class="price-wrapper"><span itemprop="lowPrice"><?php echo $row['price']; ?></span>&nbsp;–&nbsp;
                                    <span itemprop="highPrice">79 000</span>&nbsp;
                                    <span itemprop="priceCurrency" content="EUR">RS.</span>
                                </span>
                            </span>, 
                            <span>1</span>&nbsp;–&nbsp;
                            <span><?php echo $row['rooms']; ?></span>&nbsp;rooms, 
                            <span>33</span>&nbsp;–&nbsp;
                            <span><?php echo $row['area']; ?></span>&nbsp;m
                            <sup>2</sup>
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
                        <a href="single.php">
                            <img class="img-responsive" src="upload/<?php echo $row['fimage']; ?>">
                        </a>
                        <div class="add-favorite-button" data-obj_id="56198">
                            <span class="glyphicon glyphicon-bookmark"><span class="glyphicon glyphicon-star"></span></span>
                        </div>
                    </div>
                    <div class="object-info-holder">
                        <div class="info-address col-sm-12">
                            <a href=""><?php echo $row['city'] ?></a>
                            <a href="">Burgas Province</a>
                            <a href="">Kosharitsa</a>
                        </div>
                        <h2 class="info-title col-sm-12" itemprop="name">
                            <a href="" title="undefined" target="_blank"><?php echo $row['name']; ?></a>
                        </h2>
                        <p class="info-details col-sm-12">
                            <span itemprop="offers" itemscope="" itemtype="http://schema.org/AggregateOffer">
                                <span itemprop="price" class="price-wrapper"><span itemprop="lowPrice"><?php echo $row['price']; ?></span>&nbsp;–&nbsp;
                                    <span itemprop="highPrice">79 000</span>&nbsp;
                                    <span itemprop="priceCurrency" content="EUR">RS.</span>
                                </span>
                            </span>, 
                            <span>1</span>&nbsp;–&nbsp;
                            <span><?php echo $row['rooms']; ?></span>&nbsp;rooms, 
                            <span>33</span>&nbsp;–&nbsp;
                            <span><?php echo $row['area']; ?></span>&nbsp;m
                            <sup>2</sup>
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
            <article class="object-item post_box object-item-regular object-wide  <?php
            if ($no_of_row == 2) {
                echo "col-sm-12";
            } else {
                echo "col-sm-6";
            }
            ?>" id="<?php echo $row['post_id']; ?>">
                <div class="object-inner-wrapper">
                    <div class="object-thumbnail">
                        <a href="single.php">
                            <img class="img-responsive" src="upload/<?php echo $row['fimage']; ?>">
                        </a>
                        <div class="add-favorite-button" data-obj_id="56198">
                            <span class="glyphicon glyphicon-bookmark"><span class="glyphicon glyphicon-star"></span></span>
                        </div>
                    </div>
                    <div class="object-info-holder">
                        <div class="info-address col-sm-12">
                            <a href=""><?php echo $row['city'] ?></a>
                            <a href="">Burgas Province</a>
                            <a href="">Kosharitsa</a>
                        </div>
                        <h2 class="info-title col-sm-12" itemprop="name">
                            <a href="" title="undefined" target="_blank"><?php echo $row['name']; ?></a>
                        </h2>
                        <p class="info-details col-sm-12">
                            <span itemprop="offers" itemscope="" itemtype="http://schema.org/AggregateOffer">
                                <span itemprop="price" class="price-wrapper"><span itemprop="lowPrice"><?php echo $row['price']; ?></span>&nbsp;–&nbsp;
                                    <span itemprop="highPrice">79 000</span>&nbsp;
                                    <span itemprop="priceCurrency" content="EUR">RS.</span>
                                </span>
                            </span>, 
                            <span>1</span>&nbsp;–&nbsp;
                            <span><?php echo $row['rooms']; ?></span>&nbsp;rooms, 
                            <span>33</span>&nbsp;–&nbsp;
                            <span><?php echo $row['area']; ?></span>&nbsp;m
                            <sup>2</sup>
                        </p>
                    </div>
                    <div>

                    </div>
                </div>
            </article>
            <?php
            break;
        case 4:
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
                        <a href="single.php">
                            <img class="img-responsive" src="upload/<?php echo $row['fimage']; ?>">
                        </a>
                        <div class="add-favorite-button" data-obj_id="56198">
                            <span class="glyphicon glyphicon-bookmark"><span class="glyphicon glyphicon-star"></span></span>
                        </div>
                    </div>
                    <div class="object-info-holder">
                        <div class="info-address col-sm-12">
                            <a href=""><?php echo $row['city'] ?></a>
                            <a href="">Burgas Province</a>
                            <a href="">Kosharitsa</a>
                        </div>
                        <h2 class="info-title col-sm-12" itemprop="name">
                            <a href="" title="undefined" target="_blank"><?php echo $row['name']; ?></a>
                        </h2>
                        <p class="info-details col-sm-12">
                            <span itemprop="offers" itemscope="" itemtype="http://schema.org/AggregateOffer">
                                <span itemprop="price" class="price-wrapper"><span itemprop="lowPrice"><?php echo $row['price']; ?></span>&nbsp;–&nbsp;
                                    <span itemprop="highPrice">79 000</span>&nbsp;
                                    <span itemprop="priceCurrency" content="EUR">RS.</span>
                                </span>
                            </span>, 
                            <span>1</span>&nbsp;–&nbsp;
                            <span><?php echo $row['rooms']; ?></span>&nbsp;rooms, 
                            <span>33</span>&nbsp;–&nbsp;
                            <span><?php echo $row['area']; ?></span>&nbsp;m
                            <sup>2</sup>
                        </p>
                    </div>
                    <div>

                    </div>
                </div>
            </article>
            <?php
            break;
        case 5:
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
                        <a href="single.php">
                            <img class="img-responsive" src="upload/<?php echo $row['fimage']; ?>">
                        </a>
                        <div class="add-favorite-button" data-obj_id="56198">
                            <span class="glyphicon glyphicon-bookmark"><span class="glyphicon glyphicon-star"></span></span>
                        </div>
                    </div>
                    <div class="object-info-holder">
                        <div class="info-address col-sm-12">
                            <a href=""><?php echo $row['city'] ?></a>
                            <a href="">Burgas Province</a>
                            <a href="">Kosharitsa</a>
                        </div>
                        <h2 class="info-title col-sm-12" itemprop="name">
                            <a href="" title="undefined" target="_blank"><?php echo $row['name']; ?></a>
                        </h2>
                        <p class="info-details col-sm-12">
                            <span itemprop="offers" itemscope="" itemtype="http://schema.org/AggregateOffer">
                                <span itemprop="price" class="price-wrapper"><span itemprop="lowPrice"><?php echo $row['price']; ?></span>&nbsp;–&nbsp;
                                    <span itemprop="highPrice">79 000</span>&nbsp;
                                    <span itemprop="priceCurrency" content="EUR">RS.</span>
                                </span>
                            </span>, 
                            <span>1</span>&nbsp;–&nbsp;
                            <span><?php echo $row['rooms']; ?></span>&nbsp;rooms, 
                            <span>33</span>&nbsp;–&nbsp;
                            <span><?php echo $row['area']; ?></span>&nbsp;m
                            <sup>2</sup>
                        </p>
                    </div>
                    <div>

                    </div>
                </div>
            </article>
            <?php
            break;
    }
    $j++;
}
?>