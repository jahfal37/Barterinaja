<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function showForm()
    {
        $reports = Report::all();
        return view('report',compact('reports'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Report::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.report_form')->with('success', 'Laporan berhasil dikirim!');
    }
    public function index()
    {
        $reports = Report::all();
        return view('form', compact('reports'));
    }
}