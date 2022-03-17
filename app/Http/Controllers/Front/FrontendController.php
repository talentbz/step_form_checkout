<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request){
        return view('front.pages.home.index', [

        ]);
    }
    public function faq(Request $request){
        return view('front.pages.faq.index', [
            
        ]);
    }
    public function work(Request $request){
        return view('front.pages.work.index', [
            
        ]);
    }
    public function price(Request $request){
        return view('front.pages.price.index', [
            
        ]);
    }
    public function contact(Request $request){
        return view('front.pages.contact.index', [
            
        ]);
    }
   
}
