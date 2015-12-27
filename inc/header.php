<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,ur', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

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
                <li><a href="favourite.php">Favourite<sup class="fav"> <?php echo isset($fav) ? $fav : ''; ?></sup></a></li>
                <li><a href="contact.php">Contact information</a></li>
                <li><a href="about.php">About the company</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <div id="google_translate_element" class="language"></div>
            </ul> 
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>