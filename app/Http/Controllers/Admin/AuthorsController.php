<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateAuthorRequest;
use App\Models\Admin\Admin;
use App\Models\Admin\Author;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use App\Http\Traits\UploadImage;
use Illuminate\Support\Facades\Auth;

class AuthorsController extends Controller
{

    use uploadImage;

    public function index()
    {
        $authors = Author::withoutTrashed()->get();
        $admins = Admin::withoutTrashed()->get();
        return view('admin.authors.index', compact('authors', 'admins'));
    }

    public function create()
    {

    }

    public function store(Request $request, Author $author)
    {
        $datas = $request->except('_method', '_token', 'headerImageUrl_remove', 'profilePicUrl_remove');


        $info = array();
        $info['created_by'] = $info['updated_by'] = Auth::user()->id;

        foreach ($request->only(array_values($author->getFillable())) as $key => $value) $info[$key] = $value;

        $fullname = \Str::slug($info['label']);

        $info['isConsulting'] = $info['isConsulting'] ?? 0;
        $info['status'] = $info['status'] ?? 0;


        if($request->hasFile(key: 'headerImageUrl')  || $info['headerImageUrl_remove'] == "1"): $info['headerImageUrl'] =  $this->createImage(
                name: "headerImageUrl",
                dir: "storage/uploads/authors/$fullname-headerImageUrl",
                file: $info["headerImageUrl"] ?? null,
                resize: ['w' => '750', 'h' => '1000'],
                key: "authors",
                rm: $info['headerImageUrl_remove'] ?? null,
        );
        endif;

        if($request->hasFile(key: 'profilePicUrl')  || $info['profilePicUrl_remove'] == "1"): $info['profilePicUrl'] =  $this->createImage(
                name: "profilePicUrl",
                dir: "storage/uploads/authors/$fullname-profilePicUrl",
                file: $info["profilePicUrl"] ?? null,
                resize: ['w' => '2000', 'h' => '1500'],
                key: "authors",
                rm: $info['profilePicUrl_remove'] ?? null,
        );
        endif;

        $result = $author->fill($info)->save();

        return response()->json([
            "status" => $result,
            "message" => $info['label'] . " bilgilerini eklediniz!",
            "class" => ($result) ? "info" : "danger",
        ]);

    }

    public function show($id)
    {
        $result = Author::withoutTrashed()->where('author_id', $id)->get();

        return response()->json([
            "result" => $result,
            "message" => $result[0]->label. " Bilgileri getirildi!",
            "class" => ($result) ? "info" : "error",
        ]);
    }

    public function edit(Author $author)
    {
    }

    /**
     * @param UpdateAuthorRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(UpdateAuthorRequest $request, $id)
    {
        $record = Author::where('author_id', $id)->first();

        $info = array();
        foreach ($request->only(array_values($record->getFillable())) as $key => $value) $info[$key] = $value;

        $fullname = \Str::slug($record->label);

        $info['isConsulting'] = $info['isConsulting'] ?? 0;
        $info['status'] = $info['status'] ?? 0;

        if($request->hasFile(key: 'headerImageUrl') || $request->get('headerImageUrl_remove') == "1"):
            $info['headerImageUrl'] =  $this->createImage(
            name: "headerImageUrl",
            dir: "storage/uploads/authors/$fullname/",
            file: $request->file('headerImageUrl') ?? null,
            resize: ['w' => '2000', 'h' => '1500'],
            key: "authors",
            rm: $request->get('headerImageUrl_remove') ?? null,
        );
        endif;

        if($request->hasFile(key: 'profilePicUrl')
            || $request->get('profilePicUrl_remove') == "1")
            :  $info['profilePicUrl'] =  $this->createImage(
            name: "profilePicUrl",
            dir: "storage/uploads/authors/$fullname/",
            file: $request->file('profilePicUrl') ?? null,
            resize: ['w' => '750', 'h' => '1000'],
            key: "authors",
            rm: $request->get('profilePicUrl_remove') ?? null,
        );
        endif;

        $info['updated_by'] = Auth::user()->id;

        $result = $record->update($info);

        return response()->json([
            "status" => $result,
            "message" => "Güncelleme tamamlandı!",
            "class" => ($result) ? "info" : "error",
        ]);
    }

    public function destroy($id): bool
    {
        $record = Author::where('author_id', $id)->first();
        $record->deleted_at = now();
        $record->deleted_by = Auth::user()->id;
        $record->save();
        return true;
    }
}
