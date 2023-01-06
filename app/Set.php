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

	public function edit($id)
	{
		try {
			$sql = 'SELECT * FROM tb_sets WHERE id=:id';
			$data = $this->connection->prepare($sql);
			$data->execute([
				':id' => $id
			]);

			$row = $data->fetch();

			$this->id = $row['id'];
			$this->id = $row['user_id'];
			$this->id = $row['set_name'];

			return $row;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function save($user_id, $set_name)
	{
		try {
			$sql = "INSERT INTO tb_sets SET user_id=:user_id, set_name=:set_name";
			$statement = $this->connection->prepare($sql);
            $statement->execute([
				':user_id' => $user_id,
				':set_name' => $set_name
			]);

            $id = $this->connection->lastInsertId();

            return $id;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

    public function update($id, $set_name)
	{
		try {
			$sql = 'UPDATE tb_sets SET set_name=:set_name WHERE id=:id';
			$data = $this->connection->prepare($sql);
			$data->execute([
				':id' => $id,
				':set_name' => $set_name,
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
	}

    public function delete($id)
	{
		try {
			$sql = 'DELETE FROM tb_sets WHERE id=' . $id;
			$statement = $this->connection->query($sql);
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

}
    ?>