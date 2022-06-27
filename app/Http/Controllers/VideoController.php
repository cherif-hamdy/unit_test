<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'url' => 'required|url',
            'description' => 'sometimes'
        ]);

        $video = Video::create(array_merge($data, ['user_id' => 1, 'is_published' => 0 ]));

        return response($video, 201);
    }

    public function update($id, Request $request)
    {
        $video = Video::find('id', $id);
        $data = $this->validate($request, [
            'url' => 'required|sometimes',
            'description' => 'sometimes'
        ]);

        $video->update([
            'title' => $data['url'],
            'description' => $data['description']
        ]);

        return response($video, 200);
    }
}
