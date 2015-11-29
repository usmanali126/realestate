<?php
if (isset($_POST['submit'])) {
//print_r($_POST);
    foreach ($_POST as $key => $value) {
        if (empty($_POST[$key])) {
            $_Error[$key] = $value;
            $error = TRUE;
        } else {
            $_DATA[$key] = $value;
        }
    }
    //print_r($_DATA);
    if (isset($error)) {
        echo 'error is set';
        print_r($_Error);
    }
    print_r($_DATA);
}

/* defult variable to set in input*/

if ((!empty($_DATA['name'])) || isset($_DATA['name'])) {
    $name = 'value="' . $_DATA['name'] . '"';
} else {
    $name = 'placeholder="Post name"';
}
if ((!empty($_DATA['about'])) || isset($_DATA['about'])) {
    $about = $_DATA['about'];
}
if ((!empty($_DATA['category'])) || isset($_DATA['category'])) {
    switch ($_DATA['category']) {
        case 'apartments':
            $apartments = 'selected=""';
            break;
        case 'house':
            $house = 'selected=""';
            break;
        case 'commercial':
            $commercial = 'selected=""';
            break;
    }  
}
if ((!empty($_DATA['city'])) || isset($_DATA['city'])) {
    $city = 'value="' . $_DATA['city'] . '"';
} else {
    $city = 'placeholder="Wirt property city"';
}
if ((!empty($_DATA['rooms'])) || isset($_DATA['rooms'])) {
    $rooms = 'value="' . $_DATA['rooms'] . '"';
} else {
    $rooms = 'Write Number of Rooms';
}
if ((!empty($_DATA['area'])) || isset($_DATA['area'])) {
    $area = 'value="' . $_DATA['area'] . '"';
} else {
    $area = 'placeholder="Write Property area in meters"';
}
if ((!empty($_DATA['price'])) || isset($_DATA['price'])) {
    $price = 'value="' . $_DATA['price'] . '"';
} else {
    $price = 'placeholder="Write Property price"';
}
if ((!empty($_DATA['location'])) || isset($_DATA['location'])) {
    $location = 'value="' . $_DATA['location'] . '"';
} else {
    $location = 'placeholder="Add Property Google Loation link"';
}
if ((!empty($_DATA['parking'])) || isset($_DATA['parking'])) {
    $parking = 'checked=""';
}
if ((!empty($_DATA['title'])) || isset($_DATA['title'])) {
    $title = 'value="' . $_DATA['title'] . '"';
} else {
    $title = ' placeholder="Write Property area in meters"';
}
if ((!empty($_DATA['keywords'])) || isset($_DATA['keywords'])) {
    $keywords = 'value="' . $_DATA['keywords'] . '"';
} else {
    $keywords = 'placeholder="Write Property area in meters"';
}
if ((!empty($_DATA['description'])) || isset($_DATA['description'])) {
    $description = 'value="' . $_DATA['description'] . '"';
} else {
    $description = 'placeholder="Write Property area in meters"';
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
                    <div class="col-sm-12 col-md-7">
                        <div class="form">
                            <form class="form-horizontal" id="form" action="" method="POST">
                                <fieldset><legend>Post Information</legend>
                                    <div class="form-group">
                                        <label for="name" class="col-sm-3 control-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="name" name="name" <?php echo $name; ?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="about" class="col-sm-3 control-label">About Property</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="about" value="about about" id="about" placeholder="Writy about property" ><?php
                                                if (isset($about)) {
                                                    echo $about;
                                                }
                                                ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="category" class="col-sm-3 control-label">Post Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="category" name="category">
                                                <option value="apartments" <?php if(isset($apartments)){echo $apartments;} ?>>Apartments</option>
                                                <option value="house" <?php if(isset($house)){echo $house; } ?>>House</option>
                                                <option value="commercial" <?php if(isset($commercial)){echo $commercial;} ?>>Commercial</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="city" class="col-sm-3 control-label">City Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="city" name="city" <?php if(isset($city)){echo $city;}?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="rooms" class="col-sm-3 control-label">No. of rooms</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="rooms" name="rooms" <?php if(isset($rooms)){echo $rooms;}?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="area" class="col-sm-3 control-label">Total area in meter</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="area" name="area" <?php if(isset($area)){echo $area ;}?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="price" class="col-sm-3 control-label">Property Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="price" name="price" <?php if(isset($price)){echo $price ;}?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="location" class="col-sm-3 control-label">Google Location link</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="location" name="location" <?php if(isset($location)){echo $location ;}?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="yes"  name="parking" <?php if(isset($parking)){echo $parking ;}?>> Parking
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="fimage" class="col-sm-3 control-label">Add Featured image</label>
                                        <div class="col-sm-9">
                                            <input type="file"  id="fimage" name="fimage" >
                                        </div>
                                    </div>
                                </fieldset>
                                <fieldset><legend>Meta Data</legend>
                                    <div class="form-group">
                                        <label for="title" class="col-sm-3 control-label">Meta Title</label>
                                        <div class="col-sm-9">
                                            <input form="form" type="text" class="form-control" id="title" name="title" <?php if(isset($title)){echo $title ;}?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="keywords" class="col-sm-3 control-label">Meta Keywords</label>
                                        <div class="col-sm-9">
                                            <input form="form" type="text" class="form-control" id="keywords" name="keywords" <?php if(isset($keywords)){echo $keywords ;}?>>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-sm-3 control-label">Meta Description</label>
                                        <div class="col-sm-9">
                                            <input form="form" type="text" class="form-control" id="description" name="description" <?php if(isset($description)){echo $description ;}?>>
                                        </div>
                                    </div>
                                </fieldset>
                            </form> 
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <div class="post-images row">
                            <fieldset>
                                <legend>Post Images</legend>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input form="form" type="file" name="image[]" multiple="" />
                                    </div>
                                </div>
                                <div class="col-sm-12 images">
                                    <img class="img-responsive" src="../images/1172.jpg" alt="" />
                                    <img class="img-responsive" src="../images/1172.jpg" alt="" />
                                    <img class="img-responsive" src="../images/1172.jpg" alt="" />
                                </div>
                            </fieldset>
                            <div class="form-group pull-right">
                                <button value="submit" class="btn btn-primary" name="submit" form="form"> submit</button>
                            </div>
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
