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

	public function edit($id)
	{
		try {
			$sql = 'SELECT * FROM tb_cards WHERE id=:id';
			$data = $this->connection->prepare($sql);
			$data->execute([
				':id' => $id
			]);

			$row = $data->fetch();

			$this->id = $row['id'];
			$this->id = $row['set_id'];
			$this->id = $row['title'];
			$this->id = $row['description'];

			return $row;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function update($id, $set_id, $title, $description)
	{
		try {
			$sql = 'UPDATE tb_cards SET set_id=:set_id, title=:title, description=:description WHERE id=:id';
			$data = $this->connection->prepare($sql);
			$data->execute([
				':id' => $id,
				':set_id' => $set_id,
				':title' => $title,
				':description' => $description
			]);

			$row = $data->fetch();

			$this->id = $row['id'];
			$this->id = $row['set_id'];
			$this->id = $row['title'];
			$this->id = $row['description'];

			return $row;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function checkAnswers($card_set, $id, $answer)
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