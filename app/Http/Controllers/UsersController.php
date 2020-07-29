<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
    public function store(Request $request)
    {
        $validate_rules = [
            'name' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        $validate_messages = [

            'name.required'=>'名前を入力してください',
            'name.max'=>'名前は50文字以内で入力してください',

            'email.required'=>'メールアドレスを入力してください',
            'email.max'=>'メールアドレスは255文字以内で入力してください',
            'email.unique'=>'そのメールアドレスは既に登録されています',
            
            'password.required'=>'パスワードを入力してください',
            'password.min'=>'パスワードは8文字以上の半角英数字で入力してください',
            'password.confirmed'=>'パスワードは同じものを入力してください',
            
            ];
        
            
        $params = $this->validate($request, $validate_rules, $validate_messages);

        User::create($params);

        $users = User::orderBy('id', 'asc')->paginate(5);

        return view('users.index', ['users' => $users]);
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
    public function updateUserName(Request $request, $id)
    {
        $validate_rules = [
            'name' => ['required', 'string', 'max:50'],
        ];

        $validate_messages = [

            'name.required'=>'名前を入力してください',
            'name.max'=>'名前は50文字以内で入力してください',
            ];
        
        $params = $this->validate($request, $validate_rules, $validate_messages);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->save();

        // $users = User::orderBy('id', 'asc')->paginate(5);
        
        return redirect("users/{$user->id}/edit")->with('flash_message', '名前を変更しました');
    }

    public function updateUserPassword(Request $request, $id)
    {
        $validate_rules = [
            'password' => ['required', 'string', 'min:8'],
        ];

        $validate_messages = [

            'password.required'=>'パスワードを入力してください',
            'password.min'=>'パスワードは8文字以上の半角英数字で入力してください',
        ];
        
        $params = $this->validate($request, $validate_rules, $validate_messages);

        $user = User::findOrFail($id);

        $user->password = $request->password;
        $user->save();

        return redirect("users/{$user->id}/edit")->with('flash_message', 'パスワードを変更しました');
    }

    // public function update(Request $request, $id)
    // {
    //     $validate_rules = [
    //         'name' => ['required', 'string', 'max:50'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8'],
    //     ];

    //     $validate_messages = [

    //         'name.required'=>'名前を入力してください',
    //         'name.max'=>'名前は50文字以内で入力してください',

    //         'email.required'=>'メールアドレスを入力してください',
    //         'email.max'=>'メールアドレスは255文字以内で入力してください',
    //         'email.unique'=>'そのメールアドレスは既に登録されています',
            
    //         'password.required'=>'パスワードを入力してください',
    //         'password.min'=>'パスワードは8文字以上の半角英数字で入力してください',
            
    //         ];
        
    //     $params = $this->validate($request, $validate_rules, $validate_messages);

    //     $user = User::findOrFail($id);

    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = $request->password;
        
    //     $user->save();

    //     $users = User::orderBy('id', 'asc')->paginate(5);



    //     return view('users.index', ['users' => $users]);

    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
