@extends('layouts.default')

@section('content')
    
<div class="panel-header" style="background-color: #041444">
	<div class="page-inner py-5">
		<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
		</div>
	</div>
</div>
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Edit Artikel {{ $article->title }}</div>
                        <a href="{{ route('article.index') }}" class="btn btn-warning btn-sm ml-auto">Back</a>
					</div>
				</div>
				<div class="card-body">
                    <form method="post" action="{{ route('article.update', $article->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="judul">Judul Artikel</label>
                            <input type="text" name="title" class="form-control" id="text" value="{{ $article->title }}">
                        </div>
                        <div class="form-group">
                            <label for="konten">Konten</label>
                            <textarea type="text" name="content" class="form-control">{{ $article->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori</label>
                            <select name="category_id" class="form-control">
                                @foreach ($category as $row)
                                @if ($row->id == $article->category_id)
                                <option value={{ $row->id }} selected='selected'>{{ $row->name_category }}</option>
                                @else
                                <option value="{{ $row->id }}">{{ $row->name_category }}</option>
                                @endif

                                @endforeach 
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control"> 
                                <option value="1" {{ $article->status == '1' ? 'selected' : '' }}>Publish</option>
                                <option value="0" {{ $article->status == '0' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="media">Gambar Artikel</label>
                            <input type="file" name="media" class="form-control"> 
                            <br>
                            <label for="media">Gambar Sekarang:</label><br>
                            <img src="{{ asset('uploads/'. $article->media) }}" width="100">

                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">Save</button>                             
                            <button class="btn btn-danger btn-sm" type="reset">Reset</button>

                    </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
