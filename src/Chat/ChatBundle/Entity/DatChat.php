<?php

namespace Chat\ChatBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\table(name="Dat_chat")
 */
class DatChat{
	
	/**
	 * @ORM\Id
	 * @ORM\Column(type="bigint")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 */
	protected $auto_num;

	/**
	 * @ORM\Column(type="bigint")
	 */
	protected $par_id;

	/**
	 *  @ORM\Column(type="string",length=1000)
	 */
	protected $text;

	/**
	 * @ORM\Column(type="datetime")
	 */
	protected $post_time;

	/**
	 * @ORM\Column(type="integer")
	 */
	protected  $state_type;

	/**
	 * @ORM\Column(type="bigint")
	 */
	protected $attend_code;

	/**
	 * @ORM\Column(type="bigint")
	 */
	protected $num_sympathy;

	/**
	 * Get id
	 *
	 * @return bigint
	 */
	
	/**
	 *  @ORM\Column(type="string",length=30)
	 */
	protected $common_id;
	
	protected $parentcomment;
	protected $childcomment;
	
	public function getAuto_num(){
		return $this->auto_num;
	}

	/**
	 * Set id
	 *
	 * @return bigint
	 */
	public function setAuto_num($auto_num){
		$this->auto_num = $auto_num;
	}

	/**
	 * Get par_id
	 *
	 * @return bigint
	 */
	public function getPar_id(){
		return $this->par_id;
	}

	/**
	 * Set par_id
	 *
	 * @return bigint
	 */

	public function setPar_id($par_id){
		$this->par_id = $par_id;
	}

	/**
	 * Get text
	 *
	 * @return string
	 */

	public function getText(){
		return $this->text;
	}

	/**
	 * Set text
	 *
	 * @param string $text
	 * @return Chat
	 */
	public function setText($text)
	{
		$this->text = $text;

		return $this;
	}

	/**
	 * Get post_time
	 *
	 * @return \DateTime
	 */
	public function getPost_time()
	{
		return $this->post_time;
	}

	/**
	 * Set post_time
	 *
	 * @param \DateTime $post_time
	 * @return Chat
	 */
	public function setPost_time($post_time)
	{
		$this->post_time = $post_time;

		return $this;
	}

	/**
	 * Get state_tye
	 *
	 * @return integer
	 */
	public function getState_type()
	{
		return $this->state_type;
	}

	public function setState_type($state_type)
	{
		$this->state_type = $state_type;

		return $this;
	}

	/**
	 * Get attend_code
	 *
	 * @return bigint
	 */
	public function getAttend_code(){
		return $this->attend_code;
	}
	
	public function getParentcomment(){
		return $this->parentcomment;
	}
	
	public function getChildcomment(){
		return $this->childcomment;
	}
	
	public function setParentcomment($parentcomment){
		$this->parentcomment = $parentcomment;
	}
	
	public function setChildcomment($childcomment){
		$this->childcomment = $childcomment;
	}
	/**
	 * Set attend_code
	 *
	 * @return bigint
	 */

	public function setAttend_code($attend_code){
		$this->attend_code = $attend_code;
	}

	/**
	 * Get num_sympathy
	 *
	 * @return bigint
	 */
	public function getNum_sympathy(){
		return $this->num_sympathy;
	}

	/**
	 * Set num_sympathy
	 *
	 * @return bigint
	 */

	public function setNum_sympathy($num_sympathy){
		$this->num_sympathy = $num_sympathy;
	}
	
	public function getCommon_id(){
		return $this->common_id;
	}
	
	/**
	 * Set common_id
	 *
	 * @param string $common_id
	 * @return Chat
	 */
	public function setCommon_id($common_id)
	{
		$this->common_id = $common_id;
	
		return $this;
	}

}