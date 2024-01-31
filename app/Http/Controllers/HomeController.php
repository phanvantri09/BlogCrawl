<?php

namespace App\Http\Controllers;

use App\Repositories\BrokerRepositoryInterface;
use App\Repositories\ComplaintRepositoryInterface;
use App\Repositories\EconomicCalendarRepository;
use App\Repositories\EconomicCalendarRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use App\Repositories\VideoRepositoryInterface;
use Illuminate\Http\Request;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\ImageRepositoryInterface;
use App\Repositories\CommentRepositoryInterface;
use App\Repositories\BlogRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ConstCommon;
use Illuminate\Support\Str;

use App\Helpers\ConstCommon;

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
        // dd($request->all());
        $chuthich = 0;
        $star = 0;

        $date = ConstCommon::getListDateEcomecy();
        $dateSelect = Carbon::now()->format('Y-m-d');
        if ($request->has('date')) {
            $dateSelect = $request->date ?? Carbon::now()->format('Y-m-d');
        }
        if ($request->has('chuthich')) {
            $chuthich = $request->chuthich;
        }
        if ($request->has('star')) {
            $star = $request->star;
            $data = $this->economicRepository->getbydate($dateSelect, $star);
            return view('user.page.economic', compact(['data', 'date', 'dateSelect', 'chuthich', 'star']));
        }
        $data = $this->economicRepository->getbydate($dateSelect);
        // $data = $this->economicRepository->getconomicByDate($request->date);
        return view('user.page.economic', compact(['data', 'date', 'dateSelect', 'chuthich', 'star']));

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

    public function login()
    {
        return view('user.page.login', compact([]));
    }

    public function register()
    {
        return view('user.page.register', compact([]));
    }

    public function addUserRegister( Request $request )
    { 
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        $data['code'] = Str::random(8);
        $this->userRepository->create($data);
        return redirect()->route('userLogin')->with('success', 'Thành công');

    }
    public function userinfo()
    {
        $user = auth()->id();
        $data = $this->userRepository->find($user);
        return view('user.page.infouser', compact('data'));
    }
    //update userinfo
    public function updateUserInfo(Request $request)
    {
        $id_user = auth()->id();
        $user = $this->userRepository->find($id_user);
        $data = $request->all();
        if ($request->has('image')) {
            $image = $request->file('image');
            $imageName = 'user_' . ConstCommon::getCurrentTime() . '.' . $image->extension();
            ConstCommon::addImageToStorage($image, $imageName);
            $data['image'] = $imageName;
        }
        else {
            $imageName = $user->image; // Lấy giá trị của ảnh hiện tại
            $data['image'] = $imageName;
        }

        $this->userRepository->update($data, $id_user);
        return back()->with('success', 'Thành công');
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
