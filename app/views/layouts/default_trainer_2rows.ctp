<!DOCTYPE html>
<html lang="<?php if ( $locale == 'ger' ) echo 'de'; else echo 'en'; ?>">
<head>
    <title>TriCoreTraining.com <?php echo $title_for_layout; ?></title>
    <?php
    $url = Configure::read('App.serverUrl');
    echo $html->charset();
    ?>
    <?php echo $html->meta('icon'); ?>

    <?php echo $this->element('metanavigation'); ?>

    <link rel="alternate" type="application/rss+xml" title="TriCoreTraining.com RSS" href="http://feeds.feedburner.com/tricoretraining/<?php if ( $locale == 'eng' || $locale == '' ) { ?>EN<?php } else { ?>DE<?php } ?>" />

    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/reset.css?v=<?php echo VERSION; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/text.css?v=<?php echo VERSION; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/960.css?v=<?php echo VERSION; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/styles.css?v=<?php echo VERSION; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/facebox.css?v=<?php echo VERSION; ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/theme/jquery-ui-1.8.5.custom.css?v=<?php echo VERSION; ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo $url; ?>/css/tipTip.css?v=<?php echo VERSION; ?>" />

    <script type="text/javascript" src="<?php echo $url; ?>/js/jquery-1.4.2.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>/js/jquery-ui-1.8.5.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo $url; ?>/js/jquery-fluid16.js?v=<?php echo VERSION; ?>"></script>
    <script type="text/javascript" src="<?php echo $url; ?>/js/facebox.js?v=<?php echo VERSION; ?>"></script>
	<script type="text/javascript" src="<?php echo $url; ?>/js/jquery.tipTip.minified.js?v=<?php echo VERSION; ?>"></script>

<?php echo $scripts_for_layout; ?>

</head>
<body>
  <!-- Header -->
  <div class="container_12 header">
    <div class="grid_12 branding">
		  <a href="<?php echo Configure::read('App.serverUrl'); ?>">
			<img src="<?php echo Configure::read('App.serverUrl'); ?>/img/logo_tricoretraining_233.png" alt="TriCoreTraining" title="TriCoreTraining" />
		  </a>
        <?php echo $this->element('topprofile'); ?>
    </div>
    <div class="grid_12 navigation">
      <?php if ( isset( $userobject ) ) echo $this->element('topnavigation_private'); else echo $this->element('topnavigation_public'); ?>
    </div>
  </div>
  <!-- /Header -->
  <!-- Main -->
  <div class="container_12 main">
    <!-- Left column -->
    <div class="grid_3 left">
      <div class="box navigation last">
      <?php //__('Navigation');?>
               <?php echo $this->element('subnavigation_all'); ?>
      </div>
    </div>
    <!-- /Left column -->
    
    <!-- Center column -->
      <div class="grid_9">
      <!-- Content -->
      <div class="box content last">
        <?php echo $content_for_layout; ?>
        <div class="clear"></div>
      </div>
      <!-- /Content -->
    </div>
    <!-- /Center column -->
    
  </div>
  <div class="clear"></div>
  <!-- /Main -->
  
  <div class="container_12">
  <?php echo $cakeDebug; ?>
  </div>
  
  <!-- Footer -->
  <?php echo $this->element('footer'); ?>
  <!-- /Footer -->

  <?php if ( isset( $this->js_addon ) ) echo $this->js_addon; ?>
  
	<!-- Footer End -->
    <?php echo $this->element('footerend'); ?>
	<!-- /Footer End -->

</body>
</html>