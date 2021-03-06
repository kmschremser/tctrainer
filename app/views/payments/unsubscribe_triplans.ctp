      <div class="panel panel-default" id="forms">
        <div class="panel-heading"><h1><?php __('Unsubscribe PREMIUM membership'); ?></h1></div>
        
        <div class="panel-body">

             <?php echo $this->element('js_error'); ?>

             <?php echo $form->create('Payment', array('action' => 'unsubscribe_triplans','class' => 'form-horizontal')); ?>
             <fieldset>
             <legend><?php __('We are sorry to see you go :('); ?></legend>

             <?php if ($session->read('flash')) { ?>
             <div class="<?php echo $statusbox; ?>">
             <?php echo $session->read('flash'); $session->delete('flash'); ?>
             </div><br />
             <?php } ?>

             <div class="alert alert-success">
             <?php __('Your current membership is valid from'); echo ' ' . $paid_from . ' '; __('to'); echo ' ' . $paid_to; ?>.
             <?php __("You're a"); echo ' '; if ( $pay_member == 'freemember' ) echo __('FREE member'); else echo __('PREMIUM member'); ?>.
             </div><br />
             
             <div class="alert">
             <b><?php echo __('BEFORE you cancel, please tell us why you want to go or get in', true) . ' <a href="mailto:support@tricoretraining.com">' . __('contact with us', true) . '</a> - ' . __('we want to make you HAPPY again!', true); ?></b>
             </div>

             <div class="form-group">
<?php
                   echo $form->textarea('cancellation_reason',
                   array(
                         'rows' => '10',
                         'cols' => '45'
                   ));
                   echo $form->hidden('canceled');
?>
             </div>
             <br /><br />
             <?php __('You will be redirected to Paypal.com and please cancel your subscription there too. IMPORTANT! You cancel all payments in the future. Refunding of already paid fees is not possible. The current subscription will automatically end with'); ?> <?php echo ' ' . $paid_to; ?>.
             <br /><br />
<?php
                   $button_url = '/img/btn_unsubscribe_LG.gif';
                   
                   echo $form->submit($button_url);
?>

             <?php if ( $_SERVER['HTTP_HOST'] == LOCALHOST ) { ?>
             <br /><br />
             For Debugging (only localhost): PAYPAL - TEST<br />
             <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_subscr-find&alias=payment@tricoretraining.com" _fcksavedurl="https://www.paypal.com/cgi-bin/webscr?cmd=_subscr-find&alias=payment@tricoretraining.com"><img border="0" src="https://www.paypal.com/en_US/i/btn/btn_unsubscribe_LG.gif" /></a>
             <br /><br />
             <?php } ?> 
             </fieldset>

<?php
                echo $form->end();
?>
        </div>
      </div>

<?php

      $this->js_addon = <<<EOE
<script type="text/javascript">

/** initiate JQuery **/

\$(document).ready(function() {

        // facebox box
        //$('a[rel*=facebox]').facebox();

});

</script>

EOE;

?>