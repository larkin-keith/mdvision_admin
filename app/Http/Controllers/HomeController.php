<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\About;
use App\Contact;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = About::first();
        $contact = Contact::first();

        return view('home')->with('about', $about)->with('contact', $contact);
    }

    public function store(Request $request)
    {
        $data = $request->all();

        About::truncate();
        Contact::truncate();

        About::insert(['title' => $data['title'], 'content' => $data['content']]);
        Contact::insert(['address' => $data['address'], 'phone' => $data['phone'], 'email' => $data['email']]);

        return response()->json([]);
    }
}
