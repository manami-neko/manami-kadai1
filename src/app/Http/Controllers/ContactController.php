<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;


class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(Request $request)
    {
        $contact = $request->only(
            [
                'last_name',
                'first_name',
                'gender',
                'email',
                'tel1',
                'tel2',
                'tel3',
                'address',
                'building',
                'category_id',
                'detail'
            ]);

        if ($contact['gender'] == 1) {
        $contact['gender_text'] = '男性';
    } elseif ($contact['gender'] == 2) {
        $contact['gender_text'] = '女性';
    } elseif ($contact['gender'] == 3) {
        $contact['gender_text'] = 'その他';
    }

        $category = Category::find($request->category_id);
        // ddd($data);
        return view('confirm', compact('contact','category'));
    }

    public function thanks(Request $request)

    {
        $contact = $request->only(
            [
                'last_name',
                'first_name',
                'gender',
                'email',
                'tel',
                'address',
                'building',
                'category_id',
                'detail'
            ]);
        // ddd($data);
        Contact::create($contact);
        // ddd($data);
        return view('thanks');
    }

    public function register()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function admin(Request $request)
    {
        $contacts = Contact::all();
        $categories = Category::all();

        $contacts = Contact::Paginate(7);
        return view('admin', compact('contacts', 'categories'));
    }



//         public function store(Request $request)
// {
//     $request->validate([
//         'gender' => 'required|in:1,2,3',
//     ]);

//         // 新しいユーザーを作成
//     User::create([
//         'gender' => $request->gender,
//     ]);

//         return redirect()->route('users.index');
// }

}