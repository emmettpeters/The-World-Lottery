<?php

class Raffle
{
	protected $title;
	protected $description;
	protected $initialValue;
	protected $currentValue;
	protected $startDate;
	protected $endDate;
	protected $image;
	protected $participantIds = [];

	public function __construct($title,$description,$initialValue,$currentValue,$startDate,$endDate,$image)
	{
		$this->title = $title;
		$this->description = $description;
		$this->initialValue = $initialValue;
		$this->currentValue = $currentValue;
		$this->startDate = $startDate;
		$this->endDate = $endDate;
		$this->image = $image;
	}

	public function addTicketValue()
	{
		$this->currentValue += 1;
	}

	public function addUserIdToList($username){
		$this->participantIds[]=$username;
	}

	public function selectWinner(){
		if($this->endDate >= date()){
			$participantIds[]
		}
	}
}