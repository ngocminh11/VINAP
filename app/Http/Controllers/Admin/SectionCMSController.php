<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SectionCMSController
{
    private $path = 'sections.json';

    private function getData()
    {
        if (!Storage::exists($this->path)) {
            return [];
        }

        return json_decode(Storage::get($this->path), true);
    }

    private function saveData($data)
    {
        Storage::put($this->path, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    public function index()
    {
        $data = $this->getData();
        return view('admin.sections.index', compact('data'));
    }

    public function edit($key)
    {
        $data = $this->getData();
        return view('admin.sections.edit', [
            'key' => $key,
            'section' => $data[$key] ?? []
        ]);
    }

    public function update(Request $request, $key)
    {
        $data = $this->getData();

        $data[$key] = $request->all();

        $this->saveData($data);

        return redirect('/admin/sections')->with('success', 'Updated!');
    }
}
