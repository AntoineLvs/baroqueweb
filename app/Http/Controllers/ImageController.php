<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  string $tenant Tenant identifier
     * @param  string $filename File name to display
     * @return \Illuminate\Http\Response
     */
    public function show($tenant, $filename): Response
    {

        $path = '/images/' . $tenant . '/' . $filename;

        if (!Storage::disk('s3')->exists($path)) {
            abort(404, 'The requested file does not exist.');
        }

        $fileContent = Storage::disk('s3')->get($path);
        $fileType = Storage::disk('s3')->mimeType($path);

       // dump($fileContent);

        return response($fileContent, 200)->header('Content-Type', $fileType);
    }
}
