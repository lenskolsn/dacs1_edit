<div id="carouselExampleDark" class="carousel carousel-light slide d-sm-block d-none" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button style="opacity: 0;" type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0"
            class="active" aria-current="true" aria-label="Slide 1"></button>
        <button style="opacity: 0;" type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button style="opacity: 0;" type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        <button style="opacity: 0;" type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="3"
            aria-label="Slide 4"></button>
        <button style="opacity: 0;" type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="4"
            aria-label="Slide 5"></button>
        <button style="opacity: 0;" type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="5"
            aria-label="Slide 6"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="5000">
            <img src="https://media.viezone.vn/prod/2022/4/28/image_ca050753d4.png" class="d-block w-100" height="470"
                alt="...">
            <div class="carousel-caption d-none d-md-block ">
                <h5>New Fashion Sale!!!</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        @foreach ($banner as $bn)
            <div class="carousel-item">
                <img src="/storage/{{ $bn->hinhanh }}" class="d-block w-100" height="470" alt="">
                <div class="carousel-caption d-none d-md-block fs-5">
                    <h5>{{ $bn->ten }}</h5>
                    <p>{{ $bn->mota }}</p>
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
