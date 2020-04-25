<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Photo;
use App\Http\Requests\UserEditRequest;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
//        //
        $users= User::all();
//        $user= Auth::user()->all();
        return view('admin.users.index',compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $role=Role::lists('name','id')->all();
        return view('admin.users.create',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
//       $user=User::create($request->all());
//       return redirect('/admin/user');
        if(trim($request->password) == ''){

            $input= $request->except('password');
        }
        else{

            $input= $request->all();
            $input['password']= bcrypt($request->password);

        }

        if($file=$request->file('photo_id')){
            $name= $file->getClientOriginalName();
            $file->move('images',$name);
           $photo = Photo::create(['file'=>$name]);

          $input['photo_id']=$photo->id;

        }

         User::create($input);
         return redirect('/admin/user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user=User::findOrFail($id);
        $roles= Role::lists('name','id')->all();
        return view('admin.users.edit',compact('user','roles'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        //


        $user= User::findOrFail($id);
        if(trim($request->password) == ''){

            $input= $request->except('password');
        }
        else{

            $input= $request->all();
            $input['password']= bcrypt($request->password);

        }

        if($file=$request->file('photo_id')){
            $name= $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id']= $photo->id;
        }
        $user->update($input);
        Session::flash('updated_user','the user has been updated');
        return redirect('admin/user');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       $user= User::findOrFail($id);
       if($user->photo) {
           unlink(public_path() . $user->photo->file);
       }
       $user->delete();

        Session::flash('deleted_user','the user has been deleted');
        return redirect('/admin/user');

    }
}
