<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function store(Request $request)
{
    $request->validate([
        'gender' => 'required|in:1,2,3',
    ]);

    // 新しいユーザーを作成
    User::create([
        'gender' => $request->gender,
    ]);

    return redirect()->route('users.index');
}

}
