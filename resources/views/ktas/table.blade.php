<div class="table-responsive">
    <table class="table" id="ktas-table">
        <thead>
            <tr>
                <th>Nomor</th>
        <th>Name</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($ktas as $kta)
            <tr>
                <td>{!! $kta->nomor !!}</td>
            <td>{!! $kta->name !!}</td>
                <td>
                    {!! Form::open(['route' => ['ktas.destroy', $kta->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('ktas.show', [$kta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('ktas.edit', [$kta->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
