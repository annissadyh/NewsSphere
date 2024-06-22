@extends('landingpage.layouts.landingpage')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mt-4">
                <div class="class">
                    <img src="{{ asset('uploads/' . $article->media) }}" class="img-fluid">
                </div>
                <div class="detail-content mt-2">
                    <div class="detail-badge">
                        <a href="" class="badge badge-warning">{{ $article->category->name_category }}</a>
                        <a href="" class="badge badge-primary">{{ $article->users->name }}</a>
                    </div>
                    <h2>{{ $article->title }}</h2>
                    <div class="detail-body">
                        <p>
                            {{ $article->content }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 mt-4">
                <div class="detail-sidebar-category">
                    <h4>Kategori</h4>
                    <hr>
                    @foreach ($categories as $row)
                        <div class="sidebar-kategori d-flex flex-wrap">
                            <a href="" style="text-decoration: none;">
                                <p>{{ $row->name_category }}</p>
                            </a>
                            <p class="ml-auto text-right"> <span
                                    class="text-black badge badge-dark">({{ $row->article->count() }})</span></p>
                        </div>
                    @endforeach

                    {{-- <div class="sidebar-kategori d-flex flex-wrap">
                    <a href="" style="text-decoration: none;">
                        <p>Nama Kategori</p>
                    </a>
                    <p class="ml-auto text-right"> <span class="badge badge-dark">7</span></p>
                </div>
                <div class="sidebar-kategori d-flex flex-wrap">
                    <a href="" style="text-decoration: none;">
                        <p>Nama Kategori</p>
                    </a>
                    <p class="ml-auto text-right"> <span class="badge badge-dark">7</span></p>
                </div>
                <div class="sidebar-kategori d-flex flex-wrap">
                    <a href="" style="text-decoration: none;">
                        <p>Nama Kategori</p>
                    </a>
                    <p class="ml-auto text-right"> <span class="badge badge-dark">7</span></p>
                </div>
                <div class="sidebar-kategori d-flex flex-wrap">
                    <a href="" style="text-decoration: none;">
                        <p>Nama Kategori</p>
                    </a>
                    <p class="ml-auto text-right"> <span class="badge badge-dark">7</span></p>
                </div> --}}
                </div>
                <div class="detail-sidebar-article">
                    <h4 class="mt-4">Artikel Terbaru</h4>
                    <hr>
                    @foreach ($postinganTerbaru as $row)
                        <div class="media mt-3">
                            <img src="{{ asset('uploads/' . $row->media) }}" width="78px" class="mr-3" alt="...">
                            <div class="media-body">
                                <a href="{{ route('detail-article', $row->slug) }}"
                                    style=" color: black; font-size: 1.5rem; text-decoration: none;">
                                    <h6 class="mt-0">{{ $row->title }}</h6>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
