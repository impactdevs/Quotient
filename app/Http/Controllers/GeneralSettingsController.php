<?php

namespace App\Http\Controllers;

use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class GeneralSettingsController extends Controller
{
    public function index()
    {
        // Fetch all the GeneralSettings records
        $settings = GeneralSetting::first();
        return view('general-settings.index', compact('settings'));
    }
 
    // Show form to add a new GeneralSetting
    public function create()
    {
        return view('general-settings.create');
    }
 
    // Store new GeneralSetting configuration
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nssf_cap' => 'required|numeric',
            'employee_nssf_rate' => 'required|numeric|between:0,100',
            'employer_nssf_rate' => 'required|numeric|between:0,100',
        ]);
 
        GeneralSetting::create($validated);
 
        return redirect()->route('general-settings.index')
            ->with('success', 'General setting added!');
    }
 
    // Edit existing GeneralSetting configuration
    public function edit(GeneralSetting $generalSetting)
    {
        return view('general-settings.edit', compact('generalSetting'));
    }
 
    // Update GeneralSetting configuration
    public function update(Request $request, GeneralSetting $generalSetting)
    {
        $validated = $request->validate([
            'nssf_cap' => 'required|numeric',
            'employee_nssf_rate' => 'required|numeric|between:0,100',
            'employer_nssf_rate' => 'required|numeric|between:0,100',
        ]);
 
        $generalSetting->update($validated);
 
        return redirect()->route('general-settings.index')
            ->with('success', 'General setting updated!');
    }
 
    // Delete a GeneralSetting configuration
    public function destroy(GeneralSetting $generalSetting)
    {
        $generalSetting->delete();
        return redirect()->route('general-settings.index')
            ->with('success', 'General setting deleted!');
    }
}