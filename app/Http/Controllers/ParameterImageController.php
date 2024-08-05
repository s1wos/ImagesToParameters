<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParameterImageRequest;
use App\Models\Parameter;
use App\Services\ParameterImageService;

class ParameterImageController extends Controller
{
    protected $parameterImageService;

    public function __construct(ParameterImageService $parameterImageService)
    {
        $this->parameterImageService = $parameterImageService;
    }

    public function store(StoreParameterImageRequest $request, Parameter $parameter)
    {
        $this->parameterImageService->store($request, $parameter);

        return redirect()->route('parameters.edit', $parameter);
    }

    public function destroy(Parameter $parameter, $imageType)
    {
        $this->parameterImageService->destroy($parameter, $imageType);

        return redirect()->route('parameters.edit', $parameter);
    }
}
