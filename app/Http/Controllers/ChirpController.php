<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chirp;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chirps = Chirp::with('user')->latest()->get();
        return view('home', compact("chirps"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "message" => "required|string|max:255|min:2",
        ], [
            "message.required" => "Please enter something to chirp !",
            "message.max" => "Chirps must be 255 characters or less.",
        ]);

        Chirp::create([
            "message" => $validated["message"]
        ]);

        return redirect()->route("chirps.index")->with("success", "Chirp posted");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        return view("chirps.edit", compact("chirp"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        $validated = $request->validate([
            "message" => "required|string|max:255|min:2",
        ], [
            "message.required" => "Please enter something to chirp !",
            "message.max" => "Chirps must be 255 characters or less.",
        ]);

        $chirp->update($validated);

        return redirect()->route("chirps.index")->with("success", "Chirp updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        // $this->authorize("delete", $chirp);

        $chirp->delete();

        return redirect()->route("chirps.index")->with("success", "Chirp deleted");
    }
}
