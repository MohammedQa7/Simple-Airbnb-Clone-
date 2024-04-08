<?php

namespace App\Http\Controllers;

use App\Mail\EmailInvoiceNotification;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $all_categories = Cache::remember('category_imgs' , Carbon::now()->addDays(4) , function(){
            return  Category::get();
        });

        
        // $two_week_before =
        return view('website.homepage')->with(['all_categories' => $all_categories]);
    }

    public function routeFailure()
    {
        return view('website.404-Page')->with('response_code' , '404');
    }
}
