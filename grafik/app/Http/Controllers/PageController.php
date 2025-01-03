<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function contact() {
        return view('contact');
    }
    public function main() {
        return view('main');
    }
    public function login() {
        return view('login');
    }
    public function services(){
        return view('services');
    }
    public function about() {

        return view('about');}
}
