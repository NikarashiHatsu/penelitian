<?php

namespace App\Http\Controllers;

use App\DataTables\FocusDataTable;
use App\Http\Requests\StoreFocusRequest;
use App\Http\Requests\UpdateFocusRequest;
use App\Models\Focus;

class FocusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FocusDataTable $dataTable)
    {
        return $dataTable->render('dashboard.focus.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.focus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFocusRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFocusRequest $request)
    {
        try {
            Focus::create($request->validated());
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menambahkan fokus penelitian: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menambahkan fokus penelitian');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Focus  $focus
     * @return \Illuminate\Http\Response
     */
    public function edit(Focus $focus)
    {
        return view('dashboard.focus.edit', [
            'skema_penelitian' => $focus,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFocusRequest  $request
     * @param  \App\Models\Focus  $focus
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFocusRequest $request, Focus $focus)
    {
        try {
            $focus->update($request->validated());

            if ($request->hasFile('file')) {
                $focus->update([
                    'filename' => $request->file('file')->getClientOriginalName(),
                    'file' => $request->file('file')->storePublicly('focus'),
                ]);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal mengubah fokus penelitian: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil mengubah fokus penelitian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Focus  $focus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Focus $focus)
    {
        try {
            $focus->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menghapus fokus penelitian: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menghapus fokus penelitian');
    }
}
