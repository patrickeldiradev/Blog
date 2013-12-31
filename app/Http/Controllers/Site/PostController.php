<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Posts\IndexPostsRequest;
use App\Repository\PostRepository;

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
        $posts = $this->postRepository->paginatedPosts();

        return view('site.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(int $postId)
    {
        $post = $this->postRepository->getPostById($postId);

        return view('site.posts.show', compact('post'));
    }
}
