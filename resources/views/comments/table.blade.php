<div class="table-responsive">
    <table class="table" id="comments-table">
        <thead>
            <tr>
                <th>Berita</th>
                <th>User</th>
                <th>Komentar</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->berita->judul }}</td>
                <td>{{ $comment->user->name }}</td>
                <td>
                {{str_limit(strip_tags($comment->komentar), 30)}}
                @if (strlen(strip_tags($comment->komentar)) > 30)
                ... <a href="{!! route('comments.show', [$comment->id]) !!}">Read More</a>
                @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['comments.destroy', $comment->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('comments.show', [$comment->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
