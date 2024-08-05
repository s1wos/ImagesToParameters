<?php

namespace App\Http\Controllers\Api;

use App\Services\ParameterService;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateParameterRequest;
use App\Models\Parameter;
use Illuminate\Http\Request;

class ParameterApiController extends Controller
{
    private ParameterService $parameterService;

    public function __construct(ParameterService $parameterService)
    {
        $this->parameterService = $parameterService;
    }

    public function index(Request $request)
    {
        $parameters = $this->parameterService->filterParameters($request);
        return response()->json($parameters);
    }

    public function store(UpdateParameterRequest $request)
    {
        $validatedData = $request->validated();

        Parameter::create($validatedData);

        return response()->json(['message' => 'Parameter created successfully',], 201);
    }
}
