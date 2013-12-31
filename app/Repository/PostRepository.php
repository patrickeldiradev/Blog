<?php

namespace App\Repository;

use App\DTO\AbstractTransfer;
use App\DTO\PostTransfer;
use App\DTO\UserTransfer;
use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class PostRepository
{

    public function getPostById(int $id): PostTransfer
    {
        return $this->mapToItemTransfer(Post::findOrfail($id));
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
            return $this->mapToItemTransfer($item);
        });
    }

    /**
     * @param Model $item
     * @return AbstractTransfer
     */
    protected function mapToItemTransfer(Model $item): AbstractTransfer
    {
        $postTransfer = new PostTransfer();
        $postTransfer->setId($item->id);
        $postTransfer->setTitle($item->title);
        $postTransfer->setDescription($item->description);
        $postTransfer->setBrief($item->brief);
        $postTransfer->setPublicationDate($item->publication_date);
        $postTransfer->setUserTransfer($this->createUserTransfer($item->user));

        return $postTransfer;
    }

    /**
     * @return UserTransfer
     */
    protected function createUserTransfer(Model $user): UserTransfer
    {
        $userTransfer = new UserTransfer();
        $userTransfer->setId($user->id);
        $userTransfer->setName($user->name);
        $userTransfer->setEmail($user->email);
        $userTransfer->setType($user->getType());

        return $userTransfer;
    }
}
