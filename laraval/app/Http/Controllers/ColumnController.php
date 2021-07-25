<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Column;
use Illuminate\Support\Facades\Log;


/**
* Column Controller to handle column operations
*/
class ColumnController extends Controller
{
    public function index()
    {
        Log::info('------ csrf token -----------------');
        Log::info(csrf_token());
        return Column::all();
    }

    public function show(Column $column)
    {
        return $column;
    }

    public function store(Request $request)
    {
        $column = Column::create($request->all());

        return response()->json($column, 201);
    }

    public function update(Request $request, Column $column)
    {
        $column->update($request->all());
        $method = $request->method();
        Log::info('-----------------------');
        Log::info($request);
        Log::info("-----------------------");
        Log::info('Method for update: ' . $method);
        return response()->json($column, 200);
    }

    public function delete(Column $column)
    {
        $column->delete();

        return response()->json(null, 204);
    }
}
