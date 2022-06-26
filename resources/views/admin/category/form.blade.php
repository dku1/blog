@extends('admin.layouts.master')

@section('title', 'Панель администратора')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @isset($category)
                            <h1 class="m-0">Редактирование категории {{ $category->title }}</h1>
                        @else
                            <h1 class="m-0">Добавление категории</h1>
                        @endisset
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Категории</a></li>
                            @isset($category)
                                <li class="breadcrumb-item active">Редактирование категории {{ $category->title }}</li>
                            @else
                                <li class="breadcrumb-item active">Добавление категории</li>
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
                        @isset($category)
                        {{ route('admin.categories.update', $category) }}"
                        @else
                        {{ route('admin.categories.store') }}"
                              @endisset
                              method="post">
                            @csrf
                        @isset($category)
                            @method('PATCH')
                        @endisset
                            @error('title')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <input type="text" class="form-control" name="title" placeholder="Название"
                                       value="{{ $category->title ?? old('title') }}">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">
                                    @isset($category)
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

