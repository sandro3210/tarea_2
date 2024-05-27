<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alquiler;
use App\Models\Departamento;
use App\Models\Inquilino;

class AlquilerController extends Controller
{
    public function index()
    {
        $alquileres = Alquiler::all();
        return view('alquileres.index', compact('alquileres'));
    }

    public function create()
    {
        $departamentos = Departamento::all();
        $inquilinos = Inquilino::all();
        return view('alquileres.create', compact('departamentos', 'inquilinos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'monto' => 'required|numeric',
            'fecha_inicio' => 'required|date',
            'departamento_id' => 'required|exists:departamentos,id',
            'inquilino_id' => 'required|exists:inquilinos,id',

        ]);

        $alquiler = Alquiler::create([
            'monto' => $request->input('monto'),
            'fecha_inicio' => $request->input('fecha_inicio'),
            'departamento_id' => $request->input('departamento_id'),
            'inquilino_id' => $request->input('inquilino_id'),
        ]);
        return redirect()->route('alquileres.index')->with('success', '¡El alquiler se ha agregado correctamente!');
    }

    public function show($id)
    {
        $alquiler = Alquiler::findOrFail($id);
        return view('alquileres.show', compact('alquiler'));
    }

    public function edit($id)
    {
        $alquiler = Alquiler::findOrFail($id);
        $departamentos = Departamento::all();
        $inquilinos = Inquilino::all();
        return view('alquileres.edit', compact('alquiler', 'departamentos', 'inquilinos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'monto' => 'required|numeric',
            'fecha_inicio' => 'required|date',
            'departamento_id' => 'required|exists:departamentos,id',
            'inquilinos' => 'required|array|min:1',
            'inquilinos.*' => 'exists:inquilinos,id',
        ]);

        $alquiler = Alquiler::findOrFail($id);
        $alquiler->update($request->all());
        $alquiler->inquilinos()->sync($request->input('inquilinos'));

        return redirect()->route('alquileres.index')->with('success', '¡El alquiler se ha actualizado correctamente!');
    }

    public function destroy($id)
    {
        Alquiler::findOrFail($id)->delete();
        return redirect()->route('alquileres.index')->with('success', '¡El alquiler se ha eliminado correctamente!');
    }
}
