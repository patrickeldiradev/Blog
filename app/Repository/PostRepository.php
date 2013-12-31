<?php

namespace App\Repository;

use App\DTO\PostTransfer;
use App\Mapper\PostMapper;
use App\Models\Post;
use Illuminate\Support\Collection;

class PostRepository
{
    /**
     * @param int $id
     * @return PostTransfer
     */
    public function getPostById(int $id): PostTransfer
    {
        $postModel =  Post::findOrfail($id);
        $postMapper = new PostMapper([
            'id' => $postModel->id,
            'title' => $postModel->title,
            'description' => $postModel->description,
            'brief' => $postModel->description,
            'publication_date' => $postModel->publication_date,
            'user' => [
                'id' => $postModel->user->id,
                'name' => $postModel->user->name,
                'email' => $postModel->user->email,
                'type' => $postModel->user->type,
            ],
        ]);

        return $postMapper->mapToTransfer();
    }
    /**
     * @return Collection
     */
    public function paginatedPosts(): Collection
    {
        $postsPaginator =  Post::paginate();

        return $this->mapToCollectionTransfer(
            $postsPaginator->getCollection()
        );
    }

    /**
     * @param int $userId
     * @return mixed
     */
    public function paginateByUserId(int $userId): Collection
    {
        $postsPaginator =  Post::where('user_id', $userId)->paginate();

        return $this->mapToCollectionTransfer(
            $postsPaginator->getCollection()
        );
    }

    /**
     * @param Collection $collection
     * @return Collection
     */
    protected function mapToCollectionTransfer(Collection $collection): Collection
    {
        return $collection->collect()->map(function ($item) {
            $postMapper = new PostMapper([
                'id' => $item->id,
                'title' => $item->title,
                'description' => $item->description,
                'brief' => $item->description,
                'publication_date' => $item->publication_date,
                'user' => [
                    'id' => $item->user->id,
                    'name' => $item->user->name,
                    'email' => $item->user->email,
                    'type' => $item->user->type,
                ],
            ]);
            return $postMapper->mapToTransfer();
        });
    }
}
