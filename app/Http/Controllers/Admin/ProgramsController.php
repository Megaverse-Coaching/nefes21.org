<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Author;
use App\Models\Admin\Product;
use App\Models\Admin\Program;
use Illuminate\Http\Request;

class ProgramsController extends Controller
{
    public function index()
    {
        $result = Program::withoutTrashed()
            ->with(["product"])
//            ->where('program_id', 301027)
            ->get(['program_id','title', 'partCount', 'isOnSale', 'isValid']);

        $authors = Author::withoutTrashed()->get(['author_id', 'name', 'surname'])
            ->map(fn ($item) => [ "id" => $item->author_id, "fullname" => $item->name . "" .$item->surname])
            ->toArray();

        $products = Product::withoutTrashed()
            ->where("product_type","program")
            ->where("product_group","main")
            ->get();

        $discounted = Product::withoutTrashed()->where('product_group', 'discounted')->get();

        $rate = ["0.1" => "10", "0.2" => "20", "0.3" => "30", "0.4" => "40", "0.5" => "50", "0.6" => "60", "0.7" => "70", "0.8" => "80", "0.9" => "90"];

        return view('admin.programs.index', compact([
            'result',
            'authors',
            'products',
            'discounted',
            'rate',
        ]));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
        $result = Program::withoutTrashed()
            ->with(["product", "programSections.parts"])
            ->where('program_id', $id)
            ->get(['version','discountRate', 'gains', 'sections', 'description', 'information', 'program_id', 'title', 'partCount', 'isOnSale', 'isValid', 'author_id', 'discountRate']);


        $sections = json_decode($result[0]->sections);

        $gains = $result->map(fn ($item) => [ "title" => $item['title'], "description" => $item['description'], "orderInSection" => $item['orderInSection']])->toArray();


        $parts = $result[0]->programSections
            ->map(fn ($itm) => [
                "order" => $itm->order,
                "section_id" => $itm->section_id,
                "section_title" => $itm->section_title,
                "program_id" => $itm->program_id,
                "parts" => $itm->parts
                ->map(fn ($prt) => [
                    "#" => $prt->order,
                    "Part ID" => $prt->part_id,
                    "Part Type" => $prt->type,
                    "Part Label" => $prt->label,
                    "Part Title" => $prt->title,
                    "Validation" => ($prt->isValid) ? 'Valid' : 'Invalid',
                ])]);


        return response()->json([
            "result" => $result,
            "gains" => $gains,
            "sections" => $sections,
            "parts" => $parts,
            "message" => "Güncelleme tamamlandı!",
            "class" => "info",
        ]);
    }

    public function edit(Program $program)
    {
    }

    public function update(Request $request, Program $program)
    {
    }

    public function destroy(Program $program)
    {
    }
}
