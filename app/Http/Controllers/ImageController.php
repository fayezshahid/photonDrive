<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Archive;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:100',
            'name' => 'nullable|string|max:255'
        ]);

        $data['name'] = $request->name;
        $data['size'] = $request->image->getsize();
        $data['user_id'] = auth()->user()->id;

        $image = Storage::disk('google')->putFile('', $request->image);
        $data['image'] = $image;
        $contents = collect(Storage::disk('google')->listContents('/'));
        $path = $contents->where('path', '=', $image)->first();
        $data['path'] = $path['extraMetadata']['id'];

        Image::create($data);
    }

    public function update(Request $request, $imageId)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
        ]);

        $data['name'] = $request->name;

        if($request->hiddenToken == 0)
        {
            $request->validate([
                'image' => 'required|mimes:png,jpg,jpeg|max:100',
            ]);

            $data['size'] = $request->image->getsize();

            $image = Image::find($imageId);
            Storage::disk('google')->delete($image->image);

            $image = Storage::disk('google')->putFile('', $request->image);
            $data['image'] = $image;
            $contents = collect(Storage::disk('google')->listContents('/'));
            $path = $contents->where('path', '=', $image)->first();
            $data['path'] = $path['extraMetadata']['id'];
        }

        $image = Image::find($imageId);
        $image->update($data);
    }

    public function addToTrash($imageId)
    {
        $image = Image::find($imageId);
        $image->inTrash = 1;
        $image->save();
    }

    public function arrangeImages($arrangeBy, $order)
    {
        if($arrangeBy == 'Date')
        {
            if(!$order)
                return Image::where('isArchived', 0)->where('inTrash', 0)->where('user_id', auth()->user()->id)->orderby('created_at')->get();
            else
                return Image::where('isArchived', 0)->where('inTrash', 0)->where('user_id', auth()->user()->id)->orderby('created_at', 'desc')->get();
        }
        else if($arrangeBy == 'A-Z')
        {
            if(!$order)
                return Image::where('isArchived', 0)->where('inTrash', 0)->where('user_id', auth()->user()->id)->orderby('name')->get();
            else
                return Image::where('isArchived', 0)->where('inTrash', 0)->where('user_id', auth()->user()->id)->orderby('name', 'desc')->get();
        }
        else if($arrangeBy == 'Size')
        {
            if(!$order)
                return Image::where('isArchived', 0)->where('inTrash', 0)->where('user_id', auth()->user()->id)->orderby('size')->get();
            else
                return Image::where('isArchived', 0)->where('inTrash', 0)->where('user_id', auth()->user()->id)->orderby('size', 'desc')->get();
        }
    }

}
