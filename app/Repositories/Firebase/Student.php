<?php

namespace App\Repositories\Firebase;

class Student extends Base
{
    protected $document = 'students';

    public function all()
    {
        return parent::findAll($this->document);
    }

    public function filtered(string $field, $value)
    {
        return parent::findAllFiltered($this->document, $field, $value);
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
