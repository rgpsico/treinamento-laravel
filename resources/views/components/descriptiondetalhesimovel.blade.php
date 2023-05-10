<!-- Description -->
<section class="description">
    <div class="container">

        <!-- Row  -->
        <div class="row justify-content-left">
            <div class="col-md-7 text-left">
                <h2 class="title">Resumo</h2>
            </div>
        </div>
        <!-- Row  -->

        <div class="row">
            <div class="col-md-9">
                <div class="description_box">
                    <p>{{ $data->description }} </p>

                </div>
            </div>
            <div class="col-md-3">
                <div class="single-sidebar">
                    <img class="add_img img-fluid" src="{{ asset('images/google_adds2.png') }}"
                        alt="Classified Plus">
                </div>
            </div>
        </div>
    </div>

</section>
<!-- End Description -->

<!-- Top_listings -->
<section class="top_listings">
    <div class="container">

        <!-- Row  -->
        <div class="row justify-content-center">
            <div class="col-md-7 text-center m-b-10">
                <h2 class="title">Patrocinados</h2>
            </div>
        </div>
        <!-- Row  -->


        <div class="row">

            <div class="col-md-12">

                <div class="single-sidebar m-b-50 m-t-50 text-center">
                    <img class="add_img img-fluid" src="{{ asset('images/discount-img.png') }}"
                        alt="{{ $data->title }}">
                </div>

            </div>
        </div>
    </div>
</section>