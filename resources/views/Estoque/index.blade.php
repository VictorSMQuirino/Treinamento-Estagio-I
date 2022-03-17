<html>
    <head>
        <meta charset="UTF-8">
            <style>
                table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                }

                td, th {
                border: 1px solid #dddddd;
                text-align: left;
                padding: 8px;
                }

                tr:nth-child(even) {
                background-color: #dddddd;
                }
            </style>
    </head>

    <body>

        <h2>Listagem das Entradas e Saidas</h2><br>
        <a href="/estoque/create">Cadastro de Entrada e Saida</a>
        <br><br><br>

        <table>
            <tr>
                <th>ID</th>
                <th>Titulo do Produto</th>
                <th>Valor do Produto</th>
                <th>Volume do Produto</th>
                <th>Quantidade</th>
                <th>Tipo</th>
                <th>A��o</th>
            </tr>

            @foreach($estoque as $estoque_entrada_saida)
            <tr>
                <td>{{$estoque_entrada_saida->id}}</td>
                <td>{{$estoque_entrada_saida->produto_estoque->titulo}}</td>
                <td>{{$estoque_entrada_saida->produto_estoque->valor}}</td>
                <td>{{$estoque_entrada_saida->produto_estoque->volume}}</td>
                <td>{{$estoque_entrada_saida->quantidade}}</td>
                <td>{{$estoque_entrada_saida->flag}}</td>
                <td>
                        <a href="/estoque/{{$estoque_entrada_saida->id}}/edit"><b>Editar Estoque</b></a>
                        <br>

                        <form action="/estoque/{{$estoque_entrada_saida->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                            <button type="submit">Excluir Estoque</button>
                        </form>
                    </td>
            </tr>
            @endforeach

            
        </table>

    </body>
</html>