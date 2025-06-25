<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\UploadImage;
use App\Models\Admin\Content;
use App\Models\Admin\Showcase;
use App\Models\Admin\TodayShowcase;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodayShowcasesController extends Controller
{

    use uploadImage;
    public function index()
    {
        $results = TodayShowcase::with(['content:id,title,imgShowcase', 'showcase:showcase,title'])->withoutTrashed()->orderBy('priority', 'desc')->get();
        $contents = Content::withoutTrashed()->activeContents(1)->pluck('title', 'id')->toArray();
        $showcases = Showcase::pluck('title', 'showcase')->toArray();
        return view('admin.today.showcases.index', compact('results', 'contents', 'showcases'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        // Yeni kayıt oluştur
        $record = new TodayShowcase();
        // Formdan gelen ve modeldeki 'fillable' alanlara ait veriler
        $info = $request->only($record->getFillable());
        $record->fill($info)->save();

        // Görsel varsa ya da görsel kaldırılacaksa
        if ($request->hasFile('imgShowcase') || $request->input('imgShowcase_remove') == '1') {
            $info['imgShowcase'] = $this->createImage(
                'imgShowcase',
                "storage/uploads/today-showcases/{$record->id}/",
                $info['imgShowcase'] ?? null,
                ['w' => '1600', 'h' => '700'],
                'imgShowcase',
                $request->input('imgShowcase_remove')
            );
        }

        $result = $record->fill([
            'created_by' => Auth::id(),
            'method'     => 'non-personalized',
            'imgShowcase'     => $info['imgShowcase'],
        ])->save();

        return response()->json([
            'status'  => $result,
            'message' => 'Yeni bilgileri eklediniz!',
            'class'   => $result ? 'info' : 'danger',
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResponse
     */
    public function show($id):JsonResponse
    {
        $result = TodayShowcase::withoutTrashed()->findOrFail($id);

        return response()->json([
            "result" => $result,
            "message" => "Güncelleme tamamlandı!",
            "class" => ($result) ? "info" : "error",
        ]);
    }

    public function edit(TodayShowcase $todayShowcase)
    {

    }

    public function update(Request $request, $id)
    {
        $record = TodayShowcase::findOrFail($id);

        $info = array();
        foreach ($request->only(array_values($record->getFillable())) as $key => $value) $info[$key] = $value;

        $info['isFree'] = $info['isFree'] ?? 0;
        $info['isValid'] = $info['isValid'] ?? 0;
        $info['updated_by'] = Auth::user()->id;

        $result = $record->fill($info)->save();
        return response()->json([
            "status" => $result,
            "message" =>"İçerik bilgileri güncellendi!",
            "class" => ($result) ? "info" : "danger",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return bool
     */
    public function destroy($id): bool
    {
        $record = TodayShowcase::findOrFail($id);
        $record->deleted_at = now();
        $record->deleted_by = Auth::user()->id;
        $record->save();
        return true;
    }
}
