<?php

namespace App\Repository;

use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;

class PostRepository
{

    /**
     * @param int $userId
     * @return mixed
     */
    public function paginateByUserId(int $userId): LengthAwarePaginator
    {
        return Post::where('user_id', $userId)->paginate();
    }
}
