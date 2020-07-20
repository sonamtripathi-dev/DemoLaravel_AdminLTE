<?php

namespace App\Repositories;
use App\User;

class UserRepository implements UserRepositoryInterface
{
    private $model;

    public function __construct()
    {
        $this->model = User::class;
    }

    public function all() {
        return $this->model::all();
    }

    public function create($input) {
        return $this->model::create($input);
    }

    public function find($id) {
        return $this->model::findOrFail($id);
    }

    public function update($input, $id) {
        $model = $this->model::findOrFail($id);
        $model->fill($input);
        $model->save();
        return $model;
    }

    public function destroy($id) {
        $model = $this->model::findOrFail($id);
        $model->delete();
    }
}
