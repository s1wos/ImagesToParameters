<?php

namespace App\Services;

use App\Models\Parameter;
use Illuminate\Http\Request;

class ParameterService
{
    public function filterParameters(Request $request)
    {
        $query = Parameter::where('type', 2);

        if ($request->has('id') && !empty($request->id)) {
            $query->where('id', $request->id);
        }

        if ($request->has('title') && !empty($request->title)) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        return $query->with('images')->get();
    }
}
