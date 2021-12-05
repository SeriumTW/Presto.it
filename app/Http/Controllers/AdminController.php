<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        $announcement = Announcement::where('accepted', null)
        ->orderBy('created_at', 'DESC')
        ->first();
        $users = User::where('required_revisor', true)->get();
        $usersRev = [];
        foreach($users as $user){
            if($user->is_revisor == null){
                $usersRev[] = $user;
            }
        }
        return view('admin.dashboard', compact('announcement', 'usersRev'));
    }

    public function setAcceptedRevisor($id, $value){
            $user = User::find($id);
            $user->is_revisor = $value;
            $user->save();
        return redirect(route('admin.dashboard'));
    }

    public function setAcceptedAnnouncementAdmin($id, $value){
        $announcement = Announcement::find($id);
        $announcement->accepted = $value;
        $announcement->modification_id = Auth::id(); 
        $announcement->save();
        
        return redirect(route('admin.dashboard'));
    }

    public function acceptedRevisor($id){
        return $this->setAcceptedRevisor($id, true);
    }

    public function rejectedRevisor($id){
        return $this->setAcceptedRevisor($id, false);
    }

    public function acceptedAnnouncementAdmin($id){
        return $this->setAcceptedAnnouncementAdmin($id, true);
    }

    public function rejectedAnnouncementAdmin($id){
        return $this->setAcceptedAnnouncementAdmin($id, false);
    }
}
