<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function getPost() {
        return Post::latest()->get();
    }

    public function findPost($id) { 
        // return $this->model->findOrFail($id);
        return Post::find($id);
        
    }

    public function createPost(array $data) {
        // return $this->model->create($data);
        return Post::create($data);
    }

    public function updatePost($id, array $data) {
        // $post = $this->model->findOrFail($id);
        $post = Post::find($id);

        if(!$post) {
            return false; 
        }

        return $post->update($data);
    }

    public function deletePost($id) {
        // $del = $this->model->findOrFail($id);
        $del = Post::find($id);

        if(!$del) {
            return false;
        }

        return $del->delete();
    }
}