<?php

namespace App;
use \PDO;

class User 
{
    protected $id;
    protected $first_name;
    protected $last_name;
    protected $username;
    protected $email_address;
    protected $password;

    //Database
    protected $connection;

    public function __construct (
        $first_name = null,
        $last_name = null,
        $username = null,
        $email_address = null,
        $password = null
    ){
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->username = $username;
        $this->email_address = $email_address;
        $this->password = $password;
    }

    public function getId() {
        return $this->id;
    }

    public function getFirstName() {
        return $this->first_name;
    }

    public function getLastName() {
        return $this->last_name;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getEmailAddress() {
        return $this->email_address;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setConnection($connection) {
        $this->connection = $connection;
    }

    public function save() {

        try {
            $sql = "INSERT INTO tb_users SET first_name=:first_name, last_name=:last_name, username=:username, email_address=:email_address, password=:password";
            $statement = $this->connection->prepare($sql);

            return $statement->execute([
                ':first_name' => $this->getFirstName(),
                ':last_name' => $this->getLastName(),
                ':username' => $this->getUsername(),
                ':email_address' => $this->getEmailAddress(),
                ':password' => md5($this->getPassword()),
            ]);

        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }

    public function login($email, $password) {

        try {

            $sql = "SELECT * FROM tb_users WHERE email_address=:email_address AND password=:password";
            $statement = $this->connection->prepare($sql);
            $statement->execute([
                ':email_address' => $email_address,
                ':password' => md5($password),
            ]);

            $row = $statement->fetch();

            $this->id = $row['id'];
            $this->first_name = $row['first_name'];
            $this->last_name = $row['last_name'];
            $this->username = $row['username'];
            $this->email_address = $row['email_address'];
            $this->password = $row['password'];

            return $row;

        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }

    public function getUserCardSet($user_id){
		$sql = 'SELECT tb_users.first_name , tb_users.last_name, tb_sets.set_name, tb_sets.id
			FROM tb_users
			JOIN tb_sets
			ON tb_sets.user_id = tb_users.id
			WHERE tb_users.id=:user_id';

            $statement = $this->connection->prepare($sql);
            $statement->execute([
                ':user_id' => $user_id,
            ]);

            $data = $statement->fetchAll();
			return $data;
	}

    public function getTotalCards($set_id){
		$sql = 'SELECT COUNT(title) as total_cards
			FROM tb_cards
			WHERE set_id=:set_id';

            $statement = $this->connection->prepare($sql);
            $statement->execute([
                ':set_id' => $set_id,
            ]);

            $data = $statement->fetch();
			return $data;
	}




}