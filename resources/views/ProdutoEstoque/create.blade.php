<html>
    <head>
        <meta charset="UTF-8">
        <script  type="text/javascript" src="{{asset('plugins/AdminLTE-3.2.0-rc/dist/js/adminlte.min.js')}}"></script>
        <link rel="stylesheet" href="{{asset('plugins/AdminLTE-3.2.0-rc/dist/css/adminlte.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/AdminLTE-3.2.0-rc/plugins/fontawesome-free/css/all.min.css') }}">

        <style>
            .card{
            min-height: 100%;
            position: relative;
            }

            .card-footer{
                background-color: white;
                height: 70px;
            }

            div.card{
            padding-top: 20px;
            padding-bottom: 70px;
            }
        </style>
    </head>
    <title>Cadastro Produto Estoque</title>
        <body>
            <div class="card">
                <section class="content-header">
                    <div class="col-12">
                        <h2>Cadastro de Produto Estoque</h2>
                    </div>
                </section>

                @if(Session::has('mensagem')) 
            <div class="alert alert-danger alert-dismissible">
                <!-- data-dismiss - clas para fechar o button que abrir sem precisar de nada  -->
                <button type="button" class="close" data-dismiss="alert">x</button>
                <h5><i class="icon fas fa-ban"></i>Aten��o!</h5>
                {{Session::get('mensagem')}}
            </div>
            @endif

                <div class="card-body">
                    <div class="container">
                        <form action="/produto-estoque" method="POST" >
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Título</label>
                                    <input type="text" name="titulo_produto" class="form-control @error('titulo_produto') is-invalid @enderror" value="{{ old('titulo_produto') }}">
                                    @error('titulo_produto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Valor</label>
                                    <input type="text" name="valor_produto" class="form-control @error('valor_produto') is-invalid @enderror">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Volume</label>
                                    <input type="text" name="volume_produto" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Descrição</label>
                                    <textarea type="text" row="10" name="descricao_produto" class="form-control">{{ old('descricao_produto') }}</textarea>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-info float-right" style="margin:32px 0 0 50px;">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <footer class="card-footer">
                <div class="col-12" align='center'>
                    <p>Copyright © 2022. Feito em Jequié, Bahia.</p> 
                </div>
            </footer>
        </body>
</html>