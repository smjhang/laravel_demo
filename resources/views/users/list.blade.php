@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">使用者管理</div>
                    <div class="panel-body">
                        <!-- 使用 bootstrap 美化表格 -->
                        <table class="table table-striped table-bordered table-hover table-condensed" width="100%">
                            <thead>
                            <tr><th>登入帳號</th><th>使用者名稱</th><th>email</th><th>是否停權</th><th>身分</th></tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->login_name }}</td>
                                    <td>{{ $user->user_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <!-- 使用 bootstrap toggle 建立開關按鈕 -->
                                        <form class="form-horizontal" method="POST" action="{{ url('/user/status') }}">
                                            {{ csrf_field() }}
                                            <input type="checkbox"
                                                   @if ($user->status === $user::STATUS_ACTIVE)
                                                   checked
                                                   @endif
                                                   id="status"
                                                   name="status"
                                                   onchange="this.form.submit()"
                                                   data-toggle="toggle"
                                                   data-size="small"
                                                   data-onstyle="success"
                                                   data-offstyle="danger"
                                                   data-on="開放"
                                                   data-off="停權"
                                                   data-class="fast"/>
                                            <input type="hidden" value={{ $user->id }} name="id"/>
                                        </form>
                                    </td>
                                    <td>
                                        <form class="form-horizontal" method="POST" action="{{ url('/user/role') }}">
                                            {{ csrf_field() }}
                                            <select class="form-control" name="role" onchange="this.form.submit()">
                                                @foreach($user::$ALL_ROLES as $role)
                                                    @if ($role === $user->role)
                                                        <option value={{ $role }} selected>{{ $role }}</option>
                                                    @else
                                                        <option value={{ $role }}>{{ $role }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <input type="hidden" value={{ $user->id }} name="id"/>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
