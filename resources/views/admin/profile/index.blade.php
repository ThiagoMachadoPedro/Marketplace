@extends('admin.layouts.master')

@section('content')


   <section class="section">
          <div class="section-header">
            <h1>Meus Dados</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{route('admin.dashboard') }}">Painel de Controle</a></div>
              <div class="breadcrumb-item">Profile</div>
            </div>
          </div>

          <div class="section-body">
            <div class="row mt-sm-4">
                {{-- INICIO BLOCO 1 --}}
              <div class="col-12 col-md-12 col-lg-7">



               @if (session('success'))
                <div class="alert alert-success">
                    {{session('success')}}
                </div>
                @endif

                                         @if ($errors->any())
                  @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                        {{ $error }}
                         </div>
                   @endforeach
                @endif


                <div class="card">
                  <form method="post" action="{{route('admin.profile.update')}}" class="needs-validation" novalidate=""
                  enctype="multipart/form-data"
                  >
                    @csrf

                    <div class="card-header">
                      <h4>Atualizar Perfil</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                          <div class="form-group col-12">

                            <div class="mb-3">
                                @if (Auth::user()->image != null)
                                 <img src="{{ asset(Auth::user()->image) }}" alt="{{ Auth::user()->name }}" class="img-fluid" style="width: 100px; height:auto; object-fit: cover; border-radius:50%;">

                                  @else
                                  <img src="{{ asset('backend/assets/img/avatar/avatar-1.png') }}"  alt={{Auth::user()->name}} class="img-fluid" style="width: 100px; height:auto; object-fit: cover; border-radius:50%;">

                                @endif
                            </div>

                            <label>Foto de Perfil</label>
                            <input type="file" class="form-control" name="image" >
                          </div>
                          </div>

                        <div class="row">
                          <div class="form-group col-md-6 col-12">
                            <label>Nome</label>
                            <input type="text" class="form-control" name="name" value="{{Auth::user()->name}}" required="">
                          </div>

                          <div class="form-group col-md-6 col-12">
                            <label>Email</label>
                            <input type="emailç" class="form-control" name="email" value="{{Auth::user()->email}}"  required="">
                          </div>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                  </form>
                </div>
              </div>

                {{-- FIM BLOCO 1 --}}


                   {{-- INICIO BLOCO 2 --}}
              <div class="col-12 col-md-12 col-lg-7">






                <div class="card">
                  <form method="post" action="{{route('admin.profile.password')}}" class="needs-validation" novalidate=""
                  enctype="multipart/form-data"
                  >
                    @csrf

                                      @if ($errors->any())
                  @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                        {{ $error }}
                         </div>
                   @endforeach
                @endif

                    <div class="card-header">
                      <h4>Atualizar Senha</h4>
                    </div>
                    <div class="card-body">

                        <div class="row">
                          <div class="form-group col-12">

                            <label>Senha Atual</label>
                            <input type="password" class="form-control" name="current_password" placeholder="Digite sua senha atual">
                          </div>

                             <div class="form-group col-12">

                            <label>Nova Senha</label>
                            <input type="password" class="form-control" name="password" placeholder="Digite uma nova senha, minimo 8 caracteres">
                          </div>

                             <div class="form-group col-12">

                            <label>Confirme sua nova Senha</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirme sua nova senha">
                          </div>
                          </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                  </form>
                </div>
              </div>
               {{-- FIM BLOCO 1 --}}
            </div>
          </div>
        </section>

@endsection
