<?php

class User
{
	public $username;
	public $password;
	public $email;
	public $isLoggedIn = false;

	public function __construct($username,$password,$email)
	{
		$this->username = $username;
		$this->password = $password;
		$this->email = $email;
	}

	public function logIn(){
		if(!$this->$isLoggedIn)
		{
			$this->isLoggedIn = true;
		} else {
			echo "Youre already logged in!";
		}
	}

	public function logOut(){
		if($this->$isLoggedIn)
		{
			$this->isLoggedIn = false;
		} else {
			echo "Youre already logged out!";
		}
	}

	public function changePassword($oldPassword, $newPassword)
    {
        if($this->isLoggedIn && $oldPassword == $this->password) {
            $this->password = $newPassword;
        }
    }

  	
}