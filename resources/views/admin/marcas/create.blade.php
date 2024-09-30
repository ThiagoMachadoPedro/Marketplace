@extends('admin.layouts.master')

@section('content')


    <section class="section">
        <div class="section-header">
            <h1>Cadastrar Marca</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('marcas.index') }}">Listar</a></div>
                <div class="breadcrumb-item">Criar Marca</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Criar Marca</h4>
                            <div class="card-header-action">
                                <a href="" class="btn btn-primary">Ajuda ?</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('marcas.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

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
                                    <label for="">Logo(600x360px)</label>
                                    <input type="file" name="logo" placeholder="adicionar logo" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" name="nome" class="form-control" placeholder="Adicione a marca"
                                        value="{{ old('nome') }}">
                                </div>

                                <div class="form-group">
                                    <label for="destacada">Destaque</label>
                                    <select name="destacada" class="form-control">
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1">Ativo</option>
                                        <option value="0">Inativo</option>
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
