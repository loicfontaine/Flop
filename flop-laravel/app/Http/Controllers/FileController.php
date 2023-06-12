<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function formSubmit(Request $request)
    {

        dd("requestAll:", $request->all(), "requestFile:", $request->file, "requestInput:", $request->input, "requestInputFile:", $request->input('file'));
        $fileName = time() . '.' . $request->file->getClientOriginalExtension();
        $request->file->move('/home/projart/2023/50/flop/flop-laravel/storage/participation', $fileName);

        return response()->json(['success' => 'You have successfully upload file.']);
    }
}
