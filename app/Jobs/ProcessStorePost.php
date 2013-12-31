<?php

namespace App\Jobs;

use App\DTO\PostTransfer;
use App\EntityManager\PostEntityManager;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessStorePost implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * @var PostTransfer
     */
    public PostTransfer $postTransfer;

    /**
     * @param PostTransfer $postTransfer
     */
    public function __construct(PostTransfer $postTransfer)
    {
        $this->postTransfer = $postTransfer;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        app(PostEntityManager::class)->create($this->postTransfer);
    }
}
