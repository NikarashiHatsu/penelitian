<?php

namespace App\Http\Controllers;

use App\DataTables\PenelitiDataTable;
use App\Http\Requests\StorePenelitiRequest;
use App\Http\Requests\UpdatePenelitiRequest;
use App\Models\Peneliti;

class PenelitiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PenelitiDataTable $dataTable)
    {
        return $dataTable->render('dashboard.peneliti.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.peneliti.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenelitiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenelitiRequest $request)
    {
        try {
            Peneliti::create($request->validated());
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menambahkan peneliti: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menambahkan peneliti');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peneliti  $peneliti
     * @return \Illuminate\Http\Response
     */
    public function edit(Peneliti $peneliti)
    {
        return view('dashboard.peneliti.edit', [
            'peneliti' => $peneliti,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenelitiRequest  $request
     * @param  \App\Models\Peneliti  $peneliti
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenelitiRequest $request, Peneliti $peneliti)
    {
        try {
            $peneliti->update($request->validated());

            if ($request->hasFile('file')) {
                $peneliti->update([
                    'filename' => $request->file('file')->getClientOriginalName(),
                    'file' => $request->file('file')->storePublicly('peneliti'),
                ]);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal mengubah peneliti: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil mengubah peneliti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peneliti  $peneliti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peneliti $peneliti)
    {
        try {
            $peneliti->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menghapus peneliti: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menghapus peneliti');
    }
}
