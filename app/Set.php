<?php namespace App;
use \PDO;

class Set
{
	protected $id;
	protected $user_id;
	protected $set_name;
	// Database Connection Object
	protected $connection;

	public function __construct(
		$user_id = null,
		$set_name = null, )
	{
		$this->user_id = $user_id;
        $this->set_name = $set_name;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getUserId()
	{
		return $this->user_id;
	}

	public function getSetName()
	{
		return $this->set_name;
	}

	public function setConnection($connection)
	{
		$this->connection = $connection;
	}

}
    ?>