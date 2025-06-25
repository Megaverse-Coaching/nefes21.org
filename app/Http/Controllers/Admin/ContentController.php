<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\CarbonInterval;
use App\Models\Admin\{Author, Content, Admin};
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\Http\Traits\UploadImage;

use App\DataTables\{ContentsDataTable, PublishedContentsDataTable, DeletedContentsDataTable};
use App\Http\Requests\Admin\{UpdateContentRequest,StoreContentRequest};
use Illuminate\Contracts\{Foundation\Application, View\Factory, View\View};
use Illuminate\Http\{Request, JsonResponse};
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{

    use uploadImage;

    /**
     * Display a listing of the resource.
     *
     * @param ContentsDataTable $contentsDataTables
     * @param PublishedContentsDataTable $PublishedDataTable
     * @param DeletedContentsDataTable $deletedContentDataTable
     * @return Application|Factory|View
     */
    public function index(ContentsDataTable $contentsDataTables, PublishedContentsDataTable $PublishedDataTable, DeletedContentsDataTable $deletedContentDataTable)
    {
        return view('admin.contents.index', [
            'publishedContents' => $PublishedDataTable->html(),
            'draftedContents' => $contentsDataTables->html(),
            'deletedContents' => $deletedContentDataTable->html(),
        ]);
    }

    /**
     * Display a listing of the resource.
     * @param ContentsDataTable $datatable
     * @param int $status
     * @return mixed
     */
    public function getPublished(ContentsDataTable $datatable, int $status): mixed
    {
        return $datatable->with('status', $status)->render('admin.contents.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @param ContentsDataTable $datatable
     * @param int $status
     * @return mixed
     */
    public function getContents(ContentsDataTable $datatable, int $status): mixed
    {
        return $datatable->with('status', $status)->render('admin.contents.index');
    }

    /**
     * Display a listing of the resource.
     * @param DeletedContentsDataTable $dataTable
     * @return mixed
     */
    public static function getTrashed(DeletedContentsDataTable $dataTable): mixed
    {
        return $dataTable->render('admin.contents.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $authors = Author::withoutTrashed()->get();

        return view('admin.contents._create', compact('authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreContentRequest $request
     * @param Content $content
     * @return mixed
     */
    public function store(StoreContentRequest $request, Content $content)
    {
        $request->except('_method', '_token', 'showcase_remove', 'cover_remove');
        $content = $content::firstOrNew(['id' =>  $request->id]);
        $info = array();
        foreach ($request->only(array_values($content->getFillable())) as $key => $value) $info[$key] = $value;

        $info['isFree']     = $info['isFree'] ?? 0;
        $info['isValid']    = $info['isValid'] ?? 0;
        $info['isNew']      = $info['isNew'] ?? 0;
        $info['status']     = $info['status'] ?? 0;
        $info['type']       = json_encode($info['type']);

        $info['created_by'] = $info['updated_by'] = Auth::user()->id;


        $info['imgCover'] = $this->createImage(name: $info['id']."_imgCover", dir: "storage/uploads/contents/", file: $info['imgCover'], resize: ['w' => '1000', 'h' => '750']);
        $info['imgShowcase'] = $this->createImage(name: $info['id']."_imgShowcase", dir: "storage/uploads/contents/", file: $info['imgShowcase'], resize: ['w' => '2000', 'h' => '1500']);

        $content->fill($info)->save();

        return redirect()->route('admin.contents.show', [$content->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     * @throws \Exception
     */
    public function show($id):Application|Factory|View
    {
        $content = Content::findOrFail($id);
        $tracks = $content->tracks;
        $user = $content->admin;
        $authors = Author::withoutTrashed()->get();
        return view('admin.contents._show', compact('content', 'authors', 'user', 'tracks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id): View|Factory|Application
    {
        $content = Content::findOrFail($id);
        $tracks  = $content->tracks;
        $user    = $content->admin;
        $authors = Author::withoutTrashed()->get();

        $totalMin = 0;
        foreach ($tracks as $track)
        {
            if(Carbon::createFromFormat("H:i:s", $track->duration) !== false){
                $dt = Carbon::createFromFormat("H:i:s", $track->duration);
            }else{
                if(Carbon::createFromFormat("H:i:s", $track->duration.= ':00') !== false){
                    $dt = Carbon::parse($track->duration .= ':00')->format("H:i:s");
                }else{
                    $dt = Carbon::parse($track->duration .= ':00:00')->format("H:i:s");
                }
            }
            $totalMin += CarbonInterval::hour($dt->hour)->addMinutes($dt->minute)->addSeconds($dt->second)->totalMinutes;
        }
            $tMinutes = CarbonInterval::minutes($totalMin)->forHumans(true);

//        dd($tMinutes);

        return view('admin.contents._edit', compact('content', 'authors', 'user', 'tracks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateContentRequest $request
     * @param Content $content
     * @return mixed
     */
    public function update(UpdateContentRequest $request, Content $content)
    {

        $request->except('_method', '_token');

        $info = array();

        foreach ($request->only(array_keys($request->rules())) as $key => $value) {
            if (is_array($value)) $value = ($key === 'type') ? $value : serialize($value);
            $info[$key] = $value;
        }

        if($request->hasFile(key: 'imgCover')  || $info['cover_remove'] == "1"):
            $info['imgCover'] =  $this->createImage(
                name: "imgCover",
                dir: "storage/uploads/contents/".$content->id."_imgCover",
                file: $info["imgCover"] ?? null,
                resize: ['w' => '1000', 'h' => '750'],
                key: "contents",
                rm: $info['cover_remove']);
        endif;
        if($request->hasFile(key: 'imgShowcase')  || $info['showcase_remove'] == "1"):
            $info['imgShowcase'] =  $this->createImage(
                name: "imgShowcase",
                dir: "storage/uploads/contents/".$content->id."_imgShowcase",
                file: $info["imgShowcase"] ?? null,
                resize: ['w' => '2000', 'h' => '1500'],
                key: "contents",
                rm: $info['showcase_remove']);
        endif;


        $aID   = Author::withoutTrashed()->where('author_id', $info['author_id'])->get('admin_id');
        $info['admin_id']   = $aID[0]->admin_id;
        $info['isFree']     = $info['isFree'] ?? 0;
        $info['isValid']    = $info['isValid'] ?? 0;
        $info['isNew']      = $info['isNew'] ?? 0;
        $info['status']     = $info['status'] ?? 0;

        ($info['status'] == 1) ? $content->find($content->id)->touch('published_at') : $info['published_at'] = null;

        $tracks  = $content->tracks;
        $totalMin = 0;
        foreach ($tracks as $track)
        {
            $dt = Carbon::createFromFormat("H:i:s", $track->duration);
            $totalMin += CarbonInterval::hour($dt->hour)->addMinutes($dt->minute)->addSeconds($dt->second)->totalMinutes;
        }
//        $tMinutes  = CarbonInterval::minute($totalMin)->forHumans(true);

        $info['duration']  = CarbonInterval::minutes($totalMin)->cascade();

        $content->find($content->id)->update($info);


        return response()->json([
            "status" => true,
            "title" => $info['title'] . " bilgileri güncellediniz!",
            "text" =>  $info['title'] . " Taslaklara kayıt edilmiştir!",
            "class" => "info",
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
        $record = Content::findOrFail($id);
        $record->deleted_at = now();
        $record->deleted_by = Auth::user()->id;
        $record->save();
        return true;
    }



    /**
     * Function for upload avatar image
     *
     * @param string $folder
     * @param  string  $key
     * @param  string  $validation
     *
     * @return false|string|null
     */
    public function upload(string $folder = 'uploads/contents', string $key = '', string $validation = 'image|mimes:jpeg,png,jpg,webp|max:2048|sometimes'): bool|string|null
    {
        request()->validate([$key => $validation]);

        $file = null;
        if (request()->hasFile($key)) {
            $file = Storage::disk('public')->putFile($folder, request()->file($key), 'public');
        }

        return $file;
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Content $content
     * @return JsonResponse
     */
    public function updStatus(Request $request, Content $content): JsonResponse
    {
        $id = $request->get('content_id');
        $result = $content::findOrFail($id);
        $result->published_by = Auth::user()->id;
        $result->status = ($result->status === 1) ? 0 : 1;
        ($result->status === 1) ? $result->touch('published_at') : $result->published_at = null;
        $result->save();

        return response()->json(["success" => true,"data" => $request->all()]);
    }

}
