<div class="table-responsive">
    <table class="table" id="beritas-table">
        <thead>
            <tr>
                <th class="text-center">Kategori</th>
                <th class="text-center">User</th>
                <th class="text-center">Judul</th>
                <th class="text-center">Status Berita New</th>
                <th class="text-center">Persetujuan Berita</th>
                <th class="text-center" colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @if(Auth::user()->akses == 'admin' || Auth::user()->akses == 'superadmin')
        @foreach($beritas as $berita)
            <tr>
                {{-- mengganti id menjadi nama di index --}}
                <td>{!! $berita->category->name !!}</td>
                <td>{!! $berita->user->name !!}</td>
                <td>{!! $berita->judul !!}</td>
                <td>
                @if($berita->status == 1)
                Berita Utama
                @elseif($berita->status == 0)
                Berita Tidak Aktif
                @endif
                </td>
                <td class="text-center">
                @if($berita->persetujuan_berita == null)
                <form action="{{ url('beritas/persetujuan_berita/'.$berita->id) }}" method="patch">
                <div class="input-group">
                {!! Form::select('persetujuan_berita', array(1 => 'Terima', 2 => 'Tolak'), null, ['class' => 'form-control', 'placeholder' => 'Pilih Persetujuan']) !!}
                    <div class="input-group-btn">
                        <button class="btn btn-success" type="submit">
                            <i class="fa fa-check"></i>
                        </button>
                    </div>
                </div>
                </form>
                @elseif($berita->persetujuan_berita == 1)
                <span class="label label-success">Terima</span>
                @elseif($berita->persetujuan_berita == 2)
                <span class="label label-default">Tolak</span>
                @endif

                </td>
                <td>
                    {!! Form::open(['route' => ['beritas.destroy', $berita->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('beritas.show', [$berita->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('beritas.edit', [$berita->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        @endif

        @if(Auth::user()->akses == 'user')
        @foreach($beritas_user as $berita)
            <tr>
                {{-- mengganti id menjadi nama di index --}}
                <td>{!! $berita->category->name !!}</td>
                <td>{!! $berita->user->name !!}</td>
                <td>{!! $berita->judul !!}</td>
                <td>
                @if($berita->status == 1)
                Berita Utama
                @elseif($berita->status == 0)
                Berita Tidak Aktif
                @endif
                </td>
                <td class="text-center">
                @if($berita->persetujuan_berita == null)
                <span class="label label-warning">Menunggu Persetujuan</span>
                @elseif($berita->persetujuan_berita == 1)
                <span class="label label-success">Terima</span>
                @elseif($berita->persetujuan_berita == 2)
                <span class="label label-default">Tolak</span>
                @endif

                </td>
                <td>
                    {!! Form::open(['route' => ['beritas.destroy', $berita->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('beritas.show', [$berita->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('beritas.edit', [$berita->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        @endif

        </tbody>
    </table>
</div>