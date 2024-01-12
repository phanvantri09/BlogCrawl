<?php

namespace App\Http\Controllers;

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

    public function __construct(UserRepositoryInterface $userRepository, ImageRepositoryInterface $imageRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->imageRepository = $imageRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        dd(123);
    }

    public function chatbox()
    {
        return view('user.layout.chatbox', compact([]));
    }
}
