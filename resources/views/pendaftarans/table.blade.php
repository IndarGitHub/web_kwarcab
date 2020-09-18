<div class="table-responsive">
    <table class="table" id="pendaftarans-table">
        <thead>
            <tr>
                <th>Kta</th>
                <th>User</th>
                <th>No Tlp</th>
                <th>Nama Gudep</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <!-- <th>Jenis Kelamin Id</th> -->
                <th>Tingkatan</th>
                <th>Bukti Pembayaran</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($pendaftarans as $pendaftaran)
            <tr>
                <td>{!! $pendaftaran->kta->name !!}</td>
                <td>{!! $pendaftaran->user->name !!}</td>
                <td>{!! $pendaftaran->no_tlp !!}</td>
                <td>{!! $pendaftaran->nama_gudep !!}</td>
                <td>{!! $pendaftaran->tempat_lahir !!}</td>
                <td>{!! tanggal_indonesia($pendaftaran->tanggal_lahir) !!}</td>
                <td>{!! $pendaftaran->tingkatan->tingkatan !!}</td>
                <td>{!! $pendaftaran->bukti_pembayaran !!}</td>
                <td>
                    {!! Form::open(['route' => ['pendaftarans.destroy', $pendaftaran->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('pendaftarans.show', [$pendaftaran->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('pendaftarans.edit', [$pendaftaran->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
