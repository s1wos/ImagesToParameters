<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateParameterRequest;
use App\Models\Parameter;
use App\Services\ParameterService;
use Illuminate\Http\Request;

class ParameterController extends Controller
{
    private ParameterService $parameterService;

    public function __construct(ParameterService $parameterService)
    {
        $this->parameterService = $parameterService;
    }

    public function index(Request $request)
    {
        $parameters = $this->parameterService->filterParameters($request);

        return view('parameters.index', compact('parameters'));
    }

    public function edit(Parameter $parameter)
    {
        return view('parameters.edit', compact('parameter'));
    }

    public function update(UpdateParameterRequest $request, Parameter $parameter)
    {
        $parameter->update($request->validated());

        return redirect()->route('parameters.index');
    }
}
