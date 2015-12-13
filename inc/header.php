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
      <a class="navbar-brand" href="index.php"><img src="images/bismillah_Real_estate.jpg" style="width:100px;height:50px;"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="add-property.php">Add property </a></li>
        <li><a href="favorites.php">Favorites<sup class="fav"> <?php echo isset($fav) ? $fav : ''; ?></sup></a></li>
        <li><a href="contact.php">Contact information</a></li>
        <li><a href="about.php">About the company</a></li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right">
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="">English <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="report.php">English <img  src="images/eng.png"></a></li>
                <li><a href="areareport.php">Urdu <img src="images/pk.png"></a></li>
            </ul></li>
        </ul> 
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>