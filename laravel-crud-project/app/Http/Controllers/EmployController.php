<?php

namespace App\Http\Controllers;

use App\Models\Employ;
use Illuminate\Http\Request;

class EmployController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employs = Employ::all();
        return view('employs', compact('employs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AddEmploys');
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:employs,email',
            'department' => 'required|string|max:20',
            'position' => 'required|string|max:20',
            'description' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')
                ->store('photos', 'public');
        }

        Employ::create($validated);

        return redirect()
            ->route('employs.index')
            ->with('success', 'Employee added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employ $employ)
    {
        return view('Employ', compact('employ'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employ $employ)
    {
        return view('EditEmploy', compact('employ'));
    }

    /**
     * Update the specified resource in storage.
     */
    
public function update(Request $request, Employ $employ)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:employs,email,' . $employ->id,
        'department' => 'required|string|max:20',
        'position' => 'required|string|max:20',
        'description' => 'nullable|string|max:255',
        'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    unset($validated['photo']);

    if ($request->hasFile('photo')) {
        $validated['photo'] = $request->file('photo')
            ->store('photos', 'public');
    }

    $employ->update($validated);

    return redirect()
        ->route('employs.index')
        ->with('success', 'Employee updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employ $employ)
    {
        $employ->delete();

        return redirect()
            ->route('employs.index')
            ->with('success', 'Employee deleted successfully.');
    }
}
