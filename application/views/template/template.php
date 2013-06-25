<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
  <!-- **** layout stylesheet **** -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/style.css" />
  <!-- **** colour stylesheet **** -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/colour_1.css" />



    <title><?php echo $this->config->item('server')?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="This is a <?php echo $this->config->item('server')?> Private Server Management System. Come join us today. Register your new account for free today!!" />
    <meta name="keywords" content="cabal, cabal online, mmorpg" />
    <meta name="author" content="Zaugola" />
    <link rel="shortcut icon" href="<?php echo base_url()?>images/favicon.ico" type="image/x-icon" />

    <!-- **** jquery **** -->
    <link href="<?php echo base_url()?>css/flick/jquery-ui-1.10.3.custom.css" rel="stylesheet">
    <script src="<?php echo base_url()?>js/jquery-1.9.1.js"></script>
    <script src="<?php echo base_url()?>js/jquery-ui-1.10.3.custom.js"></script>
    <script src="<?php echo base_url()?>js/ucwords.js"></script>


</head>

<body>
  <div id="main">
    <div id="logo">
      <h1><?php echo $this->config->item('server')?> Private Server</h1>
      <div id="colours">
      <!--
        <a href="index.html"><img src="style/1.png" alt="colour scheme 1" /></a>&nbsp;
        <a href="colour_2.html"><img src="style/2.png" alt="colour scheme 2" /></a>&nbsp;
        <a href="colour_3.html"><img src="style/3.png" alt="colour scheme 3" /></a>&nbsp;
      -->
      </div>
    </div>
    <div id="menubar">
      <ul id="menu">

    <?php start_block_marker('top_nav') ?>
      <li><?php echo anchor('', 'home', ($this->uri->uri_string() == 'welcome/index' || $this->uri->uri_string() == '') ? 'class="current" title="home"' : '');?></li>
    <?php end_block_marker() ?>

      </ul>
      <div id="search">
      <!--
        <form method="post" action="#">
          <p><input class="searchfield" type="text" value="" />
          <input class="searchbutton" name="submit" type="submit" value="search" /></p>
        </form>
      -->
      </div>
    </div>
    <div id="site_content">
      <div class="sidebar">
        <div class="sidebaritem">
          <h3>Menu</h3>
          <ul>
    <?php start_block_marker('side_nav') ?>
        <li><?php echo anchor('', 'home', ($this->uri->uri_string() == 'welcome/index' || $this->uri->uri_string() == '') ? 'class="current" title="home"' : '');?></li>

         <li><a href="#">Ada</a></li>
<li><a href="#">Adamsville</a></li>
<li><a href="#">Addyston</a></li>
<li>
<a href="#">Delphi</a>
<ul>
<li class="ui-state-disabled"><a href="#">Ada</a></li>
<li><a href="#">Saarland</a></li>
<li><a href="#">Salzburg</a></li>
</ul>
</li>
<li><a href="#">Saarland</a></li>
<li>
<a href="#">Salzburg</a>
<ul>
<li>
<a href="#">Delphi</a>
<ul>
<li><a href="#">Ada</a></li>
<li><a href="#">Saarland</a></li>
<li><a href="#">Salzburg</a></li>
</ul>
</li>
<li>
<a href="#">Delphi</a>
<ul>
<li><a href="#">Ada</a></li>
<li><a href="#">Saarland</a></li>
<li><a href="#">Salzburg</a></li>
</ul>
</li>
<li><a href="#">Perch</a></li>
</ul>
</li>
<li class="ui-state-disabled"><a href="#">Amesville</a></li>
    <?php end_block_marker() ?>


          </ul>
        </div>
        <div class="sidebaritem">


<?php start_block_marker('sidebar1') ?>
          <h3>Articles</h3>
          <ul>
            <li><a href="#" title="">Article 1</a></li>
            <li><a href="#" title="">Article 2</a></li>
          </ul>
<?php end_block_marker() ?>

        </div>
        <div class="sidebaritem">


<?php start_block_marker('sidebar2') ?>
          <h3>Comments</h3>
          <ul>
            <li><a href="#" title="">Comment 1</a></li>
            <li><a href="#" title="">Comment 2</a></li>
          </ul>
<?php end_block_marker() ?>


        </div>
        <div class="sidebaritem">


<?php start_block_marker('sidebar3') ?>
          <h3>Comments</h3>
          <ul>
            <li><a href="#" title="">Comment 1</a></li>
            <li><a href="#" title="">Comment 2</a></li>
          </ul>
<?php end_block_marker() ?>

<?php start_block_marker('sidebar4') ?>
          <h3>Comments</h3>
          <ul>
            <li><a href="#" title="">Comment 1</a></li>
            <li><a href="#" title="">Comment 2</a></li>
          </ul>
<?php end_block_marker() ?>


        </div>
      </div>
      <div id="content">
        <h1>Welcome to the <?php echo $this->config->item('server')?> Private Server</h1>
        <!-- **** INSERT PAGE CONTENT HERE **** -->



        <?php start_block_marker('content') ?>
          <div id="progressbar"><div class="progress-label">Loading...</div></div>
        <p>
          This simple, fixed width website template comes with 2 different
          layouts and 3 different colour schemes. The template is configured for use
          with <a href="http://snewscms.com/"> sNews</a>, a lightweight, simple CMS.
        </p>
        <h4>colour schemes</h4>
        <p>
          This template comes with 3 different colour schemes. Just for fun!:<br />
          <a class="colour" href="index.html"><img src="<?php echo base_url(); ?>images/1.png" alt="colour scheme 1" /></a>&nbsp;
          <a class="colour" href="colour_2.html"><img src="<?php echo base_url(); ?>images/2.png" alt="colour scheme 2" /></a>&nbsp;
          <a class="colour" href="colour_3.html"><img src="<?php echo base_url(); ?>images/3.png" alt="colour scheme 3" /></a>&nbsp;
        </p>
        <p>
          This template is released as an 'open source' design (under the
          <a href="http://creativecommons.org/licenses/by/2.5"> Creative Commons
          Attribution 2.5</a> licence), which means that you are free to download and
          use it for anything you want (including modifying and amending it).
          The header image is from a digital photograph taken by me, so there are no
          issues with copyright there. All I ask is that you leave the 'design by dcarter'
          link in the footer of the template, but other than that...
        </p>
        <p>
          This standards compliant template is written entirely in XHTML 1.1 and CSS,
          and can be validated using the links in the footer.
        </p>
        <p>
          You can view my other 'open source' template designs
          <div class="demo"><a href="http://www.dcarter.co.uk/templates.html">here</a>.</div>
        </p>
        <h1>Example Elements</h1>
        <h4>Links</h4>
        <p><a href="index.html">this is an example link</a></p>
        <h4>Block Quotes</h4>
        <blockquote>
          <p>
            Some blockquote text. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
            incididunt ut labore et dolore magna aliqua.
          </p>
        </blockquote>
        <h4>Images</h4>
        <p>images can be placed on the left, in the center or on the right.</p>
        <span class="left"><img src="<?php echo base_url(); ?>images/gallery.jpg" alt="example graphic" /></span>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
          incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
          exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
          irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
          pariatur.
        </p>
        <span class="center"><img src="<?php echo base_url(); ?>images/gallery.jpg" alt="example graphic" /></span>
        <span class="right"><img src="<?php echo base_url(); ?>images/gallery.jpg" alt="example graphic" /></span>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
          incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
          exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
          irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
          pariatur.
        </p>
        <p><input type="text" name="date" id="datepicker" /></p>
        <p><input type="text" name="text" /></p>
        <?php end_block_marker() ?>


      </div>
    </div>



    <?php start_block_marker('jscript') ?>
<script>
  $(function() {
    $( "input[type=submit], a, button", ".demo" )
      .button();
    $( "#radioset" ).buttonset();

    // Datepicker
    $('#datepicker').datepicker({dateFormat: "yy-mm-dd"});

    //ucwords
    $("input[type=text], textarea").keyup(function() {
      toUpper(this);
    });


 

$(function() {
var progressbar = $( "#progressbar" ),
progressLabel = $( ".progress-label" );
progressbar.progressbar({
value: false,
change: function() {
progressLabel.text( progressbar.progressbar( "value" ) + "%" );
},
complete: function() {
progressLabel.text( "Complete!" );
}
});
function progress() {
var val = progressbar.progressbar( "value" ) || 0;
progressbar.progressbar( "value", val + 1 );
if ( val < 99 ) {
setTimeout( progress, 100 );
}
}
setTimeout( progress, <?php echo '{elapsed_time}'; ?> );
});



  });
</script>

<style>
.ui-progressbar {
position: relative;
}
.progress-label {
position: absolute;
left: 50%;
top: 4px;
font-weight: bold;
text-shadow: 1px 1px 0 #fff;
}
</style>

    <?php end_block_marker() ?>

    <div id="footer">
      Copyright &copy;<?php echo mdate("%Y", now());?> Terajutara Resources (M) Sdn Bhd | <a href="http://www.dcarter.co.uk">template design by dcarter</a>
      <br />
      Page rendered in <strong>{elapsed_time}</strong> seconds using <strong>{memory_usage}</strong>
    </div>
  </div>
</body>
</html>
