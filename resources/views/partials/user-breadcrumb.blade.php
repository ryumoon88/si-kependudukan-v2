<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="fw-bold">{{ $breadcrumbs->last()->title }}</h2>
            <ol>
                @foreach ($breadcrumbs as $breadcrumb)
                    @if (!is_null($breadcrumb->url) && !$loop->last)
                        <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                    @else
                        <li>{{ $breadcrumb->title }}</li>
                    @endif
                @endforeach
            </ol>
        </div>
    </div>
</section>
