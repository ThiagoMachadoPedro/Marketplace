@extends('admin.layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Todos os Slides</h1>


           @include('components/mensagens')

        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel</a></div>
            <div class="breadcrumb-item">Listar</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Slide Destaque</h4>
                        <div class="card-header-action">
                            <a href="{{ route('slider.create') }}" class="btn btn-primary">Novo Slider</a>
                        </div>
                    </div>

                    <!-- Formulário de Busca -->
                    <div class="card-body">
                        <form action="{{ route('slider.index') }}" method="GET" class="mb-4">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" placeholder="Buscar por Categoria" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Buscar</button>
                                </div>
                                   <a class="btn btn-primary d-flex align-items-center justify-content-center ml-2" href="{{ route('slider.index') }}" style="text-align: center;">Cancelar</a>
            </div>
                            </div>
                        </form>

                   <table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th style="width: 120px;">Banner</th> <!-- Define uma largura fixa para a coluna do banner -->
            <th>Título 1</th>
            <th>Preço</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($sliders as $slider)
            <tr>
                <td>{{ $slider->id }}</td>
                <td style="width: 120px; height: 100px;"> <!-- Define uma largura e altura fixas para a célula -->
                    <img src="{{ asset($slider->banner) }}" alt="Banner" style="max-width: 100%; max-height: 100%; object-fit: cover;"> <!-- Limita a largura e altura da imagem -->
                </td>
                <td>{{ $slider->title_one }}</td>
                <td>{{ 'R$ ' . number_format($slider->starting_price, 2, ',', '.') }}</td>

                <td>{{ $slider->status == 1 ? 'Ativo' : 'Inativo' }}</td>
                <td>
                    <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-warning">Editar</a>
                    <form id="delete-form-{{ $slider->id }}" action="{{ route('slider.destroy', $slider->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $slider->id }})">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>



                       <!-- Adicionando os links de paginação -->
                       <div class="d-flex justify-content-center">
    {{ $sliders->links('.pagination') }}
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
