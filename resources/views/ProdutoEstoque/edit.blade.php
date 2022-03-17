<html>
    <title>Alteração de Produto Estoque</title>
        <body>
            <h2>Alteração de Produto Estoque</h2>
            <form action="/produto-estoque/{{$produto_estoque->id}}" method="POST" >
                @csrf
                @method('PUT')
            <label>Título</label><br>
            <input type="text" name="titulo_produto" value="{{$produto_estoque->titulo}}"><br><br>
            <label>Valor</label><br>
            <input type="text" name="valor_produto" value="{{$produto_estoque->valor}}"><br><br>
            <label>Volume</label><br>
            <input type="text" name="volume_produto" value="{{$produto_estoque->volume}}"><br><br>
            <label>Descrição</label><br>
            <textarea type="text" row="10" name="descricao_produto">{{$produto_estoque->descricao}}</textarea><br><br>
            <button type="submit">enviar</button>
            </form>
        </body>
</html>