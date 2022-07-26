<?php

namespace App\Http\Controllers;

use App\DataTables\FooterDataTable;
use App\Http\Requests\StoreFooterRequest;
use App\Http\Requests\UpdateFooterRequest;
use App\Models\Footer;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(FooterDataTable $dataTable)
    {
        return $dataTable->render('dashboard.footer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.footer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFooterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFooterRequest $request)
    {
        try {
            Footer::create($request->validated());
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menambahkan data footer: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menambahkan data footer');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function edit(Footer $footer)
    {
        return view('dashboard.footer.edit', [
            'footer' => $footer,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFooterRequest  $request
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFooterRequest $request, Footer $footer)
    {
        try {
            $footer->update($request->validated());
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal mengubah data footer: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil mengubah data footer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Footer  $footer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Footer $footer)
    {
        try {
            $footer->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menghapus data footer: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menghapus data footer');
    }
}
