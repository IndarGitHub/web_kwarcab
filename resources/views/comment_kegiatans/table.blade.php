<div class="table-responsive">
    <table class="table" id="commentKegiatans-table">
        <thead>
            <tr>
                <th>Kegiatan</th>
                <th>User</th>
                <th>Komentar</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($commentKegiatans as $commentKegiatan)
            <tr>
                <td>{{ $commentKegiatan->kegiatan->judul_kegiatan }}</td>
                <td>{{ $commentKegiatan->user->name }}</td>
                <td>{{ $commentKegiatan->komentar }}</td>
                <td>
                    {!! Form::open(['route' => ['commentKegiatans.destroy', $commentKegiatan->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('commentKegiatans.show', [$commentKegiatan->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
