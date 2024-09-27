<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Marca;
use Illuminate\Http\Request;
use App\Traits\UploadImageTrait;
use Str;

class MarcaController extends Controller
{
    use UploadImageTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Verifica se há um termo de busca
        $search = $request->input('search');

        // Se houver busca, filtra os sliders pelo título
        if ($search) {
            $marcas = Marca::where('nome', 'like', '%' . $search . '%')
                ->paginate(7);
        } else {
            // Se não houver busca, retorna todos os sliders
            $marcas = Marca::paginate(7);
        }

        return view('admin.marcas.index' , compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
          'logo' => ['image', 'required', 'max:2000'],
          'nome' => ['required', 'max:200'],
          'destacada' => ['required'],
          'status' => ['required'],
        ]);



        $logoPasta = $this->uploadImage($request, 'logo', 'uploads');
        $marca = new Marca();

        $marca->logo = $logoPasta;
        $marca->nome = $request->nome;
        $marca->destacada = $request->destacada;
        $marca->status = $request->status;
        $marca->slug = Str::slug($request->nome);
        $marca->save();

        return redirect()->route('marcas.index')->with('success', 'Marca Salva com Sucesso!');
    }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $marca = Marca::findOrFail($id);
        return view('admin.marcas.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'logo' => ['image', 'max:2000'],
            'nome' => ['required', 'max:200'],
            'destacada' => ['required'],
            'status' => ['required'],
        ]);

        // Encontrar a marca pelo ID
        $marca = Marca::findOrFail($id);

        // Verifica se uma nova imagem foi enviada
        if ($request->hasFile('logo')) {
            // Remove a imagem antiga se existir
            if ($marca->logo) {
                // Verifica se o arquivo existe antes de tentar excluir
                if (file_exists(public_path($marca->logo))) {
                    unlink(public_path($marca->logo));
                }
            }

            // Faz o upload da nova imagem
            $logoPasta = $this->uploadImage($request, 'logo', 'uploads');

            // Atualiza o logo da marca com o novo caminho
            $marca->logo = $logoPasta;
        }

        // Atualiza os outros campos da marca
        $marca->nome = $request->nome;
        $marca->slug = Str::slug($request->nome);
        $marca->destacada = $request->destacada;
        $marca->status = $request->status;

        // Salva as alterações
        $marca->save();

        return redirect()->route('marcas.index')->with('success', 'Marca atualizada com Sucesso!');
    }




    public function destroy($id)
    {
        // Encontrar o slider a ser excluído
        $marca = Marca::findOrFail($id);

        // Verificar se a imagem existe e excluí-la
        if ($marca->logo && file_exists(public_path($marca->logo))) {
            unlink(public_path($marca->logo));
        }

        // Excluir o registro do slider
        $marca->delete();

        return redirect()->route('marcas.index')->with('success', 'Marca Excluída com Sucesso!');

    }

    public function toggleStatus(Request $request)
    {
        $marca = Marca::find($request->id);

        if ($marca) {
            $marca->status = $request->status; // Atualiza o status com o valor vindo da requisição
            $marca->save(); // Salva a alteração no banco

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }


}
