<?php

namespace App\Repositories\Firebase;

class University extends Base
{
    protected $document = 'universities';

    public function all()
    {
        return parent::findAll($this->document);
    }

    public function get(string $key)
    {
        return parent::find($this->document, $key);
    }

    public function create(array $input): ?string
    {
        return parent::push($this->document, $input);
    }

    public function update(string $key, array $updates): ?string
    {
        return parent::put($this->document . '/' . $key, $updates);
    }

    public function delete(string $key): ?string
    {
        return parent::remove($this->document . '/' . $key);
    }
}
