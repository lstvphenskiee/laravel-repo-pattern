<?php

namespace App\Interfaces;

interface PostRepositoryInterface
{
    public function getPost();

    public function findPost( $post_id );

    public function createPost( array $post_data );

    public function updatePost( $post_id, array $post_data );

    public function deletePost( $post_id );
}
