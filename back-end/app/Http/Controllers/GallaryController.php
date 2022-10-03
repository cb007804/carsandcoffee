<?php

namespace App\Http\Controllers;

use App\Models\Gallary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;


class GallaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getGallary(Gallary $gallary)
    {
        $gallary = Gallary::all();

        return $gallary;
    }

    public function index()
    {
        $images = Gallary::all();
        return view('Gallary.view', compact('images','images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Gallary.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image_name'=>'required',
            'image' => 'required | max:2024'
        ]);

        //save file in aws
        $imageName = time().'.'.$request->image->extension();  
        $path = Storage::disk('s3')->put('gallary', $request->image);
        $path = Storage::disk('s3')->url($path);

        //save data in mongo db
        $gallary = new Gallary([
            'image_name' => $request->get('image_name'),
            'url'=> $path
        ]);
 
        $gallary->save();
        return redirect('/gallary')->with('success', 'Image has been added to gallary');
    }

    public function destroy(Gallary $gallary)
    {
        $gallary->delete();
        Storage::disk('s3')->delete($gallary->url);
        return redirect('/gallary')->with('success', 'Image deleted successfully');
    }
}
