<!doctype html>
<html class="no-js" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<head>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <meta name="description" content="">

  <?php print $styles; ?>

  <link rel="stylesheet" media="screen" href="sites/all/libraries/superfish/css/superfish.css">

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript">window.jQuery || document.write('<script src="/<?php print drupal_get_path('theme', 'nexus'); ?>/js/vendor/jquery/jquery-2.1.3.min.js"><\/script>')</script>
  <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
</head>

<body class="<?php print $classes; ?>" role="document" <?php print $attributes; ?>>
  <!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->
  
  <?php if(!user_is_logged_in()): ?>
  <div id="login">
    <a href="/user">login</a>
  </div>
  <?php endif; ?>
	
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>

  <!--[if lt IE 9]>
    <script src="<?php print base_path() . drupal_get_path('theme', 'nexus') . '/js/vendor/moderinzr/modernizr-2.8.3.min.js'; ?>"></script>
  <![endif]-->

  <?php print $scripts; ?>
  <script type="text/javascript" src="sites/all/libraries/superfish/jquery.hoverIntent.minified.js"></script>
  <script type="text/javascript" src="sites/all/libraries/superfish/superfish.js"></script>

  <script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='https://www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X','auto');ga('send','pageview');
  </script>
</body>
</html>
