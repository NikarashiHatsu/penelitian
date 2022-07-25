<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Cms;
use Illuminate\Http\Request;

class AttachmentController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cms  $cms
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cms $cms, Attachment $attachment)
    {
        try {
            $attachment->delete();
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Gagal menghapus file: ' . $th->getMessage());
        }

        return redirect()->back()->with('success', 'Berhasil menghapus file.');
    }
}
