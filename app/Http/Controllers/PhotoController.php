<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Photo;


class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $photo;
    protected $id;
    public function __construct(Photo $photo){
        $this->photo =$photo;
    }
    public function index()
    {
        // get all photos
        $photo = Photo::all();
        return response()->json($photo, 200);
    }

    public function show($id)
    {
        // get the all photos by current user
        $photo = DB::table('photos')->where('user_id', $id)->get();
        return response()->json($photo, 200);
    }

    public function store(Request $request)
    {
        $photo = new Photo;
        $photo->latitud = $request->input('latitud');
        $photo->longitud = $request->input('longitud');
        $photo->picture = $request->input('picture');
        $photo->user_id = Auth::id();
           // return $request;
        if ($photo->save()) {
            return $photo;
        }
        throw new HttpException(400, "Invalid data");
    }

}
