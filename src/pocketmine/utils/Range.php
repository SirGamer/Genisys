<?php
/**
 * Author: PeratX
 * QQ: 1215714524
 * Time: 2016/2/1 8:54
 * Copyright(C) 2011-2016 iTX Technologies LLC.
 * All rights reserved.
 *
 * OpenGenisys Project
 */
namespace pocketmine\utils;

class Range{
	public $minValue;
	public $maxValue;

	public function __construct(int $min, int $max){
		$this->minValue = $min;
		$this->maxValue = $max;
	}

	public function isInRange(int $v) : bool{
		return $v >= $this->minValue && $v <= $this->maxValue;
	}
}