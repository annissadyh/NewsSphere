<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Include Bootstrap CSS (Make sure you have Bootstrap included in your project) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div id="carouselExampleDark" class="carousel carousel-dark slide">
    <div class="carousel-indicators">
        @foreach($latestArticle as $key => $article)
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}" aria-current="{{ $key == 0 ? 'true' : '' }}" aria-label="Slide {{ $key + 1 }}"></button>
        @endforeach
    </div>
    <div class="carousel-inner">
        @foreach($latestArticle as $key => $article)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}" data-bs-interval="10000">
                <img src="{{ asset('uploads/' . $article->media) }}" class="d-block w-100" alt="{{ $article->title }}">
                <div class="carousel-caption d-none d-md-block">
                    <a href="{{ route('detail-article', $article->slug) }}" style="padding: 5px; background-color: rgba(0,0,0,0.5); color: white; font-size: 1.5rem; text-decoration: none;">
                        {{ $article->title }}
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


    <!-- Include Bootstrap JS and dependencies (Make sure you have Bootstrap JS included in your project) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
</body>

