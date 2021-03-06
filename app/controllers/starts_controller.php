<?php

class StartsController extends AppController 
{
	var $name = 'Starts';
	// use no model
	var $uses = null;
	var $useTable = false;

	var $helpers = array('Html', 'Form', 'Javascript', 'Time', 'Session', 'Unitcalc'); // 'TabDisplay',
	var $components = array('Cookie', 'RequestHandler', 'Session', 'Unitcalc', 'Filldatabase', 'Transactionhandler', 'Mailchimp' );

	function beforeFilter()
	{
  		parent::beforeFilter();
		$this->layout = 'default_trainer';	
	}

	function all_bootstrap ()
	{
		$this->layout = 'all_bootstrap';
	}

	function index( $language = '' )
	{
  		$this->layout = 'trainer_start';

      	$this->set("title_for_layout", __('Get Interactive Training Plans For Triathlon, Marathon And Bike Races', true));
		
		$session_userid = $this->Session->read('session_userid');

		// if user is logged in, we can save the current language settings
        if ( is_numeric($session_userid) ) 
        {
			// save language in user profile
			$this->loadModel('User');
			//$this->checkSession();

            $this->User->id = $session_userid;
			// $this->UserTemp = $this->User->read();
			
			if ( isset( $this->params['named']['code'] ) ) 
			{
				// UPDATE yourlanguage field
				$this->User->savefield('yourlanguage', $this->params['named']['code'], false);
			}
        }
		
		if ( isset( $this->params['named']['newsletter'] ) ) {
			$statusbox = '';
			$status = '';
		
			if ( $language == '' ) {   
				$language = Configure::read('Config.language');
				// echo "DEBUG in index config language " . $language;
			}

			// newsletter subscriber post
			if ( $this->data )
			{
				if (filter_var($this->data['Starts']['email'], FILTER_VALIDATE_EMAIL)) {
					$email = $this->data['Starts']['email'];
					if ( isset( $this->data['Starts']['firstname'] ) ) $firstname = $this->data['Starts']['firstname']; else $firstname = '';
					if ( isset( $this->data['Starts']['lastname'] ) ) $lastname = $this->data['Starts']['lastname']; else $lastname = '';
					$gender = '';
					$status = 'pending';

					if ( $_SERVER['HTTP_HOST'] != LOCALHOST ) {
						$this->Mailchimp->add_subscriber($email, $firstname, $lastname, $gender, $language, $status);
					}
					$this->Session->write('flash', __('Almost finished! You are receiving an activation email in your mailbox. Please click the link. Check your SPAM folder, in case you can not find it.', true));
					$statusbox = 'alert alert-success';
				} else {
					$this->Session->write('flash', __('Sorry, your email is not valid. Please correct it.', true));
					$statusbox = 'alert alert-danger';
				}
			}
			$this->set('statusbox', $statusbox);
			$this->set('status', $status);

		// referral send to page
		} elseif ( isset( $this->params['named']['u'] ) ) 
        {
            $transaction_id = $this->params['named']['u'];
			
			// information is saved in transactions
			$this->loadModel('Transaction');
	
			$transaction_content = $this->Transactionhandler->handle_transaction( $this->Transaction, $transaction_id, 'read' );
            $dt = unserialize($transaction_content['sm_recommend']);
			
			$distance = $dt['distance'];
			$duration = $dt['duration'];
			$distance_unit = $dt['distance_unit'];
			$sport = $dt['sport'];
			$userid = $dt['userid'];

			// create title
			$title = __('I did a', true) . ' ' . $distance . ' ' . $distance_unit . ' ' . 
				__($sport . ' workout', true) . ' ' . __('in',true) . ' ' . $duration . ' ' . 
				__('hour(s)',true) . ' ' . __('with', true) . ' ' . 'https://tricoretraining.com';
				 
			// read userinformation
			$this->loadModel('User');
			$results = $this->User->findById( $userid );
						
			$this->set('distance', $distance);
			$this->set('distance_unit', $distance_unit);
			$this->set('duration', $duration);
			$this->set('sport', $sport);
			$this->set('userinfo', $results['User']);
			$this->set('title', $title);
			
			$this->Session->write('recommendation_userid', $results['User']['id']);
					
        } elseif ( isset( $this->params['named']['ur'] ) ) 
        {
 			$userid = base64_decode( $this->params['named']['ur'] );
			$this->loadModel('User');
			$results = $this->User->findById( $userid );

			$this->set('userinfo', $results['User']);
			$this->Session->write('recommendation_userid', $results['User']['id']);
			
        // these users get money for new users
        } elseif ( isset( $this->params['named']['urm'] ) ) 
        {
 			$userid = base64_decode( $this->params['named']['urm'] );
			$this->loadModel('User');
			$results = $this->User->findById( $userid );

			$this->set('userinfo', $results['User']);
			$this->Session->write('recommendation_userid', 'money:' . $results['User']['id']);
			
		// corporate discounts
 		} elseif ( isset( $this->params['named']['c'] ) )
 		{
 			$company_email = base64_decode( $this->params['named']['c'] );
			//echo base64_encode( '@gentics.com' );
			if ( isset( $company_email ) )
			{ 
				$this->Session->write('recommendation_userid', $company_email);
				$this->set( 'companyinfo', $company_email );
			}
			
 		} elseif ( isset( $this->params['named']['discount'] ) )
 		{
 			$discount = $this->params['named']['discount'];
			if ( isset( $discount ) )
			{ 
				$this->Session->write('recommendation_userid', $discount);
				
				$this->set( 'companyinfo', $discount );
			}	
		// if user is logged in, then redirect
		} elseif ( is_numeric($this->Session->read('session_userid') ) )
        {
			// TODO check whether this could be a problem
			$this->Session->write('flash',__('You\'re redirected from our start page because you\'re already logged in.',true));
            $this->redirect('/trainingplans/view');
		}

		// in case your not logged in, remove blog cookie
		$this->Cookie->write(BLOGCOOKIE, "true", false, time() - 3600);
		$this->Cookie->delete(BLOGCOOKIE);
	}
  
	function error404()
	{
		header("HTTP/1.0 404 Not Found");
	}
  
	function features()
	{
		$this->set('statusbox', 'alert');
	}

	function change_language()
	{
		/*
		if ( isset( $this->params['named']['code'] ) ) 
			$this->code = $this->params['named']['code'];
		else
			$this->code = 'eng';

	    if ( $this->Session->read('session_userid') )
	    {
			$this->loadModel('User');
	
			$this->User->id = $this->Session->read('session_userid');
			$this->User->savefield('yourlanguage', $this->code, false);
	    }

		Configure::write('Config.language', $this->code);

		$this->Session->write('Config.language', $this->code);
		$this->Session->write('flash',__('Language setting changed.',true));

		if ( $this->referer() && $this->referer() != '/' )
		{
		    $this->redirect($this->referer());
	    } else
		{ 
	        $redirect_url = '/starts/index/code:'.$this->code;
			$this->redirect($redirect_url);
			die();
	    }
		*/
	}
	
	function coupon( $partner = '' )
	{
		$statusbox = 'alert';

		if (empty($this->data))
		{
			$this->data['Start']['partner'] = $partner; 

		} else
		{
			$partner = $this->data['Start']['partner'];

			if ( strlen( $this->data['Start']['coupon'] ) > 3 )
			{
				$this->Session->write('recommendation_userid', $this->data['Start']['partner'] . '-' . __('coupon', true) . ':' . $this->data['Start']['coupon']);
				
				$statusbox = 'alert alert-success';
				$this->Session->write('flash',__('Coupon code saved.', true) . 
					' <a href="/trainer/users/register/">' . __('Please signup right now!', true) . '</a>');				

				if ( $_SERVER['HTTP_HOST'] != LOCALHOST ) {
					mail('klaus@tricoretraining', 'Coupon registered: ' . $this->data['Start']['coupon'], '...', 'From:support@tricoretraining.com');
				}
			} else
			{
				$statusbox = 'alert alert-danger';
				$this->Session->write('flash',__('Please add a valid coupon code!', true));				
			}   
		}		
		$this->set('partner', $partner);
		$this->set('statusbox', $statusbox);
	}
}
?>
