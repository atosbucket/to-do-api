<?php

namespace App\Http\Controllers\api;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Todo;

class TaskController extends BaseController {

    public function index() {
        $todos = Todo::all();
        return response()->json($todos);
    }

    public function store(Request $request) {
        $item = Todo::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id) {
        $item = Todo::findOrFail($id);
        $item->update([
            "name" => $request->get('name')
        ]);
        return response()->json($item);
    }

    public function destroy($id) {
        $item = Todo::findOrFail($id);
        $item->delete();
        return response()->json(['message' => 'Item deleted!']);
    }
}
