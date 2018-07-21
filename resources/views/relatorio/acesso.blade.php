<div>

    <div style="font-size: x-large;text-align: center;">
        <h2>Produtos Acessados</h2>
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




        @foreach($acessos as $acesso)



                    <tr align="center">
                        <td align="left" style="padding-right: 20em">{{\App\Produto::find($acesso->produto_id)->descricao}}</td>
                        <td align="left">{{$acesso->qtd_acessos}}</td>
                    </tr>

        @endforeach
            </tbody>
        </table>

        <br>

    </div>

</div>
