<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;
use App\Models\Channel;
use App\Http\Requests\ContactRequest;


class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $channels = Channel::all();
        return view('index', compact('categories','channels'));
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(
                'last_name',
                'first_name',
                'gender',
                'channel_ids',
                'email',
                'tel1',
                'tel2',
                'tel3',
                'address',
                'building',
                'category_id',
                'detail',
                'image_file',
            );

        if ($contact['gender'] == 1) {
        $contact['gender_text'] = '男性';
    } elseif ($contact['gender'] == 2) {
        $contact['gender_text'] = '女性';
    } elseif ($contact['gender'] == 3) {
        $contact['gender_text'] = 'その他';
    }

        $category = Category::find($request->category_id);
        $channels = Channel::find($request->channel_ids);
        $contact['image_file'] = $request->image_file->store('img', 'public');
        return view('confirm', compact('contact','category','channels'));
    }

    public function thanks(Request $request)

    {
        $contact = $request->only(
            [
                'last_name',
                'first_name',
                'gender',
                'channel_ids',
                'email',
                'tel',
                'address',
                'building',
                'category_id',
                'detail',
                'image_file',
            ]);
        Contact::create($contact);
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

    public function admin(Request $request)
    {
        $categories = Category::all();

        $contacts = Contact::Paginate(7);
        return view('admin', compact('contacts', 'categories'));
    }


    public function search(Request $request)
    {
    //     $contacts = Contact::with('category')->ContactSearch($request->category_id)->ContactSearch($request->keyword)
    //     ->paginate(7);

    //     $categories = Category::all();
    //     return view('admin', compact('contacts', 'categories'));
    // }

    if ($request->has('reset')) {
            return redirect('/admin')->withInput();
        }
        $query = Contact::query();

        $query = $this->getSearchQuery($request, $query);

        $contacts = $query->paginate(7);
        $csvData = $query->get();
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories', 'csvData'));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }

    private function getSearchQuery($request, $query)
    {
        if(!empty($request->keyword)) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('last_name', 'like', '%' . $request->keyword . '%')
                    ->orWhere('email', 'like', '%' . $request->keyword . '%');
            });
        }

        if (!empty($request->gender)) {
            $query->where('gender', '=', $request->gender);
        }

        if (!empty($request->category_id)) {
            $query->where('category_id', '=', $request->category_id);
        }

        if (!empty($request->date)) {
            $query->whereDate('created_at', '=', $request->date);
        }

        return $query;
    }

    public function store(Request $request)
    {
        $contact = Contact::create($request->only(
            [
                'last_name',
                'first_name',
                'gender',
                'channel_ids',
                'email',
                'tel',
                'address',
                'building',
                'category_id',
                'detail',
                'image_file',
            ])
        );
        $contact->channels()->sync($request->channel_ids);
        return view('thanks');
    }
}