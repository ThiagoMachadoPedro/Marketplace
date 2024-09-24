<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;

class SliderController extends Controller
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
            $sliders = Slider::where('title_one', 'like', '%' . $search . '%')
                ->paginate(7);
        } else {
            // Se não houver busca, retorna todos os sliders
            $sliders = Slider::paginate(7);
        }

        return view('admin.slider.index', compact('sliders'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
    {
        $request->validate([
            'banner' => ['required', 'image', 'max:2048'],
            'title_one' => ['string', 'max:200'],
            'title_two' => ['required', 'max:200'],
            'starting_price' => ['required', 'max:200'],
            'link' => ['url'],
            'serial' => ['required', 'integer'],
            'status' => ['required'],
        ]);

        $slider = new Slider();

        // Usando o trait para upload da imagem
        $imagePath = $this->uploadImage($request, 'banner', 'uploads');
        if ($imagePath) {
            $slider->banner = $imagePath;
        }

        $slider->title_one = $request->title_one;
        $slider->title_two = $request->title_two;
        $slider->starting_price = $request->starting_price;
        $slider->link = $request->link;
        $slider->serial = $request->serial;
        $slider->status = $request->status;

        $slider->save();

        return redirect()->route('slider.index')->with('success', 'Slider Salvo com Sucesso!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'banner' => ['nullable', 'image', 'max:2048'],
            'title_one' => ['string', 'max:200'],
            'title_two' => ['required', 'max:200'],
            'starting_price' => ['required', 'max:200'],
            'link' => ['url'],
            'serial' => ['required', 'integer'],
            'status' => ['required'],
        ]);

        // Encontrar o slider a ser atualizado
        $slider = Slider::findOrFail($id);

        // Verificar se uma nova imagem foi enviada
        if ($request->hasFile('banner')) {
            // Verificar se já existe uma imagem antiga e excluí-la
            if ($slider->banner && file_exists(public_path($slider->banner))) {
                unlink(public_path($slider->banner));
            }

            // Processar a nova imagem
            $image = $request->file('banner');
            $ext = $image->getClientOriginalExtension();
            $day = date('d');
            $month = date('m');
            $year = date('Y');
            $imageName = 'media_' . uniqid() . '-msflix-' . $day . '.' . $month . '.' . $year . '.' . $ext;
            $image->move(public_path('uploads'), $imageName);

            // Atualizar o caminho da nova imagem no banco de dados
            $slider->banner = 'uploads/' . $imageName;
        }

        // Atualizar outros campos
        $slider->title_one = $request->title_one;
        $slider->title_two = $request->title_two;
        $slider->starting_price = $request->starting_price;
        $slider->link = $request->link;
        $slider->serial = $request->serial;
        $slider->status = $request->status;

        // Salvar as alterações
        $slider->save();

        return redirect()->route('slider.index')->with('success', 'Slider Atualizado com Sucesso!');
    }


    public function destroy($id)
    {
        // Encontrar o slider a ser excluído
        $slider = Slider::findOrFail($id);

        // Verificar se a imagem existe e excluí-la
        if ($slider->banner && file_exists(public_path($slider->banner))) {
            unlink(public_path($slider->banner));
        }

        // Excluir o registro do slider
        $slider->delete();

        return redirect()->route('slider.index')->with('success', 'Slider Excluído com Sucesso!');
    }


}
