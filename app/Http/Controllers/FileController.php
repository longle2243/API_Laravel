<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\File;

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
    
    
    public function downloadFile()
    {
    	$myFile = public_path("dummy_pdf.pdf");
    	$headers = ['Content-Type: application/pdf'];
    	$newName = 'itsolutionstuff-pdf-file-'.time().'.pdf';


    	return response()->download($myFile, $newName, $headers);
    }
}
