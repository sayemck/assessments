<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FileManagement;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use Storage;

class FileManagementController extends Controller
{
    public function index()
    {
        $title = 'File Management Assessment';
        
        return view('file_management.index', compact('title'));
    }

    public function fileStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'file' => ['required', 'mimes:pdf,png', 'max:5120'],
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $targetDisk = $this->isS3Configured() ? true : false;

        $fileUpload = new FileManagement();
        if ($request->hasFile('file')) {
            $extension = $request->file('file')->getClientOriginalExtension();
            $profileImageName = time() . '.' . $extension;

            $publicPath = Storage::disk('public')->putFileAs('uploads', $request->file('file'), $profileImageName);

            if($targetDisk){
                $s3Path = Storage::disk('s3')->putFileAs('uploads', $request->file('file'), $profileImageName);
            }

            $fileUpload->file = $profileImageName;
            $fileUpload->public_path = $publicPath;
            $fileUpload->s3_path = $s3Path ?? null;
        }

        if($fileUpload->save()){
            return redirect()->route('file.index')->with('success', 'Uploaded successfully!');
        }
    }

    public function downloadInvoice($id)
    {
        $invoice = FileManagement::findOrFail($id);

        $url = Storage::disk('s3')->temporaryUrl($invoice->s3_path,
            now()->addMinutes(2)
        );

        return redirect($url);
    }

    private function isS3Configured(): bool
    {
        return config('filesystems.disks.s3.key') &&
            config('filesystems.disks.s3.secret') &&
            config('filesystems.disks.s3.region') &&
            config('filesystems.disks.s3.bucket');
    }
}
