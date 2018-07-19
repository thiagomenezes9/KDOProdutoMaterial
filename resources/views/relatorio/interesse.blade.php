<div>

    <div style="font-size: x-large;text-align: center;">
        <h2>Produtos Interesse</h2>
    </div>

    <div>
        @foreach($interesses as $interesse)

            <p>{{$interesse->produto->descricao}}</p>

        @endforeach

        <br>

    </div>

</div>
