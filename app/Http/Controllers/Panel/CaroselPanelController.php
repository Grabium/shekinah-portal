<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\matches;

class CaroselPanelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partialLinks = Storage::disk('photos')->files('carousel/');

        $photosLinks = [];

        foreach($partialLinks as $partialLink){
            $matches = preg_match('/(([0][1-9])|([1][12]))\.*/', $partialLink);
            dd($matches);//tenta capturar nomes finais do arquivo
            $photosLinks[] = 'storage/photos/'. $partialLink;
        }
        
        return view('components.panel.carousel', ['photosLinks' => $photosLinks]);
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
