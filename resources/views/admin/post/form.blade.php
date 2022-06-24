@extends('admin.layouts.master')

@section('title', 'Панель администратора')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        @isset($post)
                            <h1 class="m-0">Редактирование поста {{ $post->title }}</h1>
                        @else
                            <h1 class="m-0">Добавление поста</h1>
                        @endisset
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard v1</li>
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
                        <form enctype="multipart/form-data" action="
                        @isset($post)
                        {{ route('admin.posts.update', $post) }}"
                        @else
                            {{ route('admin.posts.store') }}"
                        @endisset
                        method="post">
                        @csrf
                        @isset($post)
                            @method('PATCH')
                        @endisset
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <div class="form-group">
                            <input type="text" class="form-control" name="title" placeholder="Название"
                                   value="{{ $post->title ?? old('title') }}">
                        </div>
                        <div class="row d-flex justify-content-between" style="width: 915px">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Категория</label>
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                    @if(isset($post) and $post->category_id === $category->id)
                                                    selected
                                                    @elseif(old('category_id') == $category->id)
                                                    selected
                                                @endif>
                                                {{ $category->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-8">
                                <div class="form-group" data-select2-id="44">
                                    <label>Тэги</label>
                                    <select class="select2" multiple="multiple" name="tag_ids[]"
                                            data-placeholder="Выберите тэги"
                                            style="width: 100%;" data-select2-id="23" tabindex="-1" aria-hidden="true">
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                    @if(isset($post) and in_array($tag->id, $post->tags->pluck('id')->toArray()))
                                                    selected
                                                    @elseif(is_array(old('tag_ids')) and  in_array($tag->id,old('tag_ids')))
                                                    selected
                                                @endif>
                                                {{ $tag->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                @error('content')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <textarea id="summernote"
                                              name="content">{{ $post->content ?? old('content') }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="width: 915px">
                            <div class="col-6 d-flex">
                                <div class="form-group">
                                    <label for="exampleInputFile">Превью</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="preview_image">
                                            <label class="custom-file-label">Выберите изображение</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузка</span>
                                        </div>
                                    </div>
                                    @isset($post)
                                        <img src="{{ asset('storage/' . $post->preview_image) }}" alt="Превью"
                                             class="w-100 mt-3" style="height: 250px">
                                    @endisset
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Главное изображение</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="main_image">
                                            <label class="custom-file-label">Выберите изображение</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Загрузка</span>
                                        </div>
                                    </div>
                                    @isset($post)
                                        <img src="{{ asset('storage/' . $post->main_image) }}" alt="Главное изображение"
                                             class="w-100 mt-3" style="height: 250px">
                                    @endisset
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success">
                                @isset($post)
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

