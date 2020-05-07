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
        if($photo->file) {
            unlink(public_path() . $photo->file);
        }

        $photo->delete();
        Session::flash('deleted_at','the picture is deleted successfully');



    }

    public function deleteMedia(Request $request){

        if(isset($request->delete_single)){

            $this->destroy($request->photo);
            return redirect('/admin/media');

        }

        if(isset($request->delete_all) && !empty($request->checkBoxArray)){

            $photos = Photo::findOrFail($request->checkBoxArray);
            foreach ($photos as $photo) {

                $photo->delete();
            }
            return redirect()->back();
        }
        else{

            return redirect()->back();
        }



    }

}
