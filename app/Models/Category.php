<?php
namespace App\Models;

use PDO;

class Category extends BaseModel
{
    protected $table = "services";

    public function getAllCategory()
    {
        $sql = "SELECT * FROM services";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}