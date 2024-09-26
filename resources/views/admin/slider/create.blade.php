@extends('admin.layouts.master')

@section('content')


    <section class="section">
        <div class="section-header">
            <h1>Cadastrar Slider</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel</a></div>
                <div class="breadcrumb-item active"><a href="{{ route('slider.index') }}">Listar</a></div>
                <div class="breadcrumb-item">Criar</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-header">
                            <h4>Criar Slider</h4>
                            <div class="card-header-action">
                                <a href="" class="btn btn-primary">Ajuda ?</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
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
                                    <label for="image">Image(1300x500px)</label>
                                    <input type="file" name="banner" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="titulo">Titulo 1</label>
                                    <input type="text" name="title_one" class="form-control"
                                        placeholder="Adicione o titulo 1" value="{{ old('title_one') }}">
                                </div>
                                <div class="form-group">
                                    <label for="titulo">Titulo 2</label>
                                    <input type="text" name="title_two" class="form-control"
                                        placeholder="Adicione o titulo 2" value="{{ old('title_two') }}">
                                </div>

                                <div class="form-group">
                                    <label for="valor">Valor</label>
                                    <input type="text" name="starting_price" class="form-control"
                                        placeholder="Adicione o preço" id="starting_price" value="{{ old('starting_price') }}">
                                </div>

                                <div class="form-group">
                                    <label for="titulo">Link</label>
                                    <input type="url" name="link" class="form-control" placeholder="Adicione o Link"
                                        value="{{ old('link') }}">
                                </div>
                                <div class="form-group">
                                    <label for="titulo">Status</label>
                                    <select name="status" class="form-control">
                                        <option value="1">Ativo</option>
                                        <option value="0">Inativo</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="titulo">Ordem</label>
                                    <input type="number" name="serial" class="form-control"
                                        placeholder="Adicione a ordem de exibição" value="{{ old('serial') }}">
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

 {{-- formata pra moeda brasileira --}}

{{-- @push('scripts')

<script src="https://unpkg.com/imask"></script>
    <script >
     var elemento = document.getElementById('starting_price');
    var maskOptions = {
        mask: 'num',  // Exibe o prefixo "R$"
        blocks: {
            num: {
                mask: Number,
                thousandsSeparator: '.',
                radix: ',', // Define vírgula como separador decimal
                scale: 2,  // Duas casas decimais
                signed: false,  // Não permite valores negativos
                normalizeZeros: true,  // Remove zeros à direita
                padFractionalZeros: true,  // Preenche com zeros à direita se necessário
            }
        }
    };

    var mask = IMask(elemento, maskOptions);
    </script>
@endpush --}}
