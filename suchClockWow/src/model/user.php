<?php
namespace src\model;

class User
{
	const NBCOL = 4;
	const ID = "id_us";
	const USERNAME = "username_us";
	const PASS = "pass_us";
	const HASH = "hash";
	
	private $id_us = -1;
	private $username_us = null;
	private $pass_us = null;
	private $hash = null;
	private $clocks;
	
	public function __construc()
	{
		$this->id_us = -1;
		$this->username_us = "";
		$this->pass_us = "";
		$this->hash = md5(uniqid(rand(), TRUE));
		$this->clocks[] = "";
	}
	
	public function setAll($id, $uname, $pass, $hash, $clocks)
	{
		$this->id_us = $id;
		$this->username_us = $uname;
		$this->pass_us = $pass;
		$this->hash = $hash;
		$this->clocks = $clocks;
	}
	
	public function getIdUs() {
		return $this->id_us;
	}
	public function setIdUs($id_us) {
		$this->id_us = $id_us;
		return $this;
	}
	public function getUsernameUs() {
		return $this->username_us;
	}
	public function setUsernameUs($username_us) {
		$this->username_us = $username_us;
		return $this;
	}
	public function getPassUs() {
		return $this->pass_us;
	}
	public function setPassUs($pass_us) {
		$this->pass_us = $pass_us;
		return $this;
	}
	public function getHash() {
		return $this->hash;
	}
	public function setHash($hash) {
		$this->hash = $hash;
		return $this;
	}
	public function getClocks() {
		return $this->clocks;
	}
	public function setClocks($clocks) {
		$this->clocks = $clocks;
		return $this;
	}
	public function addClock($clock)
	{
		$this->clocks[] = $clock;
	}
	public function removeClock($clock)
	{
		$index = 0;
		foreach ($this->clocks as $clk)
		{
			if($clk === $clock)
				break;
			$index += 1;
		}
		unset($this->clocks[index]);
	}
}
?>