<?php

namespace App\Http\Controllers;

// use App\Models\Users;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// Paginator


class UserController extends Controller
{
    public function showData (){
        $total = DB::table('users')->get();          
        $viewer = DB::table('users')->where('role','=','Viewer');          
        $editor = DB::table('users')->where('role','=','Editor');          
        $admin = DB::table('users')->where('role','=','Admin');          
        $users = DB::table('users')->paginate(10);
        return view('welcome',[
                                'data'=>$users,
                                'total'=>$total->count(),
                                'viewer'=>$viewer->count(),
                                'editor'=>$editor->count(),
                                'admin'=>$admin->count(),
                            ]);        
    }

    public function addData(Request $req){
        $user = DB::table("users")->insert([
            'name'=>$req->name,
            'email'=>$req->email,
            'phone'=>$req->phone,
            'role'=>$req->role,
        ]);

        if($user){
            return redirect()->route('home');
        }
    }

    public function viewData(string $id){
        $user = DB::table("users")->where('id',$id)->first();
        return view('view',['data'=>$user]);
    }

    public function updateData(string $id){
        $user = DB::table("users")->where('id',$id)->first();
        return view('update',['data'=>$user]);
    }

    public function updateUser(Request $req, string $id){
        $user = DB::table('users')->where('id',$id)->update([
            'name'=>$req->updatename,
            'email'=>$req->updateemail,
            'phone'=>$req->updatephone,
            'role'=>$req->updaterole,
        ]);
        if($user){
            return redirect()->route('home');
        }
    }

    public function deleteUser(string $id){
        $user = DB::table('users')->where('id',$id)->delete();
        if($user){
            return redirect()->route('home');
        }
    }
}
