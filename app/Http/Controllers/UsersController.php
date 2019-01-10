<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Handlers\ImageUploadHandler;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'except' => ['show']
        ]);

    }

    public function show(User $user)
    {
        return view('users.show', compact('user'));

    }

    public function edit(User $user)
    {
        $this->authorize('update',$user);
        return view('users.edit', compact('user'));
    }


    public function update(UserRequest $request, ImageUploadHandler $uploader, User $user)
    {
        $this->authorize('update',$user);
        //$user->update($request->all());
        $data = $request->all();

        //如果上传了头像
        if ($request->avatar) {
            //尝试保存头像并返回保存目录
            $result = $uploader->save($request->avatar, 'avatars', $user->id, 416);
            //成功之后, 写入数组
            if ($result) {
                $data['avatar'] = $result['path'];
            }
        }
        //写库
        $user->update($data);
        return redirect()->route('users.show', $user->id)->with('success', '个人资料更新成功！');
    }

}
