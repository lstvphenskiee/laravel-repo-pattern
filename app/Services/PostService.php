<?php

namespace App\Services;

use App\Interfaces\PostRepositoryInterface;

class PostService
{
    protected $post;

    public function __construct(PostRepositoryInterface $postRepo) {
        $this->post = $postRepo;
    }

    public function getAllPost() {
        return $this->post->getPost();
    }

    public function getPostById($id) {
        return $this->post->findPost($id);
    }

    public function createPosts(array $data) {
        return $this->post->createPost($data);
    }

    public function updatePosts($id, array $data) {
        return $this->post->updatePost($id, $data);
    }

    public function deletePosts($id) {
        return $this->post->deletePost($id);
    }
}