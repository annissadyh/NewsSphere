@extends('layouts.default')

@section('content')
    
<div class="panel-header bg-primary-gradient">
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
						<div class="card-title">Edit Kategori <i>{{ $category->name_category }}</i></div>
                        <a href="{{ route('category.index') }}" class="btn btn-warning btn-sm ml-auto">Back</a>
					</div>
				</div>
				<div class="card-body">
                    <form method="post" action="{{ route('category.update', $category->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="kategori">Nama Kategori</label>
                            <input type="text" name="name_category" value="{{ $category->name_category }}" class="form-control" id="text" placeholder="Enter Kategori">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm" type="submit">Save</button>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
