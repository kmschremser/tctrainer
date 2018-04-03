<!--<?php echo $locale; ?>-->

<?php if ( !isset($session_userid) ) { ?>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">

                  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">TriCoreTraining? <!--<?php __('Training Plans'); ?>--><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="/trainer/#howitworks"><?php __('What is'); ?> TriCoreTraining?</a></li>
                          <li><a href="/trainer/#features"><?php __('Features'); ?></a></li>
                          <li><a href="/trainer/#references"><?php __('References'); ?></a></li>
                          <li><a href="/trainer/#newsletter"><?php __('Newsletter'); ?></a></li>                          
                          <li><a href="/trainer/#pricing"><?php __('Pricing'); ?></a></li>
                          <li><a href="/blog/<?php if ( $locale == 'deu' ) { ?>de/<?php } else { ?>en/<?php } ?>tricoretraining-the-interactive-online-training-coach-for-triathlon-running-biking/"><?php __('More about'); ?> TriCoreTraining</a></li>
                        </ul>
                  </li>
                   <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php __('How to start'); ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><?php echo $html->link(__('FREE Registration',true),array('controller' => 'users', 'action' => 'register'))?></li>
                          <li><?php echo $html->link(__('Sign in',true),array('controller' => 'users', 'action' => 'login'))?></li>
                        </ul>
                  </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php __('Blog'); ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="/blog/<?php if ( $locale == 'deu' ) { ?>de/<?php } else { ?>en/<?php } ?>"><?php __('Read our blog', false); ?></a></li>
                          <li><a href="/blog/<?php if ( $locale == 'deu' ) { ?>de/<?php } else { ?>en/<?php } ?>category/news/"><?php __('News'); ?></a></li>
                          <li><a href="/blog/<?php if ( $locale == 'deu' ) { ?>de/<?php } else { ?>en/<?php } ?>category/faq/"><?php __('FAQs'); ?></a></li>
                        </ul>
                  </li>
                </ul>
<!--
          <form action="/trainer/users/login" id="UserLoginForm" method="post" accept-charset="utf-8" class="navbar-form navbar-right navbar-small">
            <div class="form-group">
              <input name="data[User][email]" type="text" placeholder="Email" class="form-control input-sm form-controll-small">
            </div>
            <div class="form-group">
              <input name="data[User][password]" type="password" placeholder="Password" class="form-control input-sm form-controll-small">
            </div>
            <input type="hidden" name="data[User][remember_me]" value="0">
            <button type="submit" class="btn btn-success btn-small"><?php __('Sign in'); ?></button>
          </form>                
-->
<form action="#" id="UserLoginForm" method="post" accept-charset="utf-8" class="navbar-form navbar-right navbar-small">
  
  <?php __('Change to'); ?>:
  <?php if ( $locale != 'eng' || $locale == '' ) { ?>
  <?php echo $html->link('English', array('controller' => 'starts', 'action' => 'index', 'code' => "eng"), array('class' => 'btn btn-success btn-small')); ?>
  <?php } ?>

  <?php if ( $locale != 'deu' ) { ?>
  <?php echo $html->link('Deutsch',array('controller' => 'starts', 'action' => 'index', 'code' => "deu"), array('class' => 'btn btn-success btn-small')); ?>
  <?php } ?>

  <?php echo $html->link(__('Sign In',true),array('controller' => 'users', 'action' => 'login'), array('class' => 'btn btn-warning btn-small')); ?>
<!--  <?php echo $html->link(__('Facebook Sign In',true),'/users/login_facebook/', array('class' => 'btn btn-warning btn-small')); ?>-->

</form>

<?php } else { ?>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php __('Training'); ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li style="padding-left: 20px;"><b><?php __('Training Plan'); ?></b></li>

                          <li><?php echo $html->link(__('Your Training Plan',true),array('controller' => 'trainingplans', 'action' => 'view'))?></li>

                          <li><?php echo $html->link(__('Training Diary',true),array('controller' => 'trainingstatistics', 'action' => 'list_trainings'))?></li>
                          <li><?php echo $html->link(__('Your Races',true),array('controller' => 'competitions', 'action' => 'list_competitions'))?></li>
                        
                          <li style="padding-left: 20px;"><b><?php __('Statistics'); ?></b></li>
                          <li><?php echo $html->link(__('How fit am I?',true),array('controller' => 'trainingstatistics', 'action' => 'statistics_trimp'))?></li>
                          <li><?php echo $html->link(__('How fast am I?',true),array('controller' => 'trainingstatistics', 'action' => 'statistics_formcurve'))?></li>
                          <li><?php echo $html->link(__('Can I finish my goal?',true),array('controller' => 'trainingstatistics', 'action' => 'statistics_competition'))?></li>
                          <li><?php echo $html->link(__('How much have I lost?',true),array('controller' => 'trainingstatistics', 'action' => 'statistics_howmuchhaveilost'))?></li>
                          <li><?php echo $html->link(__('What have I achieved?',true),array('controller' => 'trainingstatistics', 'action' => 'statistics_whathaveidone'))?></li>

                        </ul>
                  </li>
                  <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php __('Settings'); ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><?php echo $html->link(__('Edit training info',true),array('controller' => 'users', 'action' => 'edit_traininginfo'))?></li>
                          <li><?php echo $html->link(__('Edit weight goals',true),array('controller' => 'users', 'action' => 'edit_weight'))?></li>
                          <li><?php echo $html->link(__('Edit profile',true),array('controller' => 'users', 'action' => 'edit_userinfo'))?></li>
                          <li><?php echo $html->link(__('Change password',true),array('controller' => 'users', 'action' => 'edit_password'))?></li>
                          <li><?php echo $html->link(__('Change metric',true),array('controller' => 'users', 'action' => 'edit_metric'))?></li>
                          <?php if ( isset( $userobject ) && $userobject['advanced_features'] ) { ?>
                          <!--
                          <li>Demo: <?php echo $html->link(__('Edit images',true).' - Beta',array('controller' => 'users', 'action' => 'edit_images'))?></li>
                          -->
                          <?php } ?>
                          <li><a target="_blank" href="http://getsatisfaction.com/tricoretraining"><?php __('Feedback'); ?></a></li>        
                          
                          <!--
                          <?php if ( isset ( $userobject ) ) { ?>
                          <li><?php echo $html->link(__('Sign out',true), array('controller' => 'users', 'action' => 'logout')); ?></li>
                          <?php } ?>
                          <li style="padding-left: 20px;">Change to:<li>
                          <?php if ( $locale != 'eng' || $locale == '' ) { ?>
                          <?php echo $html->link('English',array('controller' => 'starts', 'action' => 'index', 'code' => "eng")); ?>
                          <?php } ?>

                          <?php if ( $locale != 'deu' ) { ?>
                          <?php echo $html->link('Deutsch',array('controller' => 'starts', 'action' => 'index', 'code' => "deu")); ?>
                          <?php } ?>
                          </li>
                          -->

                        </ul>
                  </li>
                   <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php __('Premium'); ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="/trainer/payments/subscribe_triplans"><b><?php __('Subscribe'); ?></b></a></li>
                          <li><?php echo $html->link(__('Show payments',true),array('controller' => 'payments', 'action' => 'show_payments'))?></li>
                          <li><?php echo $html->link(__('Cancel subscription :(',true),array('controller' => 'payments', 'action' => 'unsubscribe_triplans'))?></li>
                          <?php if ( isset( $userobject ) && $userobject['admin'] == '1' ) { ?>
                          <br />
                          &nbsp;&nbsp;&nbsp;<b>Admin (only for admin)</b>
                          <li><a href="/trainer/users/list_users"><?php __('Administrate users'); ?></a></li>      
                          <li><a target="_blank" href="/phpmyadmin/"><?php __('PHPMyAdmin'); ?></a></li>
                          <li><a target="_blank" href="/trainer/users/fill_my_database"><?php __('Fill my database'); ?></a></li>
                          <li><a target="_blank" href="/trainer/trainingplans/get?debug=1">DEBUG Trainingplan</a></li>
                          <li><a href="#/trainer/starts/index/en/u:TRANSACTIONID">Redirect workout (u)</a></li> 
                          <li><a href="/trainer/starts/index/en/ur:<?php echo base64_encode("1"); ?>">Redirect no Money (ur):1</a></li> 
                          <li><a href="/trainer/starts/index/en/urm:<?php echo base64_encode("1"); ?>">Redirect Money (urm):1</a></li>
                          <li><a href="/trainer/starts/index/en/c:<?php echo base64_encode("@gentics.com"); ?>">Company:@gentics.com</a></li>
                          <?php if ( isset( $session_userid ) ) { ?>
                          <li><a href="/trainer/starts/index/<?php if ( $locale == 'deu' ) { ?>de/<?php } else { ?>en/<?php } ?>ur:<?php echo base64_encode($userobject['id']); ?>/"><?php __('Invite your friends'); ?></a></li>
                          <?php } ?>                          
                          <?php } ?>
                        </ul>
                  </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php __('Blog'); ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="/blog/<?php if ( $locale == 'deu' ) { ?>de/<?php } else { ?>en/<?php } ?>"><?php __('Read our Blog'); ?></a></li>
                          <li><a href="/blog/<?php if ( $locale == 'deu' ) { ?>de/<?php } else { ?>en/<?php } ?>category/news/"><?php __('News'); ?></a></li>
                          <li><a href="/blog/<?php if ( $locale == 'deu' ) { ?>de/<?php } else { ?>en/<?php } ?>category/faq/"><?php __('FAQs'); ?></a></li>

                        </ul>
                  </li>
                </ul>

<form action="#" id="UserLoginForm" method="post" accept-charset="utf-8" class="navbar-form navbar-right navbar-small">
  
  <?php __('Change to'); ?>:
  <?php if ( $locale != 'eng' || $locale == '' ) { ?>
  <?php echo $html->link('English', array('controller' => 'starts', 'action' => 'index', 'code' => "eng"), array('class' => 'btn btn-success btn-small')); ?>
  <?php } ?>

  <?php if ( $locale != 'deu' ) { ?>
  <?php echo $html->link('Deutsch',array('controller' => 'starts', 'action' => 'index', 'code' => "deu"), array('class' => 'btn btn-success btn-small')); ?>
  <?php } ?>


  <?php if ( isset ( $userobject ) ) { ?>
  <?php echo $html->link(__('Sign out',true), array('controller' => 'users', 'action' => 'logout'), array('class' => 'btn btn-warning btn-small')); ?>
  <?php } ?>
  
</form>

<!--
    <form class="navbar-form navbar-right navbar-small" role="search" method="get" id="searchform" action="/blog/<?php if ( $locale == 'deu' ) { ?>de/<?php } else { ?>en/<?php } ?>">
      <div class="form-group">
      <input name="s" id="s" type="text" class="form-control form-controll-small" placeholder="<?php __('Search'); ?>">
      </div>
      <input id="searchsubmit" value="<?php __('Search'); ?>" type="submit" class="btn btn-primary">
    </form>
-->
    
<!--
<div>
<?php if ( !isset( $session_userid ) ) { ?>
<?php } else { ?>

<?php if ( isset ( $userobject ) ) { echo $userobject['firstname']; } ?> | <?php echo $html->link(__('Sign out',true), array('controller' => 'users', 'action' => 'logout')); ?> | <?php } ?>

<?php if ( $locale != 'eng' || $locale == '' ) { ?>
<?php echo $html->link('English',array('controller' => 'starts', 'action' => 'index', 'code' => "eng")) . ' | '; ?>
<?php } ?>

<?php if ( $locale != 'deu' ) { ?>
<?php echo $html->link('Deutsch',array('controller' => 'starts', 'action' => 'index', 'code' => "deu")) . ' | '; ?>
<?php } ?>
</div>
-->

<!--
<ul>
<?php if ( !isset($session_userid) ) { ?>

<?php } ?>

<?php if ( $this->name == 'Competitions' ) { ?>

<?php } ?>
<?php if ( $this->name == 'Trainingplans' ) { ?>

<?php } ?>
<?php if ( $this->name == 'Trainingstatistics' ) { ?>

<?php } ?>
<?php if ( $this->name == 'Users' && $session_userid ) { ?>
        	
<?php } ?>
<?php if ( $this->name == 'Payments' ) { ?>

<?php } ?>
</ul>
<br />
-->

<?php } ?>
