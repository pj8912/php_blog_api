<?php
class Category
{
    private $conn;
    public $cname, $cid;
    private $table  = "categories";
    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function getAllCategories()
    {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        return $stmt;
    }
}
