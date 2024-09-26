<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubCategoria extends Model
{
    use HasFactory;


    // Definir explicitamente o nome da tabela
    protected $table = 'sub_categoria';  // Certifique-se de usar o nome correto da tabela

    // Permitir o preenchimento em massa (mass assignment)
    protected $fillable = ['id_categoria', 'name', 'slug', 'status'];


    public function categoriaRelacionada()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
