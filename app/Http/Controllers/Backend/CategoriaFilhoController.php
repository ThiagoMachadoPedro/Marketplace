<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\CategoriaFilho;
use App\Models\SubCategoria;
use Illuminate\Http\Request;
use Str;

class CategoriaFilhoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $categoriaFilhos = CategoriaFilho::where('name', 'like', '%' . $search . '%')->paginate(7);
        } else {
            $categoriaFilhos = CategoriaFilho::paginate(7);
        }

        return view('admin.categoria-filho.index', compact('categoriaFilhos'));
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categorias = Categoria::all();

        return view('admin.categoria-filho.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // Método para armazenar a nova categoria
    public function store(Request $request)
    {
        $request->validate([
            'id_categoria' => ['required'],
            'sub_categoria_id' => ['required'],
            'name' => ['required', 'max:200', 'unique:categoria_filhos,name'],
            'status' => ['required']
        ]);

        $categoriaFilho = new CategoriaFilho();
        $categoriaFilho->id_categoria = $request->id_categoria;
        $categoriaFilho->sub_categoria_id = $request->sub_categoria_id;
        $categoriaFilho->name = $request->name;
        $categoriaFilho->slug = Str::slug($request->name);
        $categoriaFilho->status = $request->status;
        $categoriaFilho->save();


        return redirect()->route('categoria-filho.index')->with('success', 'Categoria Filho criada com sucesso!');
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
        $categorias = Categoria::all();
        $categoriaFilho = CategoriaFilho::findOrFail($id);
        $subCategorias = SubCategoria::where('id_categoria', $categoriaFilho->id_categoria)->get();
        return view('admin.categoria-filho.edit', compact('categorias', 'categoriaFilho', 'subCategorias'));
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'id_categoria' => ['required'],
            'sub_categoria_id' => ['required'],
            'name' => ['required', 'max:200', 'unique:categoria_filhos,name,' . $id],
            'status' => ['required']
        ]);

        $categoriaFilho = CategoriaFilho::findOrFail($id);
        $categoriaFilho->id_categoria = $request->id_categoria;
        $categoriaFilho->sub_categoria_id = $request->sub_categoria_id;
        $categoriaFilho->name = $request->name;
        $categoriaFilho->slug = Str::slug($request->name);
        $categoriaFilho->status = $request->status;
        $categoriaFilho->save();

        // Redirecionar com uma mensagem de sucesso
        return redirect()->route('categoria-filho.index')->with('success', 'Categoria Filho atualizada com sucesso!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoriaFilho = CategoriaFilho::findOrFail($id);
        $categoriaFilho->delete();

        return response(['status' => 'success', 'message' => 'Excluído com sucesso!']);
    }

    // rota para buscar com javascript uma categoria ja selecionada
    public function getSubCategorias(Request $request)
    {
        // vai buscar as categorias que tem como status ==1
        $subcategorias = SubCategoria::where('id_categoria', $request->id)->where('status', 1)->get();
        return $subcategorias;
    }


    public function toggleStatus(Request $request)
    {
        $filho = CategoriaFilho::find($request->id);

        if ($filho) {
            $filho->status = $request->status; // Atualiza o status com o valor vindo da requisição
            $filho->save(); // Salva a alteração no banco

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }


}
