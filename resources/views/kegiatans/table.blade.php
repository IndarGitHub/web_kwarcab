<div class="table-responsive">
    <table class="table" id="kegiatans-table">
        <thead>
            <tr>
                <th>Kategori</th>
                <th>User</th>
                <th>Judul Kegiatan</th>
                <th>Isi Kegiatan</th>
                <th>Picture</th>
                <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($kegiatans as $kegiatan)
            <tr>
                <td>{{ $kegiatan->category->name }}</td>
                <td>{{ $kegiatan->user->name }}</td>
                <td>{{ $kegiatan->judul_kegiatan }}</td>
                <td>{{ $kegiatan->isi_kegiatan }}</td>
                <td>{{ $kegiatan->picture }}</td>
                <td>{{ $kegiatan->status == 1 ? 'Aktif' : 'Tidak Aktif' }}</td>
                <td>
                    {!! Form::open(['route' => ['kegiatans.destroy', $kegiatan->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('kegiatans.show', [$kegiatan->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('kegiatans.edit', [$kegiatan->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
