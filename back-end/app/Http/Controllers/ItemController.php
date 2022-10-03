<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ItemController extends Controller
{
   
    public function getItem(Item $item)
    {
        $item = Item::all();
        Log::info("Data".$item);
        return $item;
    }

    public function getLastItem(Item $item)
    {
        $item = Item::latest()->take(3)->get();

        return $item;
    }

    public function index()
    {
        $items = Item::all();
        return view('Item.view', compact('items','items'));
    }

   
    public function create()
    {
        return view('Item.create'); 
    }

    
    public function store(Request $request)
    {
            
        $request->validate([
            'item_name'=>'required',
            'price'=> 'required',
            'image' => 'required | max:2024'
        ]);

        //save file in aws
        $imageName = time().'.'.$request->image->extension();  
        $path = Storage::disk('s3')->put('items', $request->image);
        $path = Storage::disk('s3')->url($path);

        //save data in mongo db
        $item = new Item([
            'item_name' => $request->get('item_name'),
            'price'=> $request->get('price'),
            'note'=> $request->get('note'),
            'image_url'=> $path
        ]);
 
        $item->save();
        return redirect('/item')->with('success', 'Item has been created');
        
    }

    public function destroy(Item $item)
    {
        $item->delete();
        Storage::disk('s3')->delete($item->image_url);
        return redirect('/item')->with('success', 'Item deleted successfully');
    }
}
