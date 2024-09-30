@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Sub-Categoria</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Painel</a></div>
                <div class="breadcrumb-item"><a href="{{ route('subcategoria.index') }}">Sub-Categorias Listar</a></div>
                <div class="breadcrumb-item">Criar Nova Sub-Categoria</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Adicionar Sub-Categoria</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('subcategoria.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">

                                    <div class="form-group">
                                        <label>Categoria</label>
                                        <select name="id_categoria" class="form-control" required>
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>



                                    <label for="name">Nome da Sub-Categoria</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        placeholder="Digite o nome da sub-categoria" required>
                                </div>


                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="1">Ativo</option>
                                        <option value="0">Inativo</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Salvar Sub-Categoria</button>
                                <a href="{{ route('subcategoria.index') }}" class="btn btn-secondary">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
