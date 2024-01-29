<?php

namespace App\Http\Controllers;

use App\Repositories\BrokerRepositoryInterface;
use App\Repositories\ComplaintRepositoryInterface;
use App\Repositories\EconomicCalendarRepository;
use App\Repositories\EconomicCalendarRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\VideoRepositoryInterface;
use Hashids\Hashids;
use Illuminate\Http\Request;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\ImageRepositoryInterface;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\BlogRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    protected $userRepository;
    protected $imageRepository;
    protected $postRepository;
    protected $videoRepository;
    protected $complaintRepository;
    protected $brokerRepository;
    protected $economicRepository;
    protected $commentRepository;
    protected $blogsRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
        ImageRepositoryInterface $imageRepository,
        PostRepositoryInterface $postRepository,
        VideoRepositoryInterface $videoRepository,
        ComplaintRepositoryInterface $complaintRepository,
        BrokerRepositoryInterface $brokerRepository,
        EconomicCalendarRepositoryInterface $economicRepository,
        CommentRepositoryInterface $commentRepository,
        BlogRepositoryInterface $blogsRepository
    ) {
        $this->userRepository = $userRepository;
        $this->imageRepository = $imageRepository;
        $this->postRepository = $postRepository;
        $this->videoRepository = $videoRepository;
        $this->complaintRepository = $complaintRepository;
        $this->brokerRepository = $brokerRepository;
        $this->economicRepository = $economicRepository;
        $this->commentRepository = $commentRepository;
        $this->blogsRepository = $blogsRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $brokers = $this->brokerRepository->getLastedBroker(10);
        $posts = $this->postRepository->getLatestPosts(30);
        $economics = $this->economicRepository->getLatestEconomic(5);
        return view('user.page.home', compact(
            [
                'posts','brokers', 
                'economics'
            ]
        ));
    }

    public function chatbox()
    {
        return view('user.layout.chatbox', compact([]));
    }
    public function complain()
    {
        $economics = $this->economicRepository->getLatestEconomic(3);
        $complaints = $this->complaintRepository->getLatestComplaint(20);
        $posts = $this->postRepository->getLatestPosts(30);
        return view('user.page.complain', compact(['posts', 'complaints','economics']));
    }
    public function video()
    {
        $videos = $this->videoRepository->getLastedVideo(10);
        $posts = $this->postRepository->getLatestPosts(30);
        return view('user.page.video', compact(['posts', 'videos']));
    }
    public function article_detail(Request $request)
    {
        if ($request->has('id')) {
            $data = $this->postRepository->find($request->id);
            $comment =  $this->commentRepository->getCommentPostByid($request->id);
            return view('user.page.article_detail', compact(['data', 'comment']));
        } else {
            return redirect()->back();
        }
    }

    public function commentPost(Request $request){
        if (Auth::check()) {
            $id_user = Auth::user()->id;
            $data = array_merge($request->all(), ["id_user" =>$id_user]);
            $this->commentRepository->create($data);
            return redirect()->back()->with('success', "Bình luận thành công");
        } else {
            return redirect()->back()->with('error', "Cần phải đăng nhập");
        }
        
        
    }

    public function brokers(Request $request)
    {
        if ($request->has('hero')) {
            $brokers = $this->brokerRepository->getBrokerHero(20);
            $economics = $this->economicRepository->getLatestEconomic(5);
            $videos = $this->videoRepository->getLastedVideo(10);
            $posts = $this->postRepository->getLatestPosts(30);
            return view('user.page.broker', compact(['posts', 'videos','economics','brokers']));
        }
        $brokers = $this->brokerRepository->getLastedBroker(20);
        $economics = $this->economicRepository->getLatestEconomic(5);
        $videos = $this->videoRepository->getLastedVideo(10);
        $posts = $this->postRepository->getLatestPosts(30);
        return view('user.page.broker', compact(['posts', 'videos','economics','brokers']));
    }
    public function article()
    {
        $videos = $this->videoRepository->getLastedVideo(10);
        $posts = $this->postRepository->getLatestPosts(30);
        return view('user.page.article_view', compact(['posts', 'videos']));
    }
    public function economic(Request $request)
    {
        $videos = $this->videoRepository->getLastedVideo(10);
        $posts = $this->postRepository->getLatestPosts(30);
        return view('user.page.economic', compact(['posts', 'videos']));
    }

    public function brokers_detail()
    {
        $brokers = $this->brokerRepository->getLastedBroker(20);
        $economics = $this->economicRepository->getLatestEconomic(5);
        $firstVideo = $this->videoRepository->getFirstVideo();
        $firstComplaint = $this->complaintRepository->getFirstComplaint();
        $videos = $this->videoRepository->getLastedVideo(10);
        $posts = $this->postRepository->getLatestPosts(30);
        return view('user.page.broker_detail', compact(['posts', 'videos','firstComplaint','firstVideo','economics','brokers']));
    }

    public function blogs(Request $request)
    {
        $data = $this->blogsRepository->all();
        return view('user.page.blogs', compact(['data']));
    }
    public function blogs_detail(Request $request)
    {
        if ($request->has('id')) {
            $data = $this->blogsRepository->find($request->id);
            $comment =  $this->commentRepository->getCommentBlogByid($request->id);
            return view('user.page.blog_detail', compact(['data', 'comment']));
        } else {
            return redirect()->back();
        }
    }
}
