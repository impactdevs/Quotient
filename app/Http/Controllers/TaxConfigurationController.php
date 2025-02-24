<?php
namespace App\Http\Controllers;

use App\Models\TaxConfiguration;
use Illuminate\Http\Request;

class TaxConfigurationController extends Controller
{
    // List all tax configurations (sorted by effective_date)
    public function index()
    {
        $confs= TaxConfiguration::orderBy('effective_date', 'desc')->get();
        return view('tax-configurations.index', compact('confs'));
    }

    // Show form to add a new tax bracket
    public function create()
    {
        return view('tax-configurations.create');
    }

    // Store new tax configuration
    public function store(Request $request)
    {
        $validated = $request->validate([
            'min_amount' => 'required|numeric',
            'max_amount' => 'nullable|numeric',
            'rate' => 'required|numeric|between:0,100',
            'effective_date' => 'required|date',
        ]);

        TaxConfiguration::create($validated);

        return redirect()->route('tax-configurations.index')
            ->with('success', 'Tax bracket added!');
    }

    // Edit existing tax configuration (use with caution!)
    public function edit(TaxConfiguration $taxConfiguration)
    {
        return view('tax-configurations.edit', compact('taxConfiguration'));
    }

    // Update tax configuration (avoid updating effective_date)
    public function update(Request $request, TaxConfiguration $taxConfiguration)
    {
        $validated = $request->validate([
            'min_amount' => 'required|numeric',
            'max_amount' => 'nullable|numeric',
            'rate' => 'required|numeric|between:0,100',
        ]);

        $taxConfiguration->update($validated);

        return redirect()->route('tax-configurations.index')
            ->with('success', 'Tax bracket updated!');
    }

    // Delete a tax configuration
    public function destroy(TaxConfiguration $taxConfiguration)
    {
        $taxConfiguration->delete();
        return redirect()->route('tax-configurations.index')
            ->with('success', 'Tax bracket deleted!');
    }
}
