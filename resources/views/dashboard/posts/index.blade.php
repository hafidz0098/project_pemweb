@extends('dashboard.layouts.main')
@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Blog</h1>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-body">
                      <a href="/dashboard/posts/create" class="btn btn-primary mb-3">Buat berita baru</a>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="datatable" width="100%" cellspacing="0">
                                <thead class="p-3 mb-2">
                                    <tr>
                                        <th>No</th>
                                        <th>Title</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td align="center">
                                            <a href="/dashboard/posts/{{ $post->slug }}" class=" btn btn-sm btn-info btn-bordred"><i class="fa fa-eye" title="Show"></i></a>
                                            <a href="/dashboard/posts/{{ $post->slug }}/edit" class=" btn btn-sm btn-warning btn-bordred"><i class="fa fa-edit" title="Edit"></i></a>
                                            <form action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                              <button class="btn btn-sm btn-danger btn-bordred" onclick="return confirm('Are you sure?')"><i class="fa fa-trash" title="Delete"></i></button>
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
    </section>
</div>
@endsection