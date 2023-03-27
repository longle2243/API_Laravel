<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function uploadFile(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            return response()->json([
                'message' => 'File uploaded successfully.',
                'file_path' => public_path('uploads/' . $filename)
            ]);
        } else {
            return response()->json([
                'message' => 'File not found.',
            ], 404);
        }
    }
    
}
