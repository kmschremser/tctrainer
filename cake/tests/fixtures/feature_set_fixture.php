<?php
/* SVN FILE: $Id: feature_set_fixture.php,v 1.1 2010-07-12 19:51:33 klaus Exp $ */
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
 * @subpackage    cake.tests.fixtures
 * @since         CakePHP(tm) v 1.2.0.4667
 * @version       $Revision: 1.1 $
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date: 2010-07-12 19:51:33 $
 * @license       http://www.opensource.org/licenses/opengroup.php The Open Group Test Suite License
 */
/**
 * Short description for class.
 *
 * @package       cake
 * @subpackage    cake.tests.fixtures
 */
class FeatureSetFixture extends CakeTestFixture {
/**
 * name property
 *
 * @var string 'FeatureSet'
 * @access public
 */
	var $name = 'FeatureSet';
/**
 * fields property
 *
 * @var array
 * @access public
 */
	var $fields = array(
		'id' => array('type' => 'integer', 'key' => 'primary'),
		'name' => array('type' => 'string', 'null' => false)
	);
/**
 * records property
 *
 * @var array
 * @access public
 */
	var $records = array(
		array('name' => 'FeatureSet 1')
	);
}
?>
