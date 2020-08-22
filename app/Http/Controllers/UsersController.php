<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Http\Requests\UsersRequest;
use App\Http\Requests\UserNameRequest;
use App\Http\Requests\UserEmailRequest;
use App\Http\Requests\UserPasswordRequest;



class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // ユーザー一覧表示(5件)用データ取得
        $users = User::orderBy('id', 'asc')->paginate(5);

        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request) {

        // ユーザー情報を配列化
        $params['name'] = $request->name;
        $params['email'] = $request->email;
        $params['password'] = Hash::make($request->password);
        
        // Userモデルに書き込み
        User::create($params);
        
        // ユーザー一覧表示(5件)用データ取得
        $users = User::orderBy('id', 'asc')->paginate(5);

        return view('users.index', ['users' => $users]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // ユーザー情報取得
        $user = User::findOrFail($id);

        return view('users.edit', ['user' => $user ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUserName(UserNameRequest $request, $id)
    {
        // ユーザー情報取得
        $user = User::findOrFail($id);

        // ユーザー名書き込み更新
        $user->name = $request->name;
        $user->save();

        return redirect("users/{$user->id}/edit")->with('flash_message', '名前を変更しました');
    }

    public function updateUserPassword(UserPasswordRequest $request, $id)
    {
        // ユーザー情報取得
        $user = User::findOrFail($id);

        // パスワード更新
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect("users/{$user->id}/edit")->with('flash_message', 'パスワードを変更しました');
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // ユーザー情報取得
        $user = User::findOrFail($id);

        // ユーザー削除
        $user->delete();        
        
        // 削除メッセージ
        $message = $user->name . 'を削除しました。';

        return back()->with('flash_message', $message);

    }
}
