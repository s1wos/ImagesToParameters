<?php

namespace App\Services;

use App\Models\Parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ParameterImageService
{
    public function store(Request $request, Parameter $parameter)
    {
        $imageTypes = ['icon', 'icon_gray'];

        foreach ($imageTypes as $type) {
            if ($request->hasFile($type)) {
                $file = $request->file($type);
                $filename = $this->generateFileName($file);
                $file->storeAs('public/parameters', $filename);

                $parameter->images()->updateOrCreate([], [$type => $filename]);
            }
        }
    }

    public function destroy(Parameter $parameter, $imageType)
    {
        $image = $parameter->images->{$imageType};

        if ($image) {
            Storage::delete('public/parameters/' . $image);
            $parameter->images()->update([$imageType => null]);
        }
    }

    protected function generateFileName($file)
    {
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $filename = Str::slug($filename) . '_' . time() . '.' . $extension;

        return $filename;
    }
}
