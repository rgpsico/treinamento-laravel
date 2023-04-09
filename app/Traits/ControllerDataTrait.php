<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait ControllerDataTrait
{
    public function data($model, $page)
    {
        return view($this->view . '.' . $page, [
            'model' => $model,
            'pageTitle' => $this->pageTitle,
            'route' => $this->route,
            'view' => $this->view . '.' . $page,
            'partials' => $this->view
        ]);
    }

    /**
     * Uploads an image file and returns the filename.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $fieldName
     * @param string $path
     * @return string|null
     */
    protected function uploadImage(Request $request, $fieldName, $path)
    {
        if ($request->hasFile($fieldName) && $request->file($fieldName)->isValid()) {
            $filename = time() . '_' . rand() . '.' . $request->file($fieldName)->getClientOriginalExtension();
            $request->file($fieldName)->move(public_path($path), $filename);
            return $filename;
        }
        return null;
    }
}
