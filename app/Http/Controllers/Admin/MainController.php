<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Email;
use App\Models\Setting;
use Validator;

class MainController extends Controller
{
    public function index()
    {
        return redirect('admin/students');
    }

    public function profile()
    {
        $method = strtolower(request()->method());
        return $this->{"{$method}Profile"}();
    }

    protected function getProfile()
    {
        $user = request()->user();

        return view('admin.profile', compact('user'));
    }

    protected function postProfile()
    {
        $user = Admin::find(request()->user()->id);
        $data = request()->all();

        if (!$data['password']) unset($data['password']);
        if ($data['username'] == $user->username or !$data['username']) unset($data['username']);

        $validator = Validator::make($data, [
            'username' => 'sometimes|min:4|max:16|unique:admins',
            'password' => 'sometimes|min:6|max:255'
        ]);

        if ($validator->fails()) return redirect()->back()->withErrors($validator)->withInput();

        if (isset($data['password']))  $data['password'] = bcrypt($data['password']);

        foreach ($data as $key => $value)
        {
            if (isset($user->{$key}) && $user->{$key} != $value) $user->{$key} = $value;
        }

        $user->save();

        return redirect( route('admin.profile') )->with('success', true);
    }
}