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
}