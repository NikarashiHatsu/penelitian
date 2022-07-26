<?php

namespace App\Http\Controllers;

use App\DataTables\HeroDataTable;
use App\Http\Requests\StoreHeroRequest;
use App\Http\Requests\UpdateHeroRequest;
use App\Models\Hero;

class HeroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(HeroDataTable $dataTable)
    {
        return $dataTable->render('dashboard.hero.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.hero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHeroRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHeroRequest $request)
    {
        try {
            $hero = Hero::create($request->validated());

            if ($request->hasFile('image')) {
                $hero->content = $request->file('image')->storePublicly('hero');
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menambahkan data hero: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menambahkan data hero');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function edit(Hero $hero)
    {
        return view('dashboard.hero.edit', [
            'hero' => $hero,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHeroRequest  $request
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHeroRequest $request, Hero $hero)
    {
        try {
            $hero->update($request->validated());

            if ($request->hasFile('image')) {
                $hero->update([
                    'content' => $request->file('image')->storePublicly('hero')
                ]);
            }
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal mengubah data hero: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil mengubah data hero');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hero  $hero
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hero $hero)
    {
        try {
            $hero->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menghapus data hero: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menghapus data hero');
    }
}
