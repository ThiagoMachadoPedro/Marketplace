@extends('admin.layouts.master')

@section('content')

  <section class="section">
      <div class="section-header">
        <h1>Editar Slider</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Painel</a></div>
          <div class="breadcrumb-item"><a href="{{ route('slider.index') }}">Listar</a></div>
          <div class="breadcrumb-item">Editar</div>
        </div>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12 ">
            <div class="card">
              <div class="card-header">
                <h4>Editar Slider</h4>
              </div>
              <div class="card-body">
                <form action="{{ route('slider.update', $slider->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="banner">Banner</label>
                        <input type="file" name="banner" class="form-control">
                        <img src="{{ asset($slider->banner) }}" alt="Banner" style="width: 150px; margin-top: 10px;">
                    </div>
                    <div class="form-group">
                        <label for="title_one">Título 1</label>
                        <input type="text" name="title_one" class="form-control" value="{{ old('title_one', $slider->title_one) }}">
                    </div>
                    <div class="form-group">
                        <label for="title_two">Título 2</label>
                        <input type="text" name="title_two" class="form-control" value="{{ old('title_two', $slider->title_two) }}">
                    </div>
                    <div class="form-group">
                        <label for="starting_price">Preço Inicial</label>
                        <input type="text" name="starting_price" class="form-control" value="{{ old('starting_price', $slider->starting_price) }}">
                    </div>
                    <div class="form-group">
                        <label for="link">Link</label>
                        <input type="url" name="link" class="form-control" value="{{ old('link', $slider->link) }}">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control">
                          <option value="1" {{ $slider->status == 1 ? 'selected' : '' }}>Ativo</option>
                          <option value="0" {{ $slider->status == 0 ? 'selected' : '' }}>Inativo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="serial">Ordem</label>
                        <input type="number" name="serial" class="form-control" value="{{ old('serial', $slider->serial) }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>

@endsection
