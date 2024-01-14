<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Category;
use App\Models\Video;
use App\Models\License;
use App\Models\Post;

class SearchRepository implements SearchRepositoryInterface
{
    public function searchAll(string $query)
    {
        $users = User::where('name', 'like', "%$query%")->get();
        $categories = Category::where('name', 'like', "%$query%")->get();
        $videos = Video::where('title', 'like', "%$query%")->get();
        $licenses = License::where('name', 'like', "%$query%")->get();
        $posts = Post::where("title", "like", "%$query%")->get();

        return [
            'users' => $users,
            'categories' => $categories,
            'videos' => $videos,
            'licenses' => $licenses,
            'posts' => $posts
        ];
    }
}