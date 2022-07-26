<?php

namespace App\Http\Controllers;

use App\DataTables\SkemaPenelitianDataTable;
use App\Http\Requests\StoreSkemaPenelitianRequest;
use App\Http\Requests\UpdateSkemaPenelitianRequest;
use App\Models\SkemaPenelitian;

class SkemaPenelitianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SkemaPenelitianDataTable $dataTable)
    {
        return $dataTable->render('dashboard.skema-penelitian.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.skema-penelitian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSkemaPenelitianRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSkemaPenelitianRequest $request)
    {
        try {
            SkemaPenelitian::create($request->validated());
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menambahkan skema: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menambahkan skema');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SkemaPenelitian  $skemaPenelitian
     * @return \Illuminate\Http\Response
     */
    public function edit(SkemaPenelitian $skemaPenelitian)
    {
        return view('dashboard.skema-penelitian.edit', [
            'skema_penelitian' => $skemaPenelitian,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSkemaPenelitianRequest  $request
     * @param  \App\Models\SkemaPenelitian  $skemaPenelitian
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSkemaPenelitianRequest $request, SkemaPenelitian $skemaPenelitian)
    {
        try {
            $skemaPenelitian->update($request->validated());

            if ($request->hasFile('file')) {
                $skemaPenelitian->update([
                    'filename' => $request->file('file')->getClientOriginalName(),
                    'file' => $request->file('file')->storePublicly('skema'),
                ]);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal mengubah skema: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil mengubah skema');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SkemaPenelitian  $skemaPenelitian
     * @return \Illuminate\Http\Response
     */
    public function destroy(SkemaPenelitian $skemaPenelitian)
    {
        try {
            $skemaPenelitian->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menghapus skema: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menghapus skema');
    }
}
