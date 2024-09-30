@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Todos os Produtos</h1>


            @include('components/mensagens')

            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel</a></div>
                <div class="breadcrumb-item">Produto</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Todos os Produtos</h4>
                            <div class="card-header-action">
                                <a href="{{ route('produtos.create') }}" class="btn btn-primary">Novo Produto</a>
                            </div>
                        </div>

                        <!-- Formulário de Busca -->
                        <div class="card-body">
                            <form action="{{ route('produtos.index') }}" method="GET" class="mb-4">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control"
                                        placeholder="Buscar por Produto" value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">Buscar</button>
                                    </div>
                                    <a class="btn btn-primary d-flex align-items-center justify-content-center ml-2"
                                        href="{{ route('produtos.index') }}" style="text-align: center;">Cancelar</a>
                                </div>


                            </form>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th style="width: 120px;">Banner</th>
                                        <th>Produto</th>
                                        <th>Valor</th>
                                        <th>Status</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($produtos as $produto)
                                        <tr>
                                            <td>{{ $produto->id }}</td>
                                            <td style="width: 120px; height: 100px;">

                                                <img src="{{ asset($produto->capa) }}" alt="capa"
                                                    style="max-width: 100%; max-height: 100%; object-fit: cover;">

                                            </td>
                                            <td>{{ $produto->nome }}</td>

                                            <td>{{ 'R$ ' . number_format($produto->valor, 2, ',', '.') }}</td>

                                            <td>{{ $produto->status == 1 ? 'Ativo' : 'Inativo' }}</td>
                                            <td>
                                                <a href="{{ route('produtos.edit', $produto->id) }}"
                                                    class="btn btn-warning">Editar</a>
                                                <form id="delete-form-{{ $produto->id }}"
                                                    action="{{ route('produtos.destroy', $produto->id) }}" method="POST"
                                                    style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-danger"
                                                        onclick="confirmDelete({{ $produto->id }})">Excluir</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>


                            <div class="d-flex justify-content-center">
                                {{ $produtos->links('.pagination') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

           </section>
@endsection

@push('scripts')
 <script>
            function confirmDelete(sliderId) {
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
                        // Submeter o formulário se o usuário confirmar
                        document.getElementById('delete-form-' + sliderId).submit();
                    }
                });
            }
        </script>

@endpush
