
                   <h1><?php __('Send message'); ?></h1>

                   <?php echo $this->element('js_error'); ?>

                   <?php echo $form->create('User', array('action' => 'send_message')); ?>

                   <fieldset>
                   <legend><?php __('Send messages to specific users'); ?></legend>

                   <?php if ($session->check('Message.flash')) { ?>
                   <div class="<?php echo $statusbox; ?>">
                   <?php $session->flash(); ?>
                   </div><br />
                   <?php } ?>

<a href="/trainer/users/list_users">&raquo; <?php __('List users'); ?></a><br /><br />

<?php


if ( isset( $users_to_send ) ) 
{
	
	echo "<ul>";
	for( $i = 0; $i < count( $users_to_send ); $i++ )
	{
		$dt = ($users_to_send[$i]['users']);
		echo "<li>&quot;" . $dt['firstname'] . ' ' . $dt['lastname'] . ' <b>(' . $dt['yourlanguage'] . ')</b> &lt;' . $dt['email'] . '&gt;</li>';		
	}
	echo "</ul>";
	
	echo $form->hidden('users_to_send', array('value' => serialize($users_to_send)));
}

if ( !isset( $noform ) )
{
	echo $form->input('subject',
	     array(
	     'before' => '',
	     'after' => '',
	     'between' => '',
	     'maxLength' => 255,
	     'class' => 'required',
	     'label' => __('Subject', true)
	));

	__('Message');
	echo "<br />";
	
	echo $form->textarea('message',
	                  array(
	                  'rows' => '15',
	                  'cols' => '45'
	           ));
	
	
	echo "<br /><br />";
	echo $form->submit(__('Send', true));
	echo "<br />";
}

echo $form->hidden('submitted',array('value' => 1));

?>
                 </fieldset>

<?php
      echo $form->end();
?>

<?php

      $this->js_addon = <<<EOE
<script type="text/javascript">
/** initiate JQuery **/
\$(document).ready(function() {

}
</script>
EOE;

?>