<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        $photo = new Photo;
        $photo->latitud = $request->input('Latitud');
        $photo->longitud = $request->input('Longitud');
        $photo->picture = $request->input('Picture');
           // return $request;
        if ($photo->save()) {
            return $photo;
        }
        throw new HttpException(400, "Invalid data");
    }

}
