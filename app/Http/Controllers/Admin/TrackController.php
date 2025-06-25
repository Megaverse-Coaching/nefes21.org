<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Carbon\CarbonInterval;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use App\Models\Admin\{Admin,Content,Track,Soundscape};
use App\Http\Requests\Admin\{StoreTrackRequest, UpdateTrackRequest};
use App\DataTables\TrackListDataTable;
use Illuminate\Contracts\View\View;
use Illuminate\Http\{RedirectResponse, Response};
use Illuminate\Support\Facades\{Auth, Storage, Redirect};

class TrackController extends Controller
{

//    function __construct()
//    {
//        $this->middleware('permission:read track',    ['only' => ['index','show']]);
//        $this->middleware('permission:create track',  ['only' => ['create','store']]);
//        $this->middleware('permission:update track',  ['only' => ['edit','update']]);
//        $this->middleware('permission:delete track',  ['only' => ['destroy']]);
//    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(TrackListDataTable $dataTable)
    {
        return $dataTable->render('admin.tracks.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create():View
    {
        $narrators = Admin::role('narrator')->get();
        $soundscapes = Soundscape::where('status', 1)->get();
        return view('admin.tracks._create', compact('narrators', 'soundscapes'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTrackRequest $request
     * @return RedirectResponse
     */
    public function store(StoreTrackRequest $request): RedirectResponse
    {
        $request->except('_method', '_token', 'soundscape_id');

        $id = $request->get('content_id');
        $content = Content::findOrFail($id);

        $info = array();
        foreach ($request->only(array_keys($request->rules())) as $key => $value) {
            if (is_array($value)) $value = ($key === 'type') ? $value : serialize($value);
            $info[$key] = $value;
        }
        if ($trackName = $this->uploadTracks()) {
            $info['track'] = $trackName;
        }

        $info['status'] = 1;
        $info['isFree'] = $info['isFree'] ?? 0;
        $info['isValid'] = $info['isValid'] ?? 0;

//        $info['duration'] = Carbon::createFromFormat("H:i:s", $info['duration']);

        /*
        $totalMin = CarbonInterval::hour($dt->hour)->addMinutes($dt->minute)->addSeconds($dt->second)->totalMinutes;
        $tMinutes  = CarbonInterval::minute($totalMin)->forHumans(true);
        $info['duration'] = CarbonInterval::minutes($totalMin)->cascade();
        */


        $track = new Track();
        $track->fill($info)->save();

        $request->session()->put([
            "title" => $info['title'] . " bilgileri güncellediniz!",
            "text" =>  $info['title'] . " kayıt işlemi başarılı!",
            "status" => "info",
        ]);


        return Redirect::route('admin.tracks.show', array('track' => $id));
    }

    /**
     * Display the specified resource.
     *
     * @param TrackListDataTable $dataTable
     * @param int $id
     * @return Response
     */
    public function show(TrackListDataTable $dataTable, $id)
    {
        return $dataTable->with('id', $id)->render('admin.tracks.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id): View|Factory|Application
    {
        $track = Track::findOrFail($id);
        $content = Content::find($track->content_id);
        $narrators = Admin::role('narrator')->get();
        $soundscapes = Soundscape::where('status', 1)->get();
        $user = $track->admin;
        return view('admin.tracks._edit', compact('content', 'narrators', 'track','user', 'soundscapes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTrackRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(UpdateTrackRequest $request,$id): RedirectResponse
    {

        $request->except('_method', '_token', 'content_id');
        $track = Track::findOrFail($id);
        $content_id = $request->get('content_id');
        $info = array();

        foreach ($request->only(array_keys($request->rules())) as $key => $value) {
            if (is_array($value)) {
                $value = ($key === 'type') ? $value : serialize($value);
            }
            $info[$key] = $value;
        }

        $info['status'] = 1;
        $info['isFree']     = (array_key_exists('isFree', $info))   ? 1 : 0;
        $info['isValid']    = (array_key_exists('isValid', $info))  ? 1 : 0;



        if(request()->hasFile('track')){
            $info['track'] = $this->uploadTracks();
            //$dt = Carbon::createFromTime(0000, 0, 0,  'Europe/Istanbul');
            //$dt->addSeconds($info['duration']);
            //$info['duration'] = date("H:i:s", strtotime($dt->format("H:i:s")));
        }

        $track->fill($info)->save();

        $request->session()->put([
            "title" => $info['title'] . " bilgileri güncellediniz!",
            "text" =>  $info['title'] . " kayıt işlemi başarılı!",
            "status" => "info",
        ]);



        return Redirect::route('admin.tracks.show', array('track' => $content_id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return bool
     */
    public function destroy($id): bool
    {
        $record = Track::findOrFail($id);
        $record->deleted_at = now();
        $record->deleted_by = Auth::user()->id;
        $record->save();
        return true;
    }


       /**
     * Function for upload avatar image
     *
     * @param string $folder
     * @param string $key
     * @param string $validation
     *
     * @return false|string|null
     */
    public function uploadTracks(string $folder = 'uploads/tracks', string $key = 'track', string $validation = 'required|mimes:mp3,m4a,mp4,m4r|max:50548|sometimes'): bool|string|null
    {
        request()->validate([$key => $validation]);

        $file = null;
        if (request()->hasFile($key)) {
            $file = Storage::disk('public')->putFile($folder, request()->file($key), 'public');
        }

        return $file;
    }
}
