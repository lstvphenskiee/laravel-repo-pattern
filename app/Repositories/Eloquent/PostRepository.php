<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    // protected $model;

    // public function __construct(Post $post_model) {
    //     $this->model = $post_model;
    // }

    public function getPost() {
        // return $this->model->all();
        return Post::latest()->get();
    }

    public function findPost($id) { 
        // return $this->model->findOrFail($id);
        return Post::findOrFail($id);
        
    }

    public function createPost(array $data) {
        // return $this->model->create($data);
        return Post::create($data);
    }

    public function updatePost($id, array $data) {
        // $post = $this->model->findOrFail($id);
        $post = Post::findOrFail($id);

        if(!$post) {
            return null; 
        }

        return $post->update($data);
    }

    public function deletePost($id) {
        // $del = $this->model->findOrFail($id);
        $del = Post::findOrFail($id);

        if(!$del) {
            return false;
        }

        return $del->delete();
    }
}