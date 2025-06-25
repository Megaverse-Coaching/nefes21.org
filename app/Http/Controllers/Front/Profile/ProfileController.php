<?php

namespace App\Http\Controllers\Front\Profile;

use App\Http\Controllers\Controller;
use App\Models\Front\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index (){
        $id = Auth::user()->id;
        $infos = User::with('info')->where('id', $id)->get();
        return view('front.profile.index', ['infos' => $infos[0]]);
    }
}
