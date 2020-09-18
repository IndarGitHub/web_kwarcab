<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @if(Auth::user()->akses == 'user')
        @foreach($users as $user)
            <tr>
                <td>{!! $user->name !!}</td>
                <td>{!! $user->email !!}</td>
                <td>
                @if(Cache::has('user-is-online-' . $user->id))
                    <span class="label label-success">Online</span>
                @else
                    <span class="label label-danger">Offline</span>
                @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('users.show', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('users.edit', [$user->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        <!-- {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!} -->
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        @endif

        @if(Auth::user()->akses == 'admin' || Auth::user()->akses == 'superadmin')
        @foreach($admins as $admin)
            <tr>
                <td>{!! $admin->name !!}</td>
                <td>{!! $admin->email !!}</td>
                <td>{!! $admin->akses !!}</td>
                <td>
                @if(Cache::has('user-is-online-' . $admin->id))
                    <span class="label label-success">Online</span>
                @else
                    <span class="label label-danger">Offline</span>
                @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['users.destroy', $admin->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('users.show', [$admin->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('users.edit', [$admin->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        @endif
        </tbody>
    </table>
</div>
