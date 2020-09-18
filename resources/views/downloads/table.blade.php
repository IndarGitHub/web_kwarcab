<div class="table-responsive">
    <table class="table" id="downloads-table">
        <thead>
            <tr>
                <th>Judul</th>
                <th>User</th>
                <th>Keterangan</th>
                <th>File Download</th>
                <th>Status File</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($downloads as $download)
            <tr>
                <td>{!! $download->judul !!}</td>
                <td>{!! $download->user->name !!}</td>
                <td>{!! $download->keterangan !!}</td>
                <td>{!! $download->file_download !!}</td>
                <td>{!! $download->status_file !!}</td>
                <td>
                    {!! Form::open(['route' => ['downloads.destroy', $download->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('downloads.show', [$download->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('downloads.edit', [$download->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
