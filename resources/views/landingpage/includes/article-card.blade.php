<div class="article">
  @forelse ($articles as $row)
      <div class="col-md-3 mt-3">
          <div class="card">
              <div class="card-img">
                  <img class="card-img-item" src="{{ asset('uploads/' . $row->media) }}" class="card-img-top" alt="{{ $row->title }}">
              </div>
              <div class="card-body">
                  <h5 class="card-title">
                      <a href="{{ route('detail-article', $row->slug) }}" style="text-decoration: none;">
                          {{ $row->title }}
                      </a>
                  </h5>
              </div>
              <div class="card-body">
                  <a href="#" class="card-link">{{ $row->users->name }}</a>
                  <a href="#" class="card-link">{{ $row->category->name_category }}</a>
              </div>
          </div>
      </div>
  @empty
      <p>Data Masih Kosong</p>
  @endforelse
</div>
