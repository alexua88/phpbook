@extends('admin.layouts.layout')

@section('content')





    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Blank Page</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blank Page</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Title</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">


                    <form role="form" method="post" action="{{ route('catalogs.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Название</label>
                                <input type="text" name="title"
                                       class="form-control @error('title') is-invalid @enderror" id="title"
                                       placeholder="Название">
                            </div>

                            <div class="form-group">
                                <label for="title">slug (url)</label>
                                <input type="text" name="slug"
                                       class="form-control @error('slug') is-invalid @enderror" id="slug"
                                       placeholder="URL">
                            </div>

                            <div class="form-group">
                                <label for="content">Аннотация</label>
                                <textarea name="text" class="form-control @error('content') is-invalid @enderror" id="text" rows="7"
                                          placeholder="Контент ..."></textarea>
                            </div>

                            <div class="form-group">
                                <label for="genres">Жанры</label>
                                <select name="genres[]" id="genres" class="select2" multiple="multiple"
                                        data-placeholder="Выбор жанров" style="width: 100%;">
                                    @foreach($genres as $a => $b)
                                        <option value="{{ $a }}">{{ $b }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="authors">Авторы</label>
                                <select name="authors[]" id="authors" class="select2" multiple="multiple"
                                        data-placeholder="Выбор тегов" style="width: 100%;">
                                    @foreach($authors as $c => $d)
                                        <option value="{{ $c }}">{{ $d }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="thumbnail">Изображение</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" name="img" id="img"
                                               class="custom-file-input">
                                        <label class="custom-file-label" for="img">Choose file</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </form>



                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>


@endsection
