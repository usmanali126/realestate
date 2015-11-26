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
                                            <input type="text" class="form-control" id="name" placeholder="Post name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="about" class="col-sm-3 control-label">About Property</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" name="about" id="about" placeholder="Writy about property"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="category" class="col-sm-3 control-label">Post Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="category" name="category">
                                                <option value="apartments">Apartments</option>
                                                <option value="house">House</option>
                                                <option value="commercial">Commercial</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="city" class="col-sm-3 control-label">City Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="city" name="city" placeholder="Wirt property city">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="rooms" class="col-sm-3 control-label">No. of rooms</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="rooms" name="rooms" placeholder="Write Number of Rooms">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="area" class="col-sm-3 control-label">Total area in meter</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="area" name="area" placeholder="Write Property area in meters">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="price" class="col-sm-3 control-label">Property Price</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="price" name="price" placeholder="Write Property price">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="location" class="col-sm-3 control-label">Google Location link</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="location" name="location" placeholder="Add Property Google Loation link">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="yes" name="parking"> Parking
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
                                        <label for="area" class="col-sm-3 control-label">Total area in meter</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="area" name="area" placeholder="Write Property area in meters">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="area" class="col-sm-3 control-label">Total area in meter</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="area" name="area" placeholder="Write Property area in meters">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="area" class="col-sm-3 control-label">Total area in meter</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="area" name="area" placeholder="Write Property area in meters">
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
                                            <input type="file"  name="image[]" multiple="" />
                                        </div>
                                </div>
                                <div class="col-sm-12 images">
                                        <img class="img-responsive" src="../images/1172.jpg" alt="" />
                                        <img class="img-responsive" src="../images/1172.jpg" alt="" />
                                        <img class="img-responsive" src="../images/1172.jpg" alt="" />
                                </div>
                            </fieldset>
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
