<h1><?php __('Settings'); ?></h1>

<?php echo $this->element('js_error'); ?>

<?php 
echo $form->create('User', 
	array('action' => 'edit_traininginfo', 'type' => 'file'));
?>
<fieldset>
<legend><?php __('Fill in your training information'); ?></legend>

<?php if ($session->check('Message.flash')) { ?>
<div class="<?php echo $statusbox; ?>">
<?php $session->flash(); ?>
</div><br />
<?php } ?>

<?php
echo $form->hidden('id');
echo $form->hidden('birthday');

$sporttype_array = $sports;

echo $form->input('typeofsport',
                  array(
                  'legend' => false,
                  'class' => 'required',
                  'label' => __('Sport', true),
                  'before' => '',
                  'after' => '',
                  'between' => '',
                  'options' => $sporttype_array
));

echo $form->input('weeklyhours',
     array(
     'before' => '',
     'after' => '',
     'between' => '',
     'maxLength' => 255,
     'default' => '10',
     'class' => 'required',
     'error' => array( 
          'numeric' => __('Enter your weekly training hours', true),
          'greater' => __('Must be at least 0 hours',true),
          'lower' => __('Must be lower than 60 hours',true),
          'notempty' => __('Enter your weekly training hours',true) 
     ),
     'label' => __('Weekly hours', true)
));

?>
<span id="weeklyhours"></span>
<br />
<a name="zones"></a><h3><?php __('Zones'); ?></h3>

<div class="statusbox error" id="errorlth"></div>
<?php

$help_lth = '<span class="help" title="' . 
	__('Find your current lactate threshold value by performing the test workouts from your training schedule for each particular sport.', true) .
	'">?</span>';
echo $form->input('lactatethreshold',
                   array(
                   'before' => '',
                   'after' => $help_lth,
                   'between' => '',
                   'class' => 'required',
                   'maxLength' => 255,
                   'error' => array( 
                      'numeric' => __('Enter your current run lactate threshold',true),
                      'greater' => __('Must be at least 120',true),
                      'lower' => __('Must be lower than 220',true),
                      'notempty' => __('Enter your current run lactate threshold',true)
                   ),
                   //'error' => array('wrap' => 'div', 'style' => 'color:red'),
                   'label' => __('Run lactate threshold', true)
));
?>
<div class="statusbox error" id="errorblth"></div>
<?php
echo $form->input('bikelactatethreshold',
                   array(
                   'before' => '',
                   'after' => $help_lth,
                   'between' => '',
                   'class' => 'required',
                   'maxLength' => 255,
                   'error' => array( 
                      'numeric' => __('Enter your current bike lactate threshold',true),
                      'greater' => __('Must be at least 120',true),
                      'lower' => __('Must be lower than 220',true),
                      'notempty' => __('Enter your current bike lactate threshold',true)
                   ),
                   'label' => __('Bike lactate threshold', true)
));
/**

http://www.trainingbible.com/joesblog/2009/11/quick-guide-to-setting-zones.html
http://www.sport-fitness-advisor.com/anaerobicthreshold.html

Run Zones
Zone 1 Less than 85% of LTHR
Zone 2 85% to 89% of LTHR
Zone 3 90% to 94% of LTHR
Zone 4 95% to 99% of LTHR
Zone 5a 100% to 102% of LTHR
Zone 5b 103% to 106% of LTHR
Zone 5c More than 106% of LTHR

Bike Zones
Zone 1 Less than 81% of LTHR
Zone 2 81% to 89% of LTHR
Zone 3 90% to 93% of LTHR
Zone 4 94% to 99% of LTHR
Zone 5a 100% to 102% of LTHR
Zone 5b 103% to 106% of LTHR
Zone 5c More than 106% of LTHR
*/
?>

<br />
<div id="zones"></div>
<br />
<?php
echo $form->input('rookie',
                  array(
                  'before' => __('Are you a beginner in sports?', true),
                  'after' => '',
                  'between' => '',
                  'class' => 'required',
                  'label' => '',
                  'legend' => false,
                  'type' => 'checkbox',
                  //'multiple' => false,
                  'options' => array(
                            '1' => __('Yes',true),
                            '0' => __('No',true)
                  )
));

$tos_link = '<a href="/blog/';
if ( $locale == 'deu' ) $tos_link .= 'de/'; else $tos_link .= 'en/';
$tos_link .= 'terms-of-service-2/" target="_blank">' .
	__('Read our terms and conditions.',true) . '</a><br /><br />';

echo $form->input('tos',
                  array(
                  'before' => $tos_link . __("You agree to our terms and conditions and confirm that you're healthy enough for your training? If not, you HAVE TO talk to your doctor before starting your training!", true),
                  'after' => '',
                  'between' => '',
                  'legend' => false,
                  'label' => '',
                  'type' => 'checkbox',
                  'class' => 'required',
                  'default' => '0',
                  'options' => array(
                            '1' => __('Yes',true),
                            '0' => __('No',true)
                  )
));

echo '<br /><br />';
?>

<?php
echo '<br /><br />';

echo $form->submit(__('Save',true));

?>
                 <br />

                 </fieldset>

<?php
      echo $form->end();
?>

<?php

$this->js_addon = <<<EOE

<script type="text/javascript">

function finishAjax(id, response) 
{
         \$('#'+id).html(unescape(response));
         \$('#'+id).fadeIn();
}

EOE;

$this->js_addon .= '
function calculate_zones(lth) 
{
                   var zonestable = \'    \
' . __('Set these zones in your heart rate monitor!', true) . '<br /><br />'; 

$this->js_addon .= ' \
<table border="1" width="100%">          \
<tr>                                     \
    <th>' . __('Type',true) . '</th>                        \
    <th>' . __('Zone',true) . ' 1</th>                      \
    <th>' . __('Zone',true) . ' 2</th>                      \
    <th>' . __('Zone',true) . ' 3</th>                      \
    <th>' . __('Zone',true) . ' 4</th>                      \
    <th>' . __('Zone',true) . ' 5</th>                     \
</tr>                                    \
<tr>                                     \
    <td>' . __('Run',true) . ' </td>                        \
    <td> &lt; \' + parseInt( lth * 0.85 ) + \'</td>\
    <td> &lt; \' + parseInt( lth * 0.89 ) + \'</td>\
    <td> &lt; \' + parseInt( lth * 0.94 ) + \'</td>\
    <td> &lt; \' + parseInt( lth * 0.99 ) + \'</td>\
    <td> &gt; \' + parseInt( lth * 0.99 ) + \'</td>\
</tr>                                    \
<tr>                                     \
    <td>' . __('Bike',true) . ' </td>                       \
    <td> &lt; \' + parseInt( lth * 0.81 ) + \'</td>\
    <td> &lt; \' + parseInt( lth * 0.89 ) + \'</td>\
    <td> &lt; \' + parseInt( lth * 0.93 ) + \'</td>\
    <td> &lt; \' + parseInt( lth * 0.99 ) + \'</td>\
    <td> &gt; \' + parseInt( lth * 0.99 ) + \'</td>\
</tr>                                    \
</table>\';
          return zonestable;
}
';

$this->js_addon .= <<<EOF
function check_mhr(checkonly) 
{
                lth = parseInt( \$('#UserMaximumheartrate').val() );

                if ( isNaN(lth) || lth > 220 || lth < 120 ) {
                   \$('#errorlth').show();
                   \$('#errorlth').html('
EOF;

$this->js_addon .= __('Your maximum heart rate is not valid! Should be between 220 and 120.',true);

$this->js_addon .= <<<EOG
');
                } else
                {
                  lth = parseInt(lth * 0.85);
                  \$('#errorlth').hide();
                  \$('#errorblth').hide();

                  if ( \$('#UserLactatethreshold').val() == '' )
                        \$('#UserLactatethreshold').val(lth);

                  if ( \$('#UserBikelactatethreshold').val() == '' )
                        \$('#UserBikelactatethreshold').val(parseInt(lth*0.96));

                  if ( checkonly == false )
                  {
                     zonestable = calculate_zones( lth );
                     \$('#zones').html(zonestable);
                  }
                }
                return false;
}

/**
 * will check lactate threshold and bike lactate threshold values
 */
function check_lth() {
               var lth = parseInt( \$('#UserLactatethreshold').val() );
               var blth = parseInt( \$('#UserBikelactatethreshold').val() );

               if ( isNaN(lth) || lth > 220 || lth < 120 ) {
                            \$('#errorlth').show();
                            \$('#errorlth').html('
EOG;
$this->js_addon .= __('Your lactate threshold is not valid! Should be between 220 and 120.',true);
$this->js_addon .= <<<EOH
');
               } else {
                            \$('#errorlth').hide();
                            zonestable = calculate_zones( lth );
                            \$('#zones').html(zonestable);
               }

			   // check bike lactate threshold
               if ( isNaN(blth) || blth > 220 || blth < 120 ) {
                            \$('#errorblth').show();
                            \$('#errorblth').html('
EOH;
$this->js_addon .= __('Your bike lactate threshold is not valid! Should be between 220 and 120.',true);
$this->js_addon .= <<<EOH
');
               } else {
                            \$('#errorblth').hide();
                            \$('#zones').html(zonestable);
               }

               return false;
}

function setwhrs(val) 
{
	  //alert(val);
	  if ( val ) \$('#UserWeeklyhours').val(val);
      
      if ( \$('#UserWeeklyhours').val() != '' )
      {
          var whrs = \$('#UserWeeklyhours').val();
EOH;

$this->js_addon .= '
          var whrsmsg = "<br />' . __('Weekly training load varies between', true) . '"+" "+Math.round(whrs*0.7)+" "+"' .
            __('and', true) . '"+" "+Math.round(whrs*1.5)+" ' . __('hours',true).'.<br />"';

$this->js_addon .= <<<EOH
                      
                    \$('#weeklyhours').html(whrsmsg);
      }
      return false;
}

\$(document).ready(function() {
        var lth = parseInt( \$('#UserLactatethreshold').val() );
        //var mhr = parseInt( \$('#UserMaximumheartrate').val() );
        \$('#errorlth, #errorblth').hide();

        var zonestable = '';

        // display zones-table
        if ( lth != '' )
        {
                zonestable = calculate_zones( lth );
                \$('#zones').html(zonestable);
        }

  /**
	 * provide a basic number of weekly hours after
	 * the user has selected a sport
	 */
	\$('#UserTypeofsport').change(function () {
		var val;
		switch (this.value) {
			case 'TRIATHLON IRONMAN':
			case 'RUN ULTRA':
			case 'BIKE ULTRA':
				val = 12;
				break;
			case 'TRIATHLON HALFIRONMAN':
			case 'RUN MARATHON':
			case 'DUATHLON MIDDLE':
			case 'BIKE LONG':
				val = 8;
				break;
			case 'TRIATHLON OLYMPIC':
			case 'RUN HALFMARATHON':
			case 'DUATHLON SHORT':
			case 'BIKE MIDDLE':
				val = 6;
				break;
			case 'TRIATHLON SPRINT':
			case 'RUN 10K':
			case 'BIKE SHORT':
				val = 5;
				break;
			default:
				val = 4;
				break;
		}
		setwhrs(val);
	});

        \$('#UserWeeklyhours').blur(setwhrs());
        
        setwhrs();

        // set lth with calculated value
        \$('#UserMaximumheartrate').blur(function() {
                if ( \$('#UserLactatethreshold').val() != '' )
                {
                  check_lth();
                  // check only maximum heart rate for errors, do not regenerate zonestable
                  check_mhr(true);
                } else {
                  if ( \$('#UserMaximumheartrate').val() ) {
                     check_mhr();
                  }
                }
                return false;
        });

        \$('#UserLactatethreshold').blur(function() {
                if ( \$('#UserLactatethreshold').val() != '' )
                {
                   check_lth();
                }
                return false;
  		});

        // facebox box
        \$('a[rel*=facebox]').facebox();
		
		\$('.help').tipTip();

});

</script>

EOH;

?>