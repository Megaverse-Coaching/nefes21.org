<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SoundscapeDataTable;
use App\Http\Controllers\Controller;
use App\Http\Traits\UploadImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Http\Requests\Admin\{StoreSoundscapeRequest, UpdateSoundscapeRequest};
use App\Models\Admin\{Soundscape, Admin};
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http\{JsonResponse, Response};
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class SoundscapeController extends Controller
{
    use uploadImage;

    /**
     * Display a listing of the resource.
     *
     * @param SoundscapeDataTable $dataTable
     * @return mixed
     */
    public function index(SoundscapeDataTable $dataTable): mixed
    {
        return $dataTable->render('admin.soundscape.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
//        $this->authorize('create soundscape', Soundscape::class);

        $narrators = Admin::role('narrator')->get();
        $soundscapes = Soundscape::where('status', 1)->get();
        return view('admin.soundscape._create', compact('narrators', 'soundscapes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSoundscapeRequest $request
     * @return JsonResponse
     */
    public function store(StoreSoundscapeRequest $request): JsonResponse
    {
        $item = Soundscape::firstOrNew(['id' => $request->id]);
        $info = array();

        foreach ($request->only(array_keys($request->rules())) as $key => $value) $info[$key] = $value;

        $info['status'] = $info['status'] ?? 0; $info['isValid'] = $info['isValid'] ?? 0; $info['isFree'] = $info['isFree'] ?? 0;

        $info['created_by'] = $info['updated_by'] = Auth::user()->id;

        $lastOrder = Soundscape::orderBy('order', 'desc')->first();
        $info['order'] = $lastOrder->toInteger + 1;
        if($request->hasFile(key: 'imgCover') ):
            $info['imgCover'] =  $this->createImage(
                name: "imgCover",
                dir: "storage/uploads/soundscape/$item->id/",
                file: $info["imgCover"],
                resize: ['w' => '1000', 'h' => '1000']);endif;

        if ($trackName = $this->uploadTracks(
            folder: "uploads/soundscape/$item->id",
            key: "soundscape",
            validation: 'required|mimes:mp3,m4a,mp4,m4r|max:50548|sometimes')):
            $info['track'] = $trackName; endif;


        $dt = Carbon::createFromTime(0000, 0, 0,  'Europe/Istanbul');
        $dt->addSeconds($info['duration']);
        $info['duration'] = date("H:i:s", strtotime($dt->format("H:i:s")));

        $item->fill($info)->save();


        return response()->json([
            "status" => true,
            "title" => $info['title'] . " adlı içerik eklendi!",
            "text" => "",
            "class" => "info",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id): Application|Factory|View
    {
        $sound = Soundscape::findOrFail($id);
        return view('admin.soundscapes._edit', compact('sound'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $sound = Soundscape::findOrFail($id);
        return view('admin.soundscape._edit', compact('sound'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSoundscapeRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateSoundscapeRequest $request, $id): JsonResponse
    {
        $item = Soundscape::findOrFail($id);

        $info = array();
        foreach ($request->only(array_keys($request->rules())) as $key => $value)  $info[$key] = $value;

        $info['status'] = $info['status'] ?? 0; $info['isValid'] = $info['isValid'] ?? 0; $info['isFree'] = $info['isFree'] ?? 0;

        if($request->hasFile(key: 'imgCover')  || $info['imgCover_remove'] == "1"):   $info['imgCover'] =     $this->createImage(name: "imgCover",    dir: "storage/uploads/soundscape/$item->id/", file: $info["imgCover"] ?? null,   resize: ['w' => '1000', 'h' => '1000'],  key: "soundscape", rm: $info['imgCover_remove']);endif;

        $info['updated_by'] = Auth::user()->id;

        $result = $item->update($info);

        return response()->json([
            "status" => $result,
            "message" => $info['title'] . " bilgilerini güncellediniz!",
            "class" => ($result) ? "info" : "error",
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
        $record = Soundscape::findOrFail($id);
        $record->deleted_at = now();
        $record->deleted_by = Auth::user()->id;
        $record->save();
        return true;
    }

}
