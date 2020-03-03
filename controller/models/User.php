<?php
class User
{
	private $username;
	private $password;
	private $fname;
	private $lname;
	private $email;
	private $address;
	private $contact;
    private $utype;
	// 1 -  active
	// 0 -  inactive
	private $ustatus;

	public function addUser(User user){

	}

	function getUsername()
	{
		return $this->username;
	}
	function getPassword()
	{
		return $this->password;
	}
	function getUtype()
	{
		return $this->utype;
	}
	function getFname()
	{
		return $this->fname;
	}
	function getLname()
	{
		return $this->lname;
	}
	function getEmail()
	{
		return $this->email;
	}
	function getAddress()
	{
		return $this->address;
	}
	function getContact()
	{
		return $this->contact;
	}
	function getStatus()
	{
		return $this->ustatus;
	}


	function setUsername($username)
	{
		$this->username = $username;
	}
	function setPassword($password)
	{
		$this->password = $password;
	}
	function setUtype($utype)
	{
		$this->utype = $utype;
	}
	function setFname($fname)
	{
		$this->fname = $fname;
	}
	function setLname($lname)
	{
		$this->lname = $lname;
	}
	function setEmail($email)
	{
		$this->email = $email;
	}
	function setAddress($address)
	{
		$this->address = $address;
	}
	function setContact($contact)
	{
		$this->contact = $contact;
	}
	function setStatus($ustatus)
	{
		$this->ustatus = $ustatus;
	}
}
?>