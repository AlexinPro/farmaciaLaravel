<?php
//HASTA ACÁ LLUEGUE WEY
namespace App\Http\Controllers;

use App\Models\Medicamentos;
use App\Models\Laboratorios;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MedicamentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $medicamentos = Medicamentos::select('medicamentos.id', 'name', 'descripcion', 'medicamentos.id_laboratorio',
        'precio', 'caducidad', 'lote', 'porcion', 'image', 'laboratorios.laboratorio as nombre_laboratorio')
        ->join('laboratorios', 'laboratorios.id', '=', 'medicamentos.id_laboratorio')
        ->get();

    $laboratorios = Laboratorios::all();
    return view('medicamentos', compact('medicamentos', 'laboratorios'));
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
        'name' => 'required|string|max:50',
        'descripcion' => 'required|string|max:100',
        'id_laboratorio' => 'required|exists:laboratorios,id',
        'precio' => 'required|numeric|min:0',
        'caducidad' => 'required|date',
        'lote' => 'required|integer',
        'porcion' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de imagen
    ]);

    $medicamento = new Medicamentos($request->except('image'));

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $medicamento->image = $imageName;
    }

    $medicamento->saveOrFail();
    return redirect('medicamentos')->with('success', 'Medicamento creado exitosamente.');
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicamentos $medicamentos) {}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $medicamento = Medicamentos::find($id);
    $request->validate([
        'name' => 'required|string|max:50',
        'descripcion' => 'required|string|max:100',
        'id_laboratorio' => 'required|exists:laboratorios,id',
        'precio' => 'required|numeric|min:0',
        'caducidad' => 'required|date',
        'lote' => 'required|integer',
        'porcion' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de imagen
    ]);

    $requestData = $request->except('image');

    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $requestData['image'] = $imageName;
    }

    $medicamento->fill($requestData);
    $medicamento->saveOrFail();

    return redirect('medicamentos')->with('success', 'Medicamento editado exitosamente.');
}

public function show(Medicamentos $medicamento)
{
    $laboratorios = Laboratorios::all();
    return view('editMed', compact('medicamento', 'laboratorios'));
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicamentos $medicamento)
    {
        $medicamento->delete();
        return redirect('medicamentos')->with('success', 'Medicamento eliminado con éxito.');
    }
}
