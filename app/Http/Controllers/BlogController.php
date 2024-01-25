<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Repositories\BlogRepositoryInterface;
use Illuminate\Http\Request;
use App\Helpers\ConstCommon;

class BlogController extends Controller
{
    protected $blogRepository;
    public function __construct(BlogRepositoryInterface $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        $data = $this->blogRepository->all();
        return view('admin.blog.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.blog.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $imageFields = ['headImg', 'img', 'likeImgList', 'lookImgList'];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $image = $request->file($field);
                $imageName = 'blog_' . ConstCommon::getCurrentTime() . '_' . $field .'.'. $image->extension();
                ConstCommon::addImageToStorage($image, $imageName);
                $data[$field] = $imageName;
            }
        }

        $data['id_user_create'] = auth()->user()->id;
        $this->blogRepository->create($data);
        return redirect()->route('blog.index')->with('success', 'Data created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $blog = $this->blogRepository->edit($id);
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        $imageFields = ['headImg', 'img', 'likeImgList', 'lookImgList'];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $image = $request->file($field);
                $imageName = 'blog_' . ConstCommon::getCurrentTime() . '_' . $field .'.'. $image->extension();
                ConstCommon::addImageToStorage($image, $imageName);
                $data[$field] = $imageName;
            }else {
                $blog = $this->blogRepository->find($id);
                $imageName = $blog->image; // Lấy giá trị của ảnh hiện tại
                $data[$field] = $imageName;
            }
        }

        $data['id_user_update'] = auth()->user()->id;
        $this->blogRepository->update($data, $id);
        return back()->with('success', 'Thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $this->blogRepository->delete($id);
        return back()->with('success', 'Thành công');
    }
}
