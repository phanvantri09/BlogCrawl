<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRequestPost;
use App\Models\Post;
use App\Repositories\PostRepositoryInterface;
use Illuminate\Http\Request;
use App\Helpers\ConstCommon;

class PostController extends Controller
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        $data = $this->postRepository->all();
        return view('admin.post.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.post.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        if ($request->hasFile('avt_image')) {
            $image = $request->file('avt_image');
            $imageName = 'post_' . ConstCommon::getCurrentTime() . '.' . $image->extension();
            ConstCommon::addImageToStorage($image, $imageName);
            $data['avt_image'] = $imageName;
        }

        $this->postRepository->create($data);
        return redirect()->route('post.list')->with('success', 'data created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     */
    public function edit($id)
    {
        //
        $post = $this->postRepository->edit($id);
        dd($post);
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     */
    public function update(Request $request, $id)
    {
        //
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = 'user_' . ConstCommon::getCurrentTime() . '.' . $image->extension();
            ConstCommon::addImageToStorage($image, $imageName);
            $data['image'] = $imageName;
        }
       
            $data = [
                'title' => $request->title,
                'des_preview' => $request->des_preview,
                'description' => $request->description,
                'avt_image' => $imageName,
                'video' => $request->video,
                'birthday' => $request->address,
            ];
        
        $this->postRepository->update($data, $id);
        return redirect()->route('post.index')->with('success', 'data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->postRepository->delete($id);
        return back()->with('success', 'Thành công');
    }
}
