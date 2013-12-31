<?php

namespace App\Services;

use App\Mapper\PostMapper;
use Carbon\Carbon;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

class PostSQService
{
    const GET_DATA_URL = 'https://candidate-test.sq1.io/api.php';
    const SLEEP_MILLI_SECONDS = 100;
    const RETRY_TIMES = 3;

    /**
     * @return array|null
     */
    public function fetch()
    {
        $response = $this->httpCall();

        if ($response->ok()) {
            return $this->mapToTransfer(
                $response->collect()->all()['articles']
            );
        }

        return null;
    }

    /**
     * @param string $symbol
     * @return Response
     */
    protected function httpCall(): Response
    {
        return Http::retry(
            static::RETRY_TIMES,
            static::SLEEP_MILLI_SECONDS
        )->get(static::GET_DATA_URL);
    }

    /**
     * @param array<mixed> $response
     * @param string $symbol
     * @return array
     */
    protected function mapToTransfer(array $response): array
    {
        $data  = [];
        foreach ($response as $item) {

            $date  = Carbon::create($item['publishedAt']);
            $mapper = new PostMapper([
                'id' => $item['id'],
                'title' => $item['title'],
                'description' => $item['description'],
                'brief' => $item['description'],
                'publication_date' => $date->format('y-m-d'),
            ]);
            $data[] = $mapper->mapToTransfer();
        }
        return $data;
    }
}
