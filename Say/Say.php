<?php namespace Say;

use Say\Interfaces\Bar as Bar;
use Say\AbstractHello as AbstractHello;

abstract class Say extends AbstractHello implements Bar  {

	protected $to;

	/**
	 * Get hello
	 * @return string hello
	 */
	public function getHello(){
		return "Hello $this->to!";
	}
}