<?php

namespace App\Http\Controllers;



use session;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->except('index', 'locale', 'chiSiamo');
    }

    public function index(){
        $announcements = Announcement::where('accepted', true)
        ->orderBy('updated_at', 'DESC')
        ->take(4)
        ->get();
        
        return view('welcome', compact('announcements'));
    }

    public function chiSiamo(){
        return view('chi-siamo');
    }

    public function profile(){

        $announcementsTrue = Announcement::where('accepted', true)
        ->where('user_id', Auth::id())
        ->orderBy('created_at', 'DESC')->paginate(4);

        $announcementsFalse = Announcement::where('accepted', false)
        ->withTrashed()
        ->where('user_id', Auth::id())
        ->orderBy('created_at', 'DESC')->paginate(4);

        $announcementsNull = Announcement::where('accepted', null)
        ->where('user_id', Auth::id())
        ->orderBy('created_at', 'DESC')->paginate(4);

        return view('profile', compact('announcementsTrue', 'announcementsFalse', 'announcementsNull'));
    }

    public function locale($locale){

        session()->put('locale' , $locale);
        return redirect()->back();

    }
}
