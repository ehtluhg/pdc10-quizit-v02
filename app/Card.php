<?php

namespace App;
use \PDO;

class Card
{
	protected $id;
	protected $set_id;
	protected $title;
    protected $description;
	// Database Connection Object
	protected $connection;

	public function __construct(
		$set_id = null,
		$title = null,
		$description = null, )
	{
		$this->title = $title;
        $this->description = $description;
		$this->set_id = $set_id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getCardSet()
	{
		return $this->set_id;
	}

	public function getTitle()
	{
		return $this->title;
	}

    public function getDescription()
	{
		return $this->description;
	}

	public function setConnection($connection)
	{
		$this->connection = $connection;
	}

	public function save()
	{
		try {
			$sql = "INSERT INTO tb_cards SET title=:title, description=:description, set_id=:set_id";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':title' => $this->getTitle(),
				':description' => $this->getDescription(),
				':set_id' => $this->getCardSet(),
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getAll()
	{
		try {
			$sql = 'SELECT * FROM tb_cards';
			$data = $this->connection->query($sql)->fetchAll();
			return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
}