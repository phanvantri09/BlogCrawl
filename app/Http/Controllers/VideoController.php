<?php

namespace App\Http\Controllers;

use App\Http\Requests\Video\CreateRequestVideo;
use App\Http\Requests\Video\UpdateRequestVideo;
use App\Repositories\VideoRepository;
use App\Repositories\VideoRepositoryInterface;
use Illuminate\Http\Request;
use App\Helpers\ConstCommon;
class VideoController extends Controller
{
    protected $videoRepository;

    public function __construct(VideoRepositoryInterface $videoRepository)
    {
        $this->videoRepository = $videoRepository;
    }
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        $data = $this->videoRepository->all();
        return view('admin.video.list', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
        $video = $this->videoRepository->all();
        return view('admin.video.add', compact('video'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(CreateRequestVideo $request)
    {
        //
        $data = $request->all();
        if ($request->hasFile('headImg')) {
            $image = $request->file('headImg');
            $imageName = 'video_' . ConstCommon::getCurrentTime() . '.' . $image->extension();
            ConstCommon::addImageToStorage($image, $imageName);
            $data['headImg'] = $imageName;
        }
        $data['id_user'] = auth()->user()->id;
        $this->videoRepository->create($data);
        return redirect()->route('video.index')->with('success', 'data created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     */
    public function edit($id)
    {
        //
        $video = $this->videoRepository->edit($id);
        return view('admin.video.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     */
    public function update(UpdateRequestVideo $request, $id)
    {
        $data = $request->all();
        if ($request->hasFile('headImg')) {
            $image = $request->file('headImg');
            $imageName = 'video_' . ConstCommon::getCurrentTime() . '.' . $image->extension();
            ConstCommon::addImageToStorage($image, $imageName);
            $data['headImg'] = $imageName;
        }
        else {
            $video = $this->videoRepository->find($id);
            $imageName = $video->image; // Lấy giá trị của ảnh hiện tại
            $data['headImg'] = $imageName;
        }
        $this->videoRepository->update($data, $id);
        return back()->with('success', 'Thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     */
    public function destroy($id)
    {
        //
        $this->videoRepository->delete($id);
        return back()->with('success', 'Thành công');
    }
}