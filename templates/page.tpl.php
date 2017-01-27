<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>

<div id="page">
  <header id="masthead" class="site-header container" role="banner">
    <div class="row">

      <div class="col-sm-12" id="mobile-menu-container">
    	<?php $main_menu_all = menu_tree_output(menu_tree_all_data('main-menu')); print drupal_render($main_menu_all); ?> 
      </div>

      <div id="logo" class="site-branding col-sm-5">
        <?php if ($logo): ?><div id="site-logo"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a></div><?php endif; ?>
        <h1 id="site-title">
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a>
        </h1>
      </div>
	
<!-- Menu -->
      <div class="col-sm-7 menu-container" id="desktop-menu-container">
        <nav id="navigation" role="navigation">
          <div id="desktop-menu" class="menu">
            <?php 
	    	$blockObject = block_load('superfish', '1');
    		$block = _block_get_renderable_array(_block_render_blocks(array($blockObject)));
    		print drupal_render($block);
	    ?>
          </div>
        </nav>
      </div>
      <!-- /Menu -->

    </div>
  </header>

  <?php if($page['preface_first'] || $page['preface_middle'] || $page['preface_last']) : ?>
    <?php $preface_col = ( 12 / ( (bool) $page['preface_first'] + (bool) $page['preface_middle'] + (bool) $page['preface_last'] ) ); ?>
    <div id="preface-area">
      <div class="container">
        <div class="row">
          <?php if($page['preface_first']): ?><div class="preface-block col-sm-<?php print $preface_col; ?>">
            <?php print render ($page['preface_first']); ?>
          </div><?php endif; ?>
          <?php if($page['preface_middle']): ?><div class="preface-block col-sm-<?php print $preface_col; ?>">
            <?php print render ($page['preface_middle']); ?>
          </div><?php endif; ?>
          <?php if($page['preface_last']): ?><div class="preface-block col-sm-<?php print $preface_col; ?>">
            <?php print render ($page['preface_last']); ?>
          </div><?php endif; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if($page['header']) : ?>
    <div id="header-block">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <?php print render($page['header']); ?>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($is_front): ?>
    <?php if (theme_get_setting('slideshow_display','nexus')): ?>
      <?php
      $slide1_head = check_plain(theme_get_setting('slide1_head','nexus'));   $slide1_desc = check_markup(theme_get_setting('slide1_desc','nexus'), 'full_html'); $slide1_url = check_plain(theme_get_setting('slide1_url','nexus'));
      $slide2_head = check_plain(theme_get_setting('slide2_head','nexus'));   $slide2_desc = check_markup(theme_get_setting('slide2_desc','nexus'), 'full_html'); $slide2_url = check_plain(theme_get_setting('slide2_url','nexus'));
      $slide3_head = check_plain(theme_get_setting('slide3_head','nexus'));   $slide3_desc = check_markup(theme_get_setting('slide3_desc','nexus'), 'full_html'); $slide3_url = check_plain(theme_get_setting('slide3_url','nexus'));
      ?>
      <div class="container hidden-xs carousel fade-carousel slide front-page-carousel" data-ride="carousel" data-interval="4000" id="bs-carousel">

        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#bs-carousel" data-slide-to="0" class="active"></li>
          <li data-target="#bs-carousel" data-slide-to="1"></li>
          <li data-target="#bs-carousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item slides active">
            <div class="slide-1" style="background-image: url('<?php print base_path() . drupal_get_path('theme', 'nexus') . '/images/slide-image-1.jpg'; ?>');"></div>
            <div class="hero">
              <hgroup>
                <h1><?php print $slide1_head; ?></h1>
                <h3><?php print $slide1_desc; ?></h3>
              </hgroup>
              <a class="btn btn-hero btn-lg" role="button" href="<?php print $slide3_url; ?>">Learn More</a>
            </div>
          </div>
          <div class="item slides">
            <div class="slide-2" style="background-image: url('<?php print base_path() . drupal_get_path('theme', 'nexus') . '/images/slide-image-4.png'; ?>');"></div>
            <div class="hero">
              <hgroup>
                <h1><?php print $slide2_head; ?></h1>
                <h3><?php print $slide2_desc; ?></h3>
              </hgroup>
              <a class="btn btn-hero btn-lg" role="button" href="<?php print $slide2_url; ?>">Learn More</a>
            </div>
          </div>
          <div class="item slides">
            <div class="slide-3" style="background-image: url('<?php print base_path() . drupal_get_path('theme', 'nexus') . '/images/slide-image-3.png'; ?>');"></div>
            <div class="hero">
              <hgroup>
                <h1><?php print $slide3_head; ?></h1>
                <h3><?php print $slide3_desc; ?></h3>
              </hgroup>
              <a class="btn btn-hero btn-lg" role="button" href="<?php print $slide3_url; ?>">Learn More</a>
            </div>
          </div>
        </div>
      </div>
    <?php endif; ?>
  <?php endif; ?>


  <div class="container" role="main">

    <div id="main-content">
      <div class="container">

        <div class="row">
          <?php if($page['sidebar_first']) { $primary_col = 8; } else { $primary_col = 12; } ?>
          <div id="primary" class="content-area col-md-<?php print $primary_col; ?>">
            <section id="content" role="main" class="clearfix">
              <?php if (theme_get_setting('breadcrumbs')): ?><?php if ($breadcrumb): ?><div id="breadcrumbs"><?php print $breadcrumb; ?></div><?php endif;?><?php endif; ?>
              <?php print $messages; ?>
              <?php if ($page['content_top']): ?><div id="content_top"><?php print render($page['content_top']); ?></div><?php endif; ?>
              <div id="content-wrap">
                <?php print render($title_prefix); ?>
                <?php if ($title): ?><h1 class="page-title"><?php print $title; ?></h1><?php endif; ?>
                <div class="i-section-title">
                  <i class="icon-feather"></i>
                </div>
                <?php print render($title_suffix); ?>
                <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
                <?php print render($page['help']); ?>
                <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
                <?php print render($page['content']); ?>
              </div>
            </section>
          </div>
          <?php if ($page['sidebar_first']): ?>
            <aside id="sidebar" class="col-sm-4" role="complementary">
             <?php print render($page['sidebar_first']); ?>
            </aside>
          <?php endif; ?>
        </div>
      </div>
    </div>

  </div>


  <div id="footer-container">
    <div class="footer">
      <div class="container">

        <div class="row">
          <!-- About -->
          <div class="col-md-1 md-margin-bottom-40">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
              <img src="/<?php print drupal_get_path('theme', 'nexus'); ?>/logo-light.png" alt="<?php print t('Home'); ?>" />
            </a>
          </div><!--/col-md-3-->
          <!-- End About -->

          <!-- Link List -->
          <div class="footer-block col-md-3 md-margin-bottom-40">
            <h2>Mission Statement</h2>
            <p>We the people of Willis will provide an open place of worship, where we can come together as a caring part of the family of god.</p>
            <p>To grow spiritually in our Christian faith through prayer, praise, and reaching out to others in God's name, in both our local and global community.</p>
          </div><!--/col-md-3-->
          <!-- End Link List -->

            <div class="footer-block md-margin-bottom-40 col-md-4">
              <?php if($page['footer_first']): ?>
                <?php print render ($page['footer_first']); ?>
              <?php endif; ?>
              <?php if($page['footer_second']): ?>
                <?php print render ($page['footer_second']); ?>
              <?php endif; ?>
            </div>

          <?php if($page['footer_third']): ?>
            <div class="footer-block md-margin-bottom-40 col-md-4">
              <?php print render ($page['footer_third']); ?>
            </div>
          <?php endif; ?>
        </div>

        <?php if($page['footer']): ?>
        <div class="row">
          <div class="col-sm-12">
            <?php print render($page['footer']); ?>
          </div>
        </div>
        <?php endif; ?>

      </div>
    </div><!--/footer-->

    <div class="copyright">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <p>
              <?php print t('Copyright'); ?> &copy; <?php echo date("Y"); ?>, <a href="<?php print $front_page; ?>"><?php print $site_name; ?></a>.
              <a href="<?php echo drupal_get_path_alias('node/74'); ?>">Privacy Policy</a> | <a href="<?php echo drupal_get_path_alias('node/73'); ?>">Terms of Service</a>
            </p>
          </div>
        </div>
      </div>
    </div><!--/copyright-->
  </div>

</div>
