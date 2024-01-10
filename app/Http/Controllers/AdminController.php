<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\UserRepositoryInterface;
use App\Repositories\ImageRepositoryInterface;

class AdminController extends Controller
{
    //
    protected $userRepository;
    protected $imageRepository;

    public function __construct(UserRepositoryInterface $userRepository,
    ImageRepositoryInterface $imageRepository,
    )
    {
        $this->userRepository = $userRepository;
        $this->imageRepository = $imageRepository;

    }
    public function index()
    {
        $userRepository =
        $boxEventRepository =
        $boxRepository =
        $productRepository =
        $cartRepository =
        $transactionRepository = 0;
        // $userRepository = $this->userRepository->all()->count();
        // $userRepository = $this->userRepository->all()->count();
        // $userRepository = $this->userRepository->all()->count();
        return view('admin.dasboard', compact(['userRepository', 'boxEventRepository', 'boxRepository', 'productRepository', 'cartRepository', 'transactionRepository']));
    }
    public function docs()
    {
        return view('admin.docs');
    }

}
