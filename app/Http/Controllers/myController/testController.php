<?php

namespace App\Http\Controllers\myController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function Index()
    {
        ///homepage
        return view('welcome');
    }
    public function About()
    {
        //about page

        return view('about');
    }
    public function Contact()
    {
        //contact page
        return view('contact');
    }
    public function Test()
    {
        //test page
        return view('test');
    }
}
