<?php

namespace App\Repositories;
use App\Models\Post;

class Repository 
{
    protected $model;

    public function __construct(Post $post) {
        $this->model = $post;
    }

    // function to get all
    public function getAll() {
        return $this->model->all();
    }

    public function findId($id) {
        return $this->model->find($id);
    }

    public function create(array $data) {
        return $this->model->create($data);
    }

    public function update($id, array $data) {
        $post = $this->model->findOrFail($id);
        $post->update($data);

        return $post;
    }

    public function delete($id) {
        return $this->model->destroy($id);
    }

    public function getLatest($n) {
        return $this->model->latest($n);
    }
}
