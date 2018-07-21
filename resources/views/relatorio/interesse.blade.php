<div>

    <div style="font-size: x-large;text-align: center;">
        <h2>Produtos Interesse</h2>
    </div>

    <div>



        <table>
            <thead>
            <tr>
                <th class="col-md-10"><strong>Produto</strong></th>
                <th class="col-sm-10"><strong>Qtd</strong></th>
            </tr>
            </thead>


            <tbody>




        @foreach($interesses as $interesse)

            @foreach($interesse as $item)

                @if($loop->first)
                    <tr align="center">
                        <td align="left">{{$item->produto->descricao}}--------------------------------------------------------</td>
                        <td align="left">{{$interesse->count()}}</td>
                    </tr>
                @endif
                @endforeach
        @endforeach
            </tbody>
        </table>

        <br>

    </div>

</div>
