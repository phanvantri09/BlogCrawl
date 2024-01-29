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

    public function __construct(
        UserRepositoryInterface $userRepository,
        ImageRepositoryInterface $imageRepository,
        PostRepositoryInterface $postRepository,
        VideoRepositoryInterface $videoRepository,
        ComplaintRepositoryInterface $complaintRepository,
        BrokerRepositoryInterface $brokerRepository,
        EconomicCalendarRepositoryInterface $economicRepository
    ) {
        $this->userRepository = $userRepository;
        $this->imageRepository = $imageRepository;
        $this->postRepository = $postRepository;
        $this->videoRepository = $videoRepository;
        $this->complaintRepository = $complaintRepository;
        $this->brokerRepository = $brokerRepository;
        $this->economicRepository = $economicRepository;
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
    public function article_detail()
    {
        return view('user.page.article_detail', compact([]));
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
    public function abc()
    {
        return view('user.page.login', compact([]));
    }
    public function def()
    {
        return view('user.page.register', compact([]));
    }
    public function og()
    {
        return view('user.page.infouser', compact([]));
    }
}
