<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Barryvdh\DomPDF\Facade\Pdf;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(6);
        return view('page.project', compact('projects'));
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('page.project-detail', compact('project'));
    }

    public function cetakPdf()
    {
        $projects = Project::all();

        $pdf = Pdf::loadView('admin.projects.pdf', compact('projects'))
            ->setPaper('a4', 'landscape');

        return $pdf->stream('data-project.pdf');
    }
}