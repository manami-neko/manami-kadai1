<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Models\User;
use App\Http\Requests\ContactRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;


class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(
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
                'detail',
            );

        if ($contact['gender'] == 1) {
        $contact['gender_text'] = '男性';
    } elseif ($contact['gender'] == 2) {
        $contact['gender_text'] = '女性';
    } elseif ($contact['gender'] == 3) {
        $contact['gender_text'] = 'その他';
    }
    // ddd($contact);
        $category = Category::find($request->category_id);
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
                'detail',
            ]);
        Contact::create($contact);
        // ddd($data);
        return view('thanks');
    }

    public function register(Request $request)
    {
        return view('register');
    }

    public function create(RegisterRequest $request)
    {
        User::create([
                'name' =>$request->name,
                'email' => $request->email,
                'password' =>$request->password,
            ]);

        return redirect('login');
        // ddd($data);
    }

    public function login(Request $request)
    {
        return view('login');
    }

    public function admin(LoginRequest $request)
    {
        $categories = Category::all();

        $contacts = Contact::Paginate(7);
        return view('admin', compact('contacts', 'categories'));
    }


    public function search(Request $request)
    {
        $contacts = Contact::with('category')->ContactSearch($request->category_id)->KeywordSearch($request->keyword)->paginate(7);

        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }
}