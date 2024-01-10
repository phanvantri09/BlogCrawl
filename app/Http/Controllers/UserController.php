<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepositoryInterface;
use App\Http\Requests\User\CreateRequestUser;
use Illuminate\Support\Facades\Hash;
use App\Helpers\ConstCommon;
use App\Models\User;

class UserController extends Controller
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function list($type)
    {
        $userGTs = [];
        if ($type == 3) {
            $users = $this->userRepository->getUserByTypeGT();
            $userGTs = [];

            foreach ($users as $key => $user) {
                if (!empty($user->id_user_referral)) {
                    $userRef = $user->id_user_referral;
                    $user = User::find($userRef);
                    $userGTs[$key] = $user->getAllReferringUsersGT();
                }
            }
        } else {
            $users = $this->userRepository->getUserByType($type);
        }

        return view('admin.user.list',compact(['userGTs', 'users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequestUser $request)
    {
        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'user_' . ConstCommon::getCurrentTime() . '.' . $image->extension();
            ConstCommon::addImageToStorage($image, $imageName);
            $data['image'] = $imageName;
        }

        $data['password'] = Hash::make($request->password);
        $data['id_user_referral'] = auth()->user()->id;
        
        $type = $request->type;
        $this->userRepository->create($data);
        return redirect()->route('user.list', ['type' => $type])->with('success', 'Thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        $user = $this->userRepository->showUpdate($data->id);
        return view('admin.user.show', compact(['data', 'user']));
    }

    public function edit($id)
    {

        $user = $this->userRepository->edit($id);
        return view('admin.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        i  $image = $request->file('image');
            $imageName = 'user_' . ConstCommon::getCurrentTime() . '.' . $image->extension();
            ConstCommon::addImageToStorage($image, $imageName);
           f ($request->hasFile('image')) {
           $data['image'] = $imageName;
        }
        if(empty($request->password)){
            $data = [
                'email' => $request->email,
                'type' => $request->type,
                'number_phone' => $request->number_phone,
                'image' => $imageName,
                'address' => $request->address,
                'birthday' => $request->address,
            ];
        }else{
            $data = [
                'email' => $request->email,
                'password' =>  Hash::make($request->password),
                'type' => $request->type,
                'number_phone' => $request->number_phone,
                'image' => $imageName,
                'address' => $request->address,
                'birthday' => $request->address,
            ];
        }

        $this->userRepository->update($data, $id);
        return back()->with('success', 'Thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserInfo  $userInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->userRepository->delete($id);
        return back()->with('success', 'Thành công');
    }



}
