<?php

namespace Chat\ChatBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\table(name="Dat_createclass")
 */
class DatCreateclass{

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $auto_num;

	/**
	 * @ORM\Column(type="string", length=30)
	 */
	protected $classname;

	/**
	 *  @ORM\Column(type="string",length=30)
	 */
	protected $classid;

	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $create_time;


	/**
	 * Get id
	 *
	 * @return integer
	 */
	public function getAuto_num(){
		return $this->auto_num;
	}

	/**
	 * Set id
	 *
	 * @return integer
	 */
	public function setAuto_num($auto_num){
		$this->auto_num = $auto_num;
	}

	/**
	 * Get classname
	 *
	 * @return string
	 */
	public function getClassname(){
		return $this->classname;
	}

	/**
	 * Set classname
	 *
	 * @return string
	 */

	public function setClassname($classname){
		$this->classname = $classname;
	}

	/**
	 * Get classid
	 *
	 * @return string
	 */

	public function getClassid(){
		return $this->classid;
	}

	/**
	 * Set classid
	 *
	 * 
	 * @return string
	 */
	public function setClassid($classid)
	{
		$this->classid = $classid;

		return $this;
	}

	/**
	 * Get create_time
	 *
	 * @return \DateTime
	 */
	public function getCreate_time()
	{
		return $this->create_time;
	}

	/**
	 * Set create_time
	 *
	 * @param \DateTime $create_time
	 * @return Chat
	 */
	public function setCreate_time($create_time)
	{
		$this->create_time = $create_time;

		return $this;
	}

}