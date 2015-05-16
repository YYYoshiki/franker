<?php

namespace Chat\ChatBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\table(name="Dat_login")
 */
class DatLogin{
	protected $attend_code;
	
	protected $password;
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="bigint")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $guest_num;
	
	protected $login_time;
	
	public function getAttend_code(){
		return $this->attend_code;
	}
	
	public function setAttend_code($attend_code){
		$this->attend_code = $attend_code;
	}
	
	public function getPassword(){
		return $this->password;
	}
	
	public function setPassword($password){
		$this->password = $password;
	}
	
	public function getGuest_num(){
		return $this->guest_num;
	}
	
	public function setGuest_num($guest_num){
		$this->guest_num = $guest_num;
	}
	
	public function getLogin_time(){
		return $this->login_time;
	}
	
	public function setlogin_time($login_time){
		$this->login_time = $login_time;
	}
	
}
