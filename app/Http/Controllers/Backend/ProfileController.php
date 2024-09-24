<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
class ProfileController extends Controller
{
    public function index(){
        return view('admin.profile.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
            'image' => ['image', 'max:2048']
        ]);

        $user = Auth::user();

        // Se uma nova imagem foi enviada
        if ($request->hasFile('image')) {
            // Verifica se o usuário já tem uma imagem e a apaga do sistema
            if (File::exists(public_path($user->image))) {
                File::delete(public_path($user->image));
            }

            // Move a nova imagem para a pasta uploads
            $image = $request->file('image');
            $imageName = rand() . '--msflix-' . $image->getClientOriginalName();
            $image->move(public_path('uploads'), $imageName);

            // Atualiza o caminho da nova imagem no banco de dados
            $path = 'uploads/' . $imageName;
            $user->image = $path;
        }

        // Atualiza os outros campos do usuário
        $user->name = $request->name;
        $user->email = $request->email;

        // Salva as mudanças no banco de dados
        $user->save();

        return redirect()->back()->with('success', 'Dados atualizados com sucesso!');
    }

    public function updatePassword(Request $request){

        // dd($request->all());
        $request->validate(([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed' , 'min:8'],
        ]));

        $request->user()->update([
            'password' => bcrypt($request->password)
        ]);


        return redirect()->back();
    }

}
