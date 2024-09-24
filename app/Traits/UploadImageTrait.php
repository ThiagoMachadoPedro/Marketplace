<?php

namespace App\Traits; // Corrigido para App\Traits

use Illuminate\Http\Request;

trait UploadImageTrait
{
    public function uploadImage(Request $request, $inputName, $path)
    {
        // Se uma nova imagem foi enviada
        if ($request->hasFile($inputName)) {
            // Move a nova imagem para a pasta uploads
            $image = $request->file($inputName); // Corrigido para $request->file()
            $ext = $image->getClientOriginalExtension();
            $day = date('d');
            $month = date('m');
            $year = date('Y');
            $imageName = 'media_' . uniqid() . '-mySistem-' . $day . '.' . $month . '.' . $year . '.' . $ext;
            $image->move(public_path($path), $imageName);

            // Retorna o caminho da nova imagem
            return $path . '/' . $imageName;
        }

        return null; // Caso não haja arquivo de imagem enviado
    }
}
