<?php

namespace App\Http\Controllers;
use App\Models\YourModelName;
use Illuminate\Http\Request;

class YourControllerName extends Controller
{
    public function index()
    {
        $models = YourModelName::all();
        
        return response()->json([
            "status" => "success",
            "message" => "Data retrieved successfully",
            "data" => $models
        ]);
    }
    

    public function store(Request $request)
    {
        $model = YourModelName::create($request->all());

        return response()->json($model);
    }

    public function show($id)
    {
        $model = YourModelName::find($id);

        return response()->json($model);
    }

    public function update(Request $request, $id)
    {
        $model = YourModelName::find($id);

        $model->update($request->all());

        return response()->json($model);
    }

    public function destroy($id)
    {
        YourModelName::destroy($id);

        return response()->json(['message' => 'Model deleted successfully.']);
    }
}
