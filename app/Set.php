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

	public function getUserCardSet($user_id){
		$sql = 'SELECT COUNT(tb_cards.id) as total_cards, tb_users.first_name as first_name, tb_users.last_name as last_name, tb_sets.set_name as set_name
			FROM tb_users
			INNER JOIN tb_sets
			ON tb_users.id = tb_sets.user_id
            INNER JOIN tb_cards
            ON tb_sets.id = tb_cards.set_id
			WHERE tb_users.id=:user_id';

            $statement = $this->connection->prepare($sql);
            $statement->execute([
                ':user_id' => $user_id,
            ]);

            $userCards = $statement->fetchAll();
			return $userCards;
	}
}
    ?>