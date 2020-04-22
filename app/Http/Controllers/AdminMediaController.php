<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminMediaController extends Controller
{
    //

    public function index(){

        $photo = Photo::all();

        return view ('admin.media.index',compact('photo'));
    }

    public function create(){

        return view('admin.media.create');
    }
    public function store(Request $request){
        $file= $request->file('file');
        $name = $file->getClientOriginalName();
        $file->move('images',$name);

        Photo::create(['file'=>$name]);

        return redirect('admin/media');


    }

    public function destroy($id){

        $photo= Photo::findOrFail($id);
        unlink(public_path().$photo->file);
        $photo->delete();
        Session::flash('deleted_at','the picture is deleted successfully');
        return redirect('/admin/media');


    }

}
