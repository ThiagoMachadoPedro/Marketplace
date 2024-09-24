@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Criar Nova Categoria</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Painel</a></div>
            <div class="breadcrumb-item"><a href="{{ route('categoria.index') }}">Categorias Listar</a></div>
            <div class="breadcrumb-item">Criar Nova Categoria</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Adicionar Categoria</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categoria.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">

                               <div class="form-group">
    <div>
     <button class="btn btn-primary"
    style="text-align: left; width: 100%; padding: 15px;"
    data-selected-class="btn-danger"
    data-unselected-class="btn-primary"
    data-iconset="fontawesome5"
    data-icon="fas fa-award"
    role="iconpicker"
    data-rows="5"
    data-cols="7"
    name="icone">
    Selecionar Ícone
</button>

    </div>
</div>


                                <label for="name">Nome da Categoria</label>
                                <input type="text" name="name" id="name" class="form-control" placeholder="Digite o nome da categoria" required>
                            </div>


                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="1">Ativo</option>
                                    <option value="0">Inativo</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Salvar Categoria</button>
                            <a href="{{ route('categoria.index') }}" class="btn btn-secondary">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
