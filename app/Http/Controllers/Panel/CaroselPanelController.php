<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CaroselPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paths_relativos_ao_disk = Storage::disk('photos')->files('carousel');
        $urls = [];

        foreach($paths_relativos_ao_disk as $path_relativo_ao_disk){
            $urls[] = Storage::disk('photos')->url($path_relativo_ao_disk);
        }

        
        return view('components.panel.carousel', ['photosLinks' => $urls]);
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
        if(count(Storage::drive('photos')->files('carousel/')) >= 12){
            return 'Quantidade máxima atingida';
        }
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
