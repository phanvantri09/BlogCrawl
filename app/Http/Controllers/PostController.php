<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\CreateRequestPost;
use App\Http\Requests\Post\UpdateRequestPost;
use App\Models\Post;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\PostRepositoryInterface;
use Illuminate\Http\Request;
use App\Helpers\ConstCommon;

class PostController extends Controller
{
    protected $postRepository;
    protected $categoryRepository;

    public function __construct(PostRepositoryInterface $postRepository, CategoryRepositoryInterface $categoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $data = $this->postRepository->all();
        return view('admin.post.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = $this->categoryRepository->all();
        return view('admin.post.add', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(CreateRequestPost $request)
    {
        //
        $data = $request->all();
        if ($request->hasFile('avt_image')) {
            $image = $request->file('avt_image');
            $imageName = 'post_' . ConstCommon::getCurrentTime() . '.' . $image->extension();
            ConstCommon::addImageToStorage($image, $imageName);
            $data['avt_image'] = $imageName;
        }
        $data['id_category'] = $request->id_category;
        $data['id_user_create'] = auth()->user()->id;
        $this->postRepository->create($data);
        return redirect()->route('post.index')->with('success', 'data created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     */
    public function edit($id)
    {
        //
        $category = $this->categoryRepository->all();
        $post = $this->postRepository->edit($id);
        return view('admin.post.edit', compact('post','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     */
    public function update(UpdateRequestPost $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('avt_image')) {
            $image = $request->file('avt_image');
            $imageName = 'post_' . ConstCommon::getCurrentTime() . '.' . $image->extension();
            ConstCommon::addImageToStorage($image, $imageName);
            $data['avt_image'] = $imageName;
        }
        else {
            $post = $this->postRepository->find($id);
            $imageName = $post->avt_image; // Lấy giá trị của ảnh hiện tại
            $data['avt_image'] = $imageName;
        }
    
        $this->postRepository->update($data, $id);
        return back()->with('success', 'Thành công');
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
