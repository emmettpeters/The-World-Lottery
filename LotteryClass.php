<?php

class Lottery
{
	public $title;
	public $description;
	public $initialValue;
	public $currentValue;
	public $startDate;
	public $endDate;
	public $image;
	public $participantUsernames;

	public function __construct($title,$description,$initialValue,$currentValue,$startDate,$endDate,$image)
	{
		$this->title = $title;
		$this->description = $description;
		$this->initialValue = $initialValue;
		$this->currentValue = $currentValue;
		$this->startDate = $startDate;
		$this->endDate = $endDate;
		$this->image = $image;
		$this->participantUsernames;
	}

	public function addTicketValue(){
		$this->currentValue += 1;
	}
}