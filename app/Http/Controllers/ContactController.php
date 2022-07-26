<?php

namespace App\Http\Controllers;

use App\DataTables\ContactDataTable;
use App\Http\Requests\StoreContactRequest;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContactDataTable $dataTable)
    {
        return $dataTable->render('dashboard.contact.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactRequest $request)
    {
        try {
            Contact::create($request->validated());
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menambahkan data kontak: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menambahkan data kontak');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        return view('dashboard.contact.edit', [
            'contact' => $contact,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        try {
            $contact->update($request->validated());
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal mengubah data kontak: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil mengubah data kontak');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menghapus data kontak: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menghapus data kontak');
    }
}
