<?php

namespace App\Http\Controllers\Front\Program;

use App\Http\Controllers\Controller;
use App\Models\Admin\Program;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $mainPrograms = Program::withoutTrashed()
            ->inRandomOrder()
//            ->with(relations: ['content.admin', 'showcase'])
//            ->orderBy('priority')
            ->get()
            ->toArray();

//        dd($mainPrograms);
        return view('front.program.index', compact(var_name: 'mainPrograms'));
    }
}
