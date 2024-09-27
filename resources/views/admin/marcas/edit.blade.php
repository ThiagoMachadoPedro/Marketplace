@extends('admin.layouts.master')

@section('content')


    <section class="section">
        <div class="section-header">
            <h1>Editar Marca</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('marcas.index') }}">Listar</a></div>
                <div class="breadcrumb-item">Editar Marca</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Editar Marca</h4>
                            <div class="card-header-action">
                                <a href="" class="btn btn-primary">Ajuda ?</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('marcas.update' , $marca->id ) }}"  method="post" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')


                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <div class="alert alert-danger">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                @endif


                                  <div class="form-group">
                        <label for="logo">Logo (600x360px)</label>
                        <input type="file" name="logo" class="form-control">
                        <img src="{{ asset($marca->logo) }}" alt="logo" style="width: 150px; margin-top: 10px;">
                    </div>

                                 <div class="form-group">
                        <label for="nome">Nome da Marca</label>
                        <input type="text" name="nome" class="form-control" value="{{ old('nome', $marca->nome) }}">
                    </div>

                                 <div class="form-group">
                        <label for="destacada">Destacada</label>
                        <select name="destacada" class="form-control">
                          <option value="1" {{ $marca->destacada == 1 ? 'selected' : '' }}>sim</option>
                          <option value="0" {{ $marca->destacada == 0 ? 'selected' : '' }}>não</option>
                        </select>
                    </div>

                                           <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                          <option value="1" {{ $marca->status == 1 ? 'selected' : '' }}>Ativo</option>
                          <option value="0" {{ $marca->status == 0 ? 'selected' : '' }}>Inativo</option>
                        </select>
                    </div>
                                <button type="submit" class="btn btn-primary">Salvar</button>

                            </form>
                        </div>

                    </div>
                </div>

            </div>

        </div>


    </section>


@endsection
