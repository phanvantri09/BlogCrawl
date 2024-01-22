<?php

namespace App\Http\Controllers;

use App\Repositories\PostRepositoryInterface;
use App\Repositories\VideoRepositoryInterface;
use Hashids\Hashids;
use Illuminate\Http\Request;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\ImageRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    protected $userRepository;
    protected $imageRepository;
    protected $postRepository;

    protected $videoRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        ImageRepositoryInterface $imageRepository,
        PostRepositoryInterface $postRepository,
        VideoRepositoryInterface $videoRepository
    ) {
        $this->userRepository = $userRepository;
        $this->imageRepository = $imageRepository;
        $this->postRepository = $postRepository;
        $this->videoRepository = $videoRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->postRepository->getLatestPosts(30);
        return view('user.page.home', compact(['posts']));
    }

    public function chatbox()
    {
        return view('user.layout.chatbox', compact([]));
    }
    public function complain()
    {
        return view('user.page.complain', compact([]));
    }
    public function video()
    {
        $videos = $this->videoRepository->All();
        $posts = $this->postRepository->getLatestPosts(30);
        return view('user.page.video', compact(['posts', 'videos']));
    }
    public function article()
    {
        return view('user.page.article_detail', compact([]));
    }
}
