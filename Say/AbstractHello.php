<?php namespace Say;

use Say\Interfaces\Hello as Hello;

abstract class AbstractHello implements Hello {

	/**
	 * @var string
	 */
	protected $to;

	public function setHello($to=null){
		$this->to = $to;
		return $this;
	}
}