<?php

namespace App\EntityManager;

use App\DTO\PostTransfer;
use App\Models\Post;

class PostEntityManager
{
    /**
     * @param PostTransfer $postTransfer
     * @return void
     */
    public function create(PostTransfer $postTransfer): void
    {
        $post = new Post();
        $post->title = $postTransfer->getTitle();
        $post->description = $postTransfer->getDescription();
        $post->publication_date = $postTransfer->getPublicationDate();
        $post->user_id = $postTransfer->getUserTransfer()->getId();
        $post->save();
    }
}
