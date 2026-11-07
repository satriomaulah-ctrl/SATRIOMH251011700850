<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all(); // DataTables yang urus search dan pagination
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'teknologi'   => 'required|string|max:255',
            'status'      => 'required|in:active,archived',
            'description' => 'required|string|max:255',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $this->simpanGambar($request);
        }

        Project::create($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project berhasil ditambahkan');
    }

    public function edit($id)
    {
        $project = Project::findOrFail($id);
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'teknologi'   => 'required|string|max:255',
            'status'      => 'required|in:active,archived',
            'description' => 'required|string|max:255',
            'image'       => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $this->simpanGambar($request);
        } else {
            unset($data['image']); // tidak upload baru: gambar lama dipertahankan
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project berhasil diperbarui');
            }

    public function destroy($id)
    {
        Project::findOrFail($id)->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project berhasil dihapus');
    }

    private function simpanGambar(Request $request): string
    {
        $file = $request->file('image');
        $nama = time() . '_' . preg_replace('/[^A-Za-z0-9._-]/', '_', $file->getClientOriginalName());
        $file->move(public_path('images'), $nama);

        return $nama;
    }
}