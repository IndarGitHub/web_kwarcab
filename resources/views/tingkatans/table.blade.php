<div class="table-responsive">
    <table class="table" id="tingkatans-table">
        <thead>
            <tr>
                <th>Tingkatan</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($tingkatans as $tingkatan)
            <tr>
                <td>{!! $tingkatan->tingkatan !!}</td>
                <td>
                    {!! Form::open(['route' => ['tingkatans.destroy', $tingkatan->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('tingkatans.show', [$tingkatan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('tingkatans.edit', [$tingkatan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
