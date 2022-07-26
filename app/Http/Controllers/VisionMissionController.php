<?php

namespace App\Http\Controllers;

use App\DataTables\VisionMissionDataTable;
use App\Http\Requests\StoreVisionMissionRequest;
use App\Http\Requests\UpdateVisionMissionRequest;
use App\Models\VisionMission;

class VisionMissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(VisionMissionDataTable $dataTable)
    {
        return $dataTable->render('dashboard.vision-mission.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.vision-mission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVisionMissionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVisionMissionRequest $request)
    {
        try {
            VisionMission::create($request->validated());
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menambahkan data: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VisionMission  $visionMission
     * @return \Illuminate\Http\Response
     */
    public function edit(VisionMission $visionMission)
    {
        return view('dashboard.vision-mission.edit', [
            'visionMission' => $visionMission,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVisionMissionRequest  $request
     * @param  \App\Models\VisionMission  $visionMission
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVisionMissionRequest $request, VisionMission $visionMission)
    {
        try {
            $visionMission->update($request->validated());
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal mengubah data: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil mengubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisionMission  $visionMission
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisionMission $visionMission)
    {
        try {
            $visionMission->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menghapus data: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menghapus data');
    }
}
