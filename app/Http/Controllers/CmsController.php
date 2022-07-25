<?php

namespace App\Http\Controllers;

use App\DataTables\CmsDataTable;
use App\Http\Requests\StoreCmsRequest;
use App\Http\Requests\UpdateCmsRequest;
use App\Models\Cms;

class CmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\DataTables\CmsDataTable  $dataTable
     * @return \Illuminate\Http\Response
     */
    public function index(CmsDataTable $dataTable)
    {
        return $dataTable->render('dashboard.cms.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.cms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCmsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCmsRequest $request)
    {
        try {
            $cms = Cms::create($request->validated());

            if (isset($request->file)) {
                for ($i = 0; $i < count($request->file); $i++) { 
                    $cms->attachments()->insert([
                        'cms_id' => $cms->id,
                        'filename' => $request->file[$i]->getClientOriginalName(),
                        'file' => $request->file[$i]->storePublicly('attachments'),
                    ]);
                }
            }
        } catch (\Throwable $th) {
            // dd($th->getTrace());
            return $th->getTrace();
            return redirect()->back()->with('error', 'Gagal menambahkan konten: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menambahkan konten.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cms  $cms
     * @return \Illuminate\Http\Response
     */
    public function edit(Cms $cms)
    {
        return view('dashboard.cms.edit', [
            'cms' => $cms,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCmsRequest  $request
     * @param  \App\Models\Cms  $cms
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCmsRequest $request, Cms $cms)
    {
        try {
            $cms->update($request->validated());

            if (isset($request->file)) {
                for ($i = 0; $i < count($request->file); $i++) { 
                    $cms->attachments()->insert([
                        'cms_id' => $cms->id,
                        'filename' => $request->file[$i]->getClientOriginalName(),
                        'file' => $request->file[$i]->storePublicly('attachments'),
                    ]);
                }
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal mengubah konten: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil mengubah konten.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cms  $cms
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cms $cms)
    {
        try {
            $cms->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menghapus konten: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menghapus konten.');
    }
}
