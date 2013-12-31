<?php

namespace App\Jobs;

use App\Enum\UserEnum;
use App\Models\Post;
use App\Services\PostSQService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class GetNewPostsJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $postsCollection = app(PostSQService::class)->fetch();

        DB::transaction(function () use ($postsCollection) {
            Post::insert(
                $this->prepareDate($postsCollection)
            );
        });
    }

    /**
     * @param Collection $postsCollection
     * @return array<mixed>
     */
    protected function prepareDate(array $postsCollection): array
    {
        $data = [];
        foreach ($postsCollection as $postTransfer) {
            $data[] = [
                'user_id' => UserEnum::ADMIN_ID,
                'title' => $postTransfer->getTitle(),
                'description' => $postTransfer->getDescription(),
                'publication_date' => $postTransfer->getPublicationDate(),
            ];
        }

        return $data;
    }
}
