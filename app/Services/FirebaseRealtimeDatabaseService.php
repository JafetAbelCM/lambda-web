<?php

namespace App\Services;

use Kreait\Firebase\Database;

class FirebaseRealtimeDatabaseService
{
    /**
     * @var Database
     */
    private $db;

    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    public function set(string $path, array $data): Database\Reference
    {
        return $this->db->getReference($path)->set($data);
    }

    public function fetch(string $path)
    {
        return $this->db->getReference($path)->getValue();
    }

    public function find(string $path, string $key)
    {
        return $this->db->getReference($path)->getChild($key)->getValue();
    }

    public function create(string $path, array $data): ?string
    {
        $reference = $this->db->getReference($path)->push($data);

        return $reference->getKey();
    }

    public function update(string $path, array $updates): ?string
    {
        $reference = $this->db->getReference($path)->update($updates);

        return $reference->getKey();
    }

    public function delete(string $path): ?string
    {
        $reference = $this->db->getReference($path)->remove();

        return $reference->getKey();
    }
}
