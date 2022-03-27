<?php

namespace App\Repositories\Firebase;

use Kreait\Firebase\Database;

class Base
{
    /**
     * @var Database
     */
    protected $db;

    /**
     * @var string
     */
    protected $document;

    /**
     * @param Database $database
     */
    public function __construct(Database $database)
    {
        $this->db = $database;
    }

    protected function findAll(string $path)
    {
        return $this->db->getReference($path)->getValue();
    }

    protected function findAllFiltered(string $path, string $child, $value)
    {
        return $this->db->getReference($path)->orderByChild($child)->equalTo($value)->getValue();
    }

    protected function find(string $path, string $key)
    {
        return $this->db->getReference($path)->getChild($key)->getValue();
    }

    protected function push(string $path, array $input): ?string
    {
        $reference = $this->db->getReference($path)->push($input);

        return $reference->getKey();
    }

    protected function put(string $path, array $updates)
    {
        $reference = $this->db->getReference($path)->update($updates);

        return $reference->getKey();
    }

    protected function remove(string $path): ?string
    {
        $reference = $this->db->getReference($path)->remove();

        return $reference->getKey();
    }
}
