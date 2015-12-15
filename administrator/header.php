<nav class="navbar navbar-inverse" >
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="../images/bismillah_Real_estate.jpg" style="width:100px;height:50px;"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-collapse-1">
      <ul class="nav navbar-nav">
          <li class="icon-lock"><a href="index.php">New Post </a></li>
        <li><a href="posts.php">Posts</a></li>
        <li><a href="contactus.php">Contact Us</a></li>
        <li><a href="password.php">Change Password</a></li>
      </ul>
<!--    <form class="navbar-form nav navbar-nav navbar-right " role="search" id="hsearch" action="record.php" method="POST">
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

                                    </form>-->
        <ul class="nav navbar-nav navbar-right">
            <li class=""><a>Welcome: <?php echo $_SESSION['name'] ?></a></li>
            <li class=""><a href="login.php?logout=true">Log Out</a></li>
        </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>