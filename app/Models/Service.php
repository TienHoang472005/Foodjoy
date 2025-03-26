<?php
namespace App\Models;

use PDO;

class Service extends BaseModel
{
    protected $table = "services";

    public function getAllService()
    {
        $sql = "SELECT services.*, categories.name as category_name
        FROM services
        JOIN categories ON services.category_id = categories.id
        ORDER BY services.id DESC";
        $stmt = $this->connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}