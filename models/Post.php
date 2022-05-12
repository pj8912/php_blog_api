<?php


class Post 
{

	private $conn;

	private $table = "posts"; // post table

	public $pid, $cid, $cname, $title, $body, $author, $created_at;

	public function __construct($db)
	{
		$this->conn  = $db;
	}

	public function getPosts()
	{
		$sql = "SELECT c.c_name , p.p_id,  p.cid, p.title, p.body, p.author, p.created_at FROM {$this->table} p LEFT JOIN categories c ON p.cid = c.c_id ORDER BY p.created_at DESC";
		$stmt = $this->conn->prepare($sql);
		$stmt->execute();
		return $stmt;
	}


	//get single post
	public function getPost()
	{
		$sql = "SELECT c.c_name , p.p_id,  p.cid, p.title, p.body, p.author, p.created_at FROM {$this->table} p LEFT JOIN categories c ON p.cid = c.c_id
		WHERE p.p_id = :p.p_id LIMIT 0,1";

		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(':p.p_id', $this->pid);
		$stmt->execute();

		//set values
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->title = $row['title'];
		$this->body = $row['body'];
		$this->author = $row['author'];
		$this->cid = $row['cid'];
		$this->cname = $row['c_name'];
		//or return $stmt;
	}

	public function createPost()
	{
		$sql = "INSERT INTO {$this->table}(cid, title, body, author) 
			VALUES(:cid, :title, :body, :author)";
		$stmt = $this->conn->prepare($sql);


		$stmt->bindParam(":cid", $this->cid);
		$stmt->bindParam(":title", $this->title);
		$stmt->bindParam(":body", $this->body);
		$stmt->bindParam(":author", $this->author);

		$stmt->execute();
	}

	public function updatePost()
	{
		$sql = "UPDATE {$this->table} SET cid=:cid, title =:title, body=:body, author=:author WHERE p_id = :p_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":cid", $this->cid);
		$stmt->bindParam(":title", $this->title);
		$stmt->bindParam(":body", $this->body);
		$stmt->bindParam(":author", $this->author);
		$stmt->bindParam(":p_id", $this->pid);

		$stmt->execute();
	}

	public function deletePost()
	{
		$sql = "DELETE FROM {$this->table} WHERE p_id = :p_id";
		$stmt = $this->conn->prepare($sql);
		$stmt->bindParam(":p_id", $this->pid);

		$stmt->execute();
	}
}
