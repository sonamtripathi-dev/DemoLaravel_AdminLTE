<?php

namespace App\Repositories;

interface UserRepositoryInterface
{
    public function all();

    public function create($input);

    public function find($id);

    public function update($input, $id);

    public function destroy($id);
}