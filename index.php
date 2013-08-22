<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <!-- META -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>tabby</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- STYLESHEETS -->
  <link rel="stylesheet" href="assets/css/normalize.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- MODERNIZR -->
  <script src="assets/js/vendor/modernizr-2.6.2.min.js"></script>
  <!-- JQUERY -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
  <!-- JAVASCRIPT -->
  <script src="assets/js/plugins.js"></script>
  <script src="assets/js/main.js"></script>

</head>
<body>

<div class="page-wrap">

  <header id="notification">
    <div class="container">
      <label for=""> &gt; </label>
      <span class="message"></span>
    </div>
  </header>
  
  <div class="container">
    
    <?php /* APP LIST
    ================================================== */ ?>
    <h2>Apps</h2>
    <div class="app_list-wrap">
      <ul id="app_list"></ul>
    </div>
    
    <?php /* ACE EDITOR & FILE BROWSER
    ================================================== */ ?>
    <div class="halves">
      <div class="half">
        <h2>Editor</h2>
        <div class="editor-wrap">
          <div id="e"></div>
        </div>
      </div>
      <div class="half">
        <h2>File Browser</h2>
        <div class="files-wrap">
          <iframe id="file-browser" src="http://localhost/browser.php" frameborder="0" scrolling="yes"></iframe>
        </div>
      </div>
      <div class="clear"></div>
    </div>
    


  </div><!-- .container -->

</div><!-- .page-wrap -->

  



  <script src="assets/js/ace/src-alt/ace.js" type="text/javascript" charset="utf-8"></script>
  <script>var e=ace.edit("e");e.setTheme("ace/theme/monokai");e.getSession().setMode("ace/mode/javascript");</script>

  
</body>
</html>
