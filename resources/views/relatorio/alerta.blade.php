<div>

    <div style="font-size: x-large;text-align: center;">
        <h2>Produtos Com Alertas</h2>
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




        @foreach($alertas as $alerta)



                    <tr align="center">
                        <td align="left" style="padding-right: 20em">{{\App\Produto::find($alerta->produto_id)->descricao}}</td>
                        <td align="left">{{$alerta->qtd_alerta}}</td>
                    </tr>

        @endforeach
            </tbody>
        </table>

        <br>

    </div>

</div>
