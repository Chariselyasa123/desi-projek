<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ImageUploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     *
     * @return JsonResponse
     */
    public function imageUploadPost(Request $request): JsonResponse
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->upload->extension();

        $request->upload->move(public_path('images'), $imageName);

        // Return image path
        return response()->json(['fileName' => $imageName, 'uploaded' => true, 'url' => asset("images/{$imageName}")], ResponseAlias::HTTP_OK);
    }
}
