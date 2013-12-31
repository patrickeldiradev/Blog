<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Posts\IndexPostsRequest;
use App\Repository\PostRepository;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Cache;

use Illuminate\Support\Facades\Request;

use function view;

class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    public PostRepository $postRepository;

    public function __construct(PostRepository $repository)
    {
        $this->postRepository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(IndexPostsRequest $request)
    {
        $posts = Cache::remember($this->hashUrl(), 600, function () {
            return $this->postRepository->paginatedPosts();
        });

        return view('site.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $postId)
    {
        $post = Cache::remember($this->hashUrl(), 600, function () use($postId) {
            return $this->postRepository->getPostById($postId);
        });

        return view('site.posts.show', compact('post'));
    }

    /**
     * @param FormRequest $request
     * @return string
     */
    protected function hashUrl(): string
    {
        $url = request()->url();
        $queryParams = request()->query();
        ksort($queryParams);
        $queryString = http_build_query($queryParams);
        $fullUrl = "{$url}?{$queryString}";

        return sha1($fullUrl);
    }
}
