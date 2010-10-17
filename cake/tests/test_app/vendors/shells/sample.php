<?php
/* SVN FILE: $Id: sample.php,v 1.1 2010-07-12 19:52:09 klaus Exp $ */
/**
 * Short description for file.
 *
 * Long description for file
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) Tests <https://trac.cakephp.org/wiki/Developement/TestSuite>
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 *  Licensed under The Open Group Test Suite License
 *  Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          https://trac.cakephp.org/wiki/Developement/TestSuite CakePHP(tm) Tests
 * @package       cake
 * @subpackage    cake.tests.test_app.vendors.shells
 * @since         CakePHP(tm) v 1.2.0.7871
 * @version       $Revision: 1.1 $
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date: 2010-07-12 19:52:09 $
 * @license       http://www.opensource.org/licenses/opengroup.php The Open Group Test Suite License
 */
class SampleShell extends Shell {
/**
 * main method
 *
 * @access public
 * @return void
 */
	function main() {
		$this->out('This is the main method called from SampleShell');
	}
}