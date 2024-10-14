<?php

namespace App\Http\Controllers;

use App\Models\Laboratorios;
use App\Models\Medicamentos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaboratoriosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laboratorios = Laboratorios::all();
        return view('laboratorios', compact('laboratorios'));
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

        $request->validate([
            'laboratorio' => 'required|string|max:50',
        ]);

        $laboratorio = new Laboratorios;
        $laboratorio->laboratorio = $request->input('laboratorio');
        $laboratorio->saveOrFail();
        return redirect('laboratorios')->with('success', 'Laboratorio creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $laboratorio = Laboratorios::findOrFail($id);
        return view('editLabs', compact('laboratorio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laboratorios $laboratorios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $laboratorio = Laboratorios::find($id);
        $laboratorio->fill($request->only('laboratorio'))->saveOrFail();
        session()->flash('success', 'Laboratorio editado');
        return redirect('laboratorios')->with('success', 'laboratorio editado exitosamente.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
        $relatedMedicamentos = Medicamentos::where('id_laboratorio', $id)->exists();

    if ($relatedMedicamentos) {
        return redirect('laboratorios')->with('error', 'No se puede eliminar este laboratorio porque está relacionado con medicamentos.');
    }
    $laboratorio = Laboratorios::findOrFail($id);
    $laboratorio->delete();
    return redirect('laboratorios')->with('success', 'Laboratorio eliminado exitosamente.');
}

}
