<?php

namespace App\Http\Controllers;

use App\Models\Deparment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeparmentController extends Controller
{
    public function store(Request $request){
        $deparment = new Deparment;
        $deparment->title = $request->title;
        $deparment->save();
        return $deparment;
    }

    public function toSetpupInfo(Request $request){

        $dep_id = request()->department;
        $user = auth()->user();
        $user->deparment_id = $dep_id;
        $user->experience = request()->experience;

        if(request()->has('img')){
            $img_path = $request->file('img')->store('profile', 'public');
            $user->doctor_photo = $img_path;
        }
        /** @var \App\Models\User $user */
        $user->save();

        return redirect()->route('home');
    }
}
