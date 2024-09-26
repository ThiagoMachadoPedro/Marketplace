@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Categoria Filho</h1>

        @include('components/mensagens')

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel</a></div>
            <div class="breadcrumb-item">Categoria Filho</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Categoria Filho</h4>
                        <div class="card-header-action">
                            <a href="{{route('categoria-filho.create')}}" class="btn btn-primary">Criar Categoria Filho</a>
                        </div>
                    </div>

                    <!-- Formulário de Busca -->
                    <div class="card-body">
                        <form action="{{ route('categoria-filho.index') }}" method="GET" class="mb-4">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Buscar por Categoria filho" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Buscar</button>
                                    <!-- Botão Cancelar estilizado e com texto centralizado -->
                                    <a class="btn btn-primary d-flex align-items-center justify-content-center ml-2" href="{{ route('categoria-filho.index') }}" style="text-align: center;">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Tabela de Categorias -->
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Categoria</th>
                                    <th>Sub-Categoria</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categoriaFilhos as $categoria)
                                    <tr>
                                        <td>{{ $categoria->id }}</td>
                                        <td>{{ $categoria->name }}</td>
                                        <td>{{ $categoria->categoriaRelacionada->name }}</td>
                                        <td>{{ $categoria->subcategoria->name }}</td>
                                        <td>{{ $categoria->status == 1 ? 'Ativo' : 'Inativo' }}</td>
                                        <td>
                                            <a href="{{ route('subcategoria.edit', $categoria->id) }}" class="btn btn-warning">Editar</a>

                                            <form id="delete-form-{{ $categoria->id }}" action="{{ route('subcategoria.destroy', $categoria->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $categoria->id }})">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Links de Paginação -->
                        <div class="d-flex justify-content-center">
                            {{ $categoriaFilhos->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(categoriaId) {
            Swal.fire({
                title: 'Você tem certeza?',
                text: "Esta ação não pode ser desfeita!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sim, excluir!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + categoriaId).submit();
                }
            });
        }
    </script>

</section>

@endsection
