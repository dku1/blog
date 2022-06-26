@extends('admin.layouts.master')

@section('title', 'Панель администратора')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @isset($user)
                            <h1 class="m-0">Редактирование пользователя {{ $user->name }}</h1>
                        @else
                            <h1 class="m-0">Создание пользователя</h1>
                        @endisset
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Пользователи</a></li>
                            @isset($user)
                                <li class="breadcrumb-item active">Редактирование пользователя {{ $user->name }}</li>
                            @else
                                <li class="breadcrumb-item active">Создание пользователя</li>
                            @endisset
                        </ol>
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-3">
                        <form action="
                        @isset($user)
                        {{ route('admin.users.update', $user) }}"
                        @else
                            {{ route('admin.users.store') }}"
                        @endisset
                        method="post">
                        @csrf
                        @isset($user)
                            @method('PATCH')
                        @endisset
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Имя"
                                   value="{{ $user->name ?? old('name') }}">
                        </div>
                        @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email"
                                   value="{{ $user->email ?? old('email') }}">
                        </div>
                        @isset($user)
                            <input type="text" name="user_id" value="{{ $user->id }}" hidden>
                        @endisset
                        <div class="form-group">
                            <label>Роль</label>
                            <select class="form-control" name="role">
                                @foreach($roles as $id => $role)
                                    <option value="{{ $id }}" @if(isset($user) and $user->role == $id) selected @endif>
                                        {{ $role }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">
                                @isset($user)
                                    Сохранить
                                @else
                                    Создать
                                @endisset
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

