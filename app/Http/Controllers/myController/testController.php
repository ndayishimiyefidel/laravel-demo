<?php

namespace App\Http\Controllers\myController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class testController extends Controller
{
    function Index()
    {
        ///homepage
        return view('welcome');
    }
    function About()
    {
        //about page

        return view('about');
    }
    function Contact()
    {
        //contact page
        return view('contact');
    }
}
