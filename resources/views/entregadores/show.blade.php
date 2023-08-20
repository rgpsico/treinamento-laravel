@extends('layouts.app')



@section('content')
    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none"></h3>
                    <div class="col-12">
                                    <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADhElEQVR4nO2ZOWhVQRSGv8Q1BpUYVLJgEhfcRQujFkoUJWCjIipY2GlhY5HC1KlSiKCdCApWJkUaEQQLMUkhEY2KkUDENSouGCOKUWOuDPwDh+GJ777Nq74fBt5758zZ5p6Z+e+DIv5v7AYGgHv6/NdhA3AdiIJxA9jCX4BlQJcJ/AVwWOOF+b1LuonDXOAU8F2BfgLagZlGZwZwHPggnR/ABaCaBMAF2qbAXXBfgdNKzKEU2KvhPiPZaelGmtsWJF0wTAGOAK8UzATQCSw2OtuAW+Zxug/sNPIFwBmtjJO/04pNK0QCJcB+YMgEeA1Yb3RWAZeN/LGG/35ZOh7rZcPLh+TD+coLNgG9xuEDYJ+RV6vC45K/V4WnmxV8Y/rDrWCdmb8duGPs3wS25jKB5XLqHQwrqEmSlyvgj5J/U0K+TywqtAl8ke5nfZ8teamKY1fwKrA2mwRqgXOmwm63aQXKJHdVPgq8Nn1yEViYhu2F0p3Q3Ney5WwiH61mhxtXLC6m2HgmI2PASaDSyPYAg6Zq3UBjBj4aNdfbGZRtj0r5HpP8aSaJeOMN5reNQZ84x7vIHruCwvTKl0eDkcWGnVinw2si2CqnkjtMDrZ0Ny4BS1LEEwvhPSlVc+YD5cHmEY7Y6ElhpIbCoSaFf9dPWSHjaiTNb1RMJGEFfKkdxW6XjvndzdH2W7BE3E7imV/3L5rQyRKfyCKgw5wjfoWO6LO/onRIN3GJzNG5MRYwv1kpmN9ocGmcl4REyhTciAx9V3BV5pZ6QMMzvyrpeLo7IhtlfyKREl2jHwXX6DUB87tt5AMB81saXPufB9f+vCeyA+gPiE1TwEsuBbxkOLgXOR2PJtnw8n75yFsiK4IKPlMFS81Vuj14WeDfkIT94R/B+cEKPwxWeF0uE6kFzhvy76hpiyH/00VuRg25OWv6xKJKMk/CRjXX2UA2W+TDU13nuzYXiVjidEI01FfxIPDEGLoCrP6dQelcMfOeyJZ/kVAhX+kSpSidRLxSvfltM9BnZO6dbTPx0ay53k6fbHvUpxlkFCcRRF46zYH3FjiW4U7j4XrskDkwfX+sjBFkFCeRVMTJHnh/kihF6SRSaOKUCVGK4p4jheIbcf1ExUTyjOKKpItij8RE8dFKF8VHKybCgkVpjowdJCmR7mwc5At59xP9a4lEBRp5Q08Bk8j6r4EiSCB+Aory/xOKFWWHAAAAAElFTkSuQmCC">
                                          </div>



                    <div class="col-12 product-image-thumbs">
                        
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{ $model->name ?? '' }}</h3>
                    <p>{{ $model->telefone ?? '' }}</p>
                    <hr>


                    <div class="btn-group btn-group-toggle" model-toggle="buttons"></div>
                    <div class="bg-gray py-2 px-3 mt-4">
                     

                    </div>
                    <div class="mt-4">
                        <div class="btn btn-primary btn-lg btn-flat">
                            <i class="fas fa-cart-plus fa-lg mr-2 text-light"></i>
                            <a href="https://wa.me/5521{{ $model->phone ?? '' }}"> Ligar</a>

                        </div>

                    </div>

                </div>
            </div>

        </div>

 

     <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Lista de Espera</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Telefone</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                       
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.image-thumb').click(function() {
            $('.img-principal').attr('src', $(this).attr('src'));
        })


        $("img.card-img").on("error", function(){
        $(this).attr('src', '{{ asset("images/entregadoravatar.png") }}');
    });
    })
</script>
