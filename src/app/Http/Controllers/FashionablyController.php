<?php

namespace App\Http\Controllers;

use App\Models\ProjectUser;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Contact;
use App\Models\Category;
use App\Models\User;

use App\Http\Requests\IndexRequest;
use Illuminate\Support\Facades\Auth;

class FashionablyController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', [
            'categories' => $categories,
        ]);
    }
    public function register()
    {    return view('/auth/register');

    }



    public function admin()
    {
        $contacts = Contact::Paginate(7);
        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }

    public function check(IndexRequest $request)
    {
        $form = $request->all();
        $fullTell = $request->input('tell_part1') . $request->input('tell_part2') . $request->input('tell_part3');
        $form['tel'] = $fullTell;
        $fullname = $request->input('first_name') . $request->input('last_name');
        $form['name'] = $fullname;
        return view('/confirm', ['form' => $form]);
    }
    public function back(Request $request)
    {
        $form = $request->except('_token');
        return view('index', ['form' => $form]);

    }
    public function store(Request $request)
    {
        $data = $request->except(['_token', 'action', 'name']);
        $genderMapping = [
            'male' => 1,
            'female' => 2,
            'other' => 3,
        ];
        $data['gender'] = $genderMapping[$data['gender']];

        Contact::create($data);
        return view('thanks');
    }

    public function return()
    {
        return view('index');
    }



    public function search(Request $request)
    {
        // 検索クエリを作成
        $query = Contact::query()
            ->when($request->filled('keyword'), function ($q) use ($request) {
                $q->keywordSearch($request->keyword);
            })
            ->when($request->filled('gender'), function ($q) use ($request) {
                $q->genderSearch($request->gender);
            })
            ->when($request->filled('category_id'), function ($q) use ($request) {
                $q->categorySearch($request->category_id);
            })
            ->when($request->filled('date'), function ($q) use ($request) {
                $q->dateSearch($request->date);
            });
        $contacts = $query->paginate(7)
            ->appends($request->except('page'));


        $categories = Category::all();
        return view('admin', compact('contacts', 'categories'));
    }

    public function remove(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/admin');
    }


}