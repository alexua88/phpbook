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

                <!-- AAAAAAAAAAAAAAA -->

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">id</th>
                            <th>title</th>
                            <th>url (slug)</th>
                            <th>action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($genres as $genre)

                            <tr>
                                <td>{{ $genre->id }}</td>
                                <td>{{ $genre->title }}</td>
                                <td>{{ $genre->slug }}</td>

                                <td>
                                    <a href="{{ route('genres.edit', ['genre' => $genre->id]) }}" class="btn btn-info btn-sm float-left mr-1">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <form action="{{ route('genres.destroy', ['genre' => $genre->id]) }}" method="post" class="float-left">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Подтвердите удаление')">
                                            <i
                                                class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>







                            </tr>

                        @endforeach

                        </tbody>
                    </table>
                </div>

                <br><br>



                <!-- BBBBBBBBBBBBB -->




                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{ $genres->links('vendor.pagination.bootstrap-4') }}
                    </ul>
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
