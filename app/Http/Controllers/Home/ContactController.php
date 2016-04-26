<?php

namespace App\Http\Controllers\Home;

use App\Contact;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
    	$contact = Contact::first();

    	return view('home.contact')->with('contact', $contact);
    }
}
