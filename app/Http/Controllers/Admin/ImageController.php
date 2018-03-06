<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'isAdmin']);
    }

    /**
     * Create view file
     *
     * @return void
     */
    public function imageUpload()
    {
        return view('image-upload');
    }


    /**
     * Manage Post Request
     *
     * @return void
     */
    public function imageUploadPost(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $imageName);

        Image::create([
            'path' => $imageName,
        ]);

        return back()
            ->with('success','Image Uploaded successfully.')
            ->with('path',$imageName);
    }
}
