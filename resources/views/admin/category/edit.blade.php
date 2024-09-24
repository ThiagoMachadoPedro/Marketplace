@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Editar Categoria</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Painel</a></div>
                <div class="breadcrumb-item"><a href="{{ route('categoria.index') }}">Categorias</a></div>
                <div class="breadcrumb-item">Editar Categoria</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Editar Categoria</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('categoria.update', $categoria->id) }}" method="POST"
                              >
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Nome da Categoria</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{old('name' , $categoria->name) }}" required>
                                </div>

                                <!-- Seleção de ícone -->
                                <div class="form-group">
                                    <label for="icone">Ícone da Categoria</label>
                                    <!-- Input hidden para armazenar o ícone selecionado -->
                                    <input type="hidden" name="icone" id="icone" value="{{ $categoria->icone }}">
                                    <!-- Botão de seleção do ícone -->
                                    <div class="form-group">
                                        <div>
                                            <button class="btn btn-primary"
                                                style="text-align: left; width: 100%; padding: 15px;"
                                                data-selected-class="btn-danger" data-unselected-class="btn-primary"
                                                data-iconset="fontawesome5"
                                                 data-icon="{{$categoria->icone}}"
                                                  role="iconpicker"
                                                data-rows="5"
                                                 data-cols="7"
                                                  name="icone">
                                                Selecionar Ícone
                                            </button>

                                        </div>
                                    </div>
                                    <!-- Visualização do ícone atual -->

                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="1" {{ $categoria->status == 1 ? 'selected' : null }}>Ativo
                                        </option>
                                        <option value="0" {{ $categoria->status == 0 ? 'selected' : null }}>Inativo
                                        </option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary">Atualizar Categoria</button>
                                <a href="{{ route('categoria.index') }}" class="btn btn-secondary">Cancelar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
