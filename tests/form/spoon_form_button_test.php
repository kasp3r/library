<?php

// spoon charset
if(!defined('SPOON_CHARSET')) define('SPOON_CHARSET', 'utf-8');

// includes
require_once 'spoon/spoon.php';
require_once 'PHPUnit/Framework/TestCase.php';

class SpoonFormButtonTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var	SpoonFormButton
	 */
	private $btnSubmit, $btnReset, $btnSpecial;


	/**
	 * @var	SpoonForm
	 */
	private $frm;


	/**
	 * Setup
	 *
	 * @return	void
	 */
	public function setup()
	{
		$this->frm = new SpoonForm('button');
		$this->btnSubmit = new SpoonFormButton('submit', 'Submit', 'submit');
		$this->btnReset = new SpoonFormButton('reset', 'Reset', 'reset');
		$this->btnSpecial = new SpoonFormButton('special', 'Special', 'button');
		$this->frm->add($this->btnSubmit, $this->btnReset, $this->btnReset);
	}

	public function testGetDefaultValue()
	{
		$this->assertEquals('Submit', $this->btnSubmit->getDefaultValue());
		$this->assertEquals('Reset', $this->btnReset->getDefaultValue());
		$this->assertEquals('Special', $this->btnSpecial->getDefaultValue());
	}

	public function testAttributes()
	{
		$this->btnSubmit->setAttribute('rel', 'bauffman.jpg');
		$this->btnReset->setAttribute('rel', 'bauffman.jpg');
		$this->btnSpecial->setAttribute('rel', 'bauffman.jpg');
		$this->assertEquals('bauffman.jpg', $this->btnSubmit->getAttribute('rel'));
		$this->assertEquals('bauffman.jpg', $this->btnReset->getAttribute('rel'));
		$this->assertEquals('bauffman.jpg', $this->btnSpecial->getAttribute('rel'));
		$this->btnSubmit->setAttributes(array('id' => 'specialID'));
		$this->btnReset->setAttributes(array('id' => 'specialID'));
		$this->btnSpecial->setAttributes(array('id' => 'specialID'));
		$this->assertEquals(array('id' => 'specialID', 'name' => 'submit', 'class' => 'inputButton', 'rel' => 'bauffman.jpg'), $this->btnSubmit->getAttributes());
		$this->assertEquals(array('id' => 'specialID', 'name' => 'reset', 'class' => 'inputButton', 'rel' => 'bauffman.jpg'), $this->btnReset->getAttributes());
		$this->assertEquals(array('id' => 'specialID', 'name' => 'special', 'class' => 'inputButton', 'rel' => 'bauffman.jpg'), $this->btnSpecial->getAttributes());
	}
}

?>