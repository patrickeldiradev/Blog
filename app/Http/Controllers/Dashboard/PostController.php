<?php

namespace App\Http\Controllers\Dashboard;

use App\EntityManager\PostEntityManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\Posts\StorePostRequest;
use App\Jobs\ProcessStorePost;
use App\Repository\PostRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

use function view;

class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    public PostRepository $postRepository;

    /**
     * @param PostRepository $repository
     */
    public function __construct(PostRepository $repository)
    {
        $this->postRepository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $posts = $this->postRepository->paginateByUserId(
            auth()->id()
        );

        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Dashboard\Posts\StorePostRequest  $request
     * @return RedirectResponse
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        ProcessStorePost::dispatch($request->getRequestDataTransfer());

        return redirect(route('dashboard.post.index'))->with([
            'success_message' => __('Your new post is processing.')
        ]);
    }
}
