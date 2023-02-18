@foreach ($catCompo as $cat)
    <div class="col-md-4 m-t-30">
        <div class="categories_box">
            <a href="{{ $cat->link }}">
                <img src="images/Categories/categories2.png" alt="{{ $cat->name }}" />
            </a>
            <div class="overlay text-center">
                <a href="#">
                    <img src="images/Categories/Electronics.png" alt="{{ $cat->name }}" />
                    <p> {{ $cat->name }}</p>
                </a>
            </div>
        </div>
    </div>
@endforeach
