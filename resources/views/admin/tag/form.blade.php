@extends('admin.layouts.master')

@section('title', 'Панель администратора')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @isset($tag)
                            <h1 class="m-0">Редактирование тэга {{ $tag->title }}</h1>
                        @else
                            <h1 class="m-0">Добавление тэга</h1>
                        @endisset
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.tags.index') }}">Тэги</a></li>
                            @isset($tag)
                                <li class="breadcrumb-item active">Редактирование тэга {{ $tag->title }}</li>
                            @else
                                <li class="breadcrumb-item active">Добавление тэга</li>
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
                        @isset($tag)
                        {{ route('admin.tags.update', $tag) }}"
                        @else
                            {{ route('admin.tags.store') }}"
                        @endisset
                        method="post">
                        @csrf
                        @isset($tag)
                            @method('PATCH')
                        @endisset
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Название"
                                   value="{{ $tag->title ?? old('title') }}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">
                                @isset($tag)
                                    Сохранить
                                @else
                                    Добавить
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

