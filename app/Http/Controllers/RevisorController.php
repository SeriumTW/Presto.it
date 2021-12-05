<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\RevisorMail;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class RevisorController extends Controller
{
    public function __construct(){
        $this->middleware('auth.revisor')->except('create', 'store');
    }

    public function index(){
        $announcement = Announcement::where('accepted', null)
        ->orderBy('created_at', 'DESC')
        ->first();
        return view('revisor.dashboard', compact('announcement'));
    }

    // accettare o rifiutare un annuncio
    public function setAccepted($id, $value){
        $announcement = Announcement::find($id);
        $announcement->accepted = $value;
        $announcement->modification_id = Auth::id(); 
        $announcement->save();
        
        return redirect(route('revisor.dashboard'));
    }

    public function accepted($id){
        return $this->setAccepted($id, true);
    }

    public function rejected($id){
        return $this->setAccepted($id, false);
    }

    // larvora con noi
    public function create(){
        return view('revisor.lavoraConNoi');
    }

    public function store(Request $request)
    {
        if($request->input('job') == 1){
            $user = Auth::user()->name;
            $email = Auth::user()->email;
            $job = 'Revisore';
            $description = $request->input('description');
            $userAuth = Auth::user();
            $userAuth->required_revisor = true;
            $userAuth->save();
            $user_contact = compact('user', 'email', 'job', 'description');
            Mail::to($email)->send(new RevisorMail($user_contact));
            return redirect(route('home'))->with('message', 'La tua richiesta è stata inviata');
        }
    }

    // cestino
    public function trashed(){
        $announcements=Announcement::where('accepted', false)->get();
        foreach($announcements as $announcement){
            if($announcement->modification_id == Auth::id()){
                $announcement->orderBy('created_at', 'DESC')->get();
            }
        }
        return view('revisor.trashed', compact('announcements'));
    }

}
