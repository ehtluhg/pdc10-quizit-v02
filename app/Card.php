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

	public function delete($id)
	{
		try {
			$sql = 'DELETE FROM tb_cards WHERE id=' . $id;
			$statement = $this->connection->query($sql);
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function checkAnswers($id)
	{
		try {
			$sql = 'SELECT * FROM tb_cards WHERE set_id=:set_id';
			$data = $this->connection->prepare($sql);
			$data->execute([
				':set_id' => $id,
			]);
			$cards = $data->fetchAll();
			return $cards;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function exportSet($card_set)
	{
		$sql = 'SELECT tb_cards.title as title, tb_cards.description as description, tb_sets.set_name as name
			FROM tb_cards
			INNER JOIN tb_sets
			ON tb_cards.set_id = tb_sets.id
			WHERE tb_cards.set_id=:set_id';

            $statement = $this->connection->prepare($sql);
            $statement->execute([
                ':set_id' => $card_set,
            ]);

            $cards = $statement->fetchAll();
			return $cards;
	}

	public function getBySet($set_id)
	{
		try {
			$sql = 'SELECT * FROM tb_cards WHERE set_id=:set_id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
                ':set_id' => $set_id,
            ]);
			$cards = $statement->fetchAll();
			return $cards;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getSetName($set_id)
	{
		try {
			$sql = 'SELECT set_name FROM tb_sets WHERE id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
                ':id' => $set_id,
            ]);
			$cards = $statement->fetch();
			return $cards;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
}