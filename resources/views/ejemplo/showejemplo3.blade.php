@extends('index')

@section('css')

@endsection

@section('title', "Ejemplo 3")

@section('content')
    <div class="pagetitle">
        <h1>Ejemplo</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/admin/dashboard') }}">Panel de control</a></li>
                <li class="breadcrumb-item active">Ejemplo</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body mt-3">
                        <div class="row align-items-center">
                            <div class="col-md-3 col-12 text-center">
                                <button class="btn btn-warning" id="modificarButton">
                                    Modificar <i class="bi bi-lock-fill"></i>
                                </button>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-floating">
                                    <input type="text" class="form-control" placeholder="Ingresa el text" id="textInput" name="texto" readonly>
                                    <label for="textInput">Texto</label>
                                </div>
                            </div>
                            <div class="col-md-3 col-12">
                                <button class="btn btn-primary" id="enviarButton" disabled>Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('preloader')
    <div id="loader" class="loader">
        <h1></h1>
        <span></span>
        <span></span>
        <span></span>
    </div>
@endsection

@section('footer')
    <footer id="footer" class="footer">
        <div class="copyright" id="copyright">
        </div>
        <div class="credits">
            Todos los derechos reservados
        </div>
    </footer>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        let bloquado = true;
        $(document).on("click", "#modificarButton", function(){
            if(bloquado){
                $("#textInput").prop("readonly", false);
                $("#modificarButton").html("Modificar <i class='bi bi-unlock-fill'></i>");
                $("#modificarButton").removeClass("btn-warning");
                $("#modificarButton").addClass("btn-outline-warning");
                $("#enviarButton").prop("disabled", false);

                bloquado = false;
            }else{
                $("#textInput").prop("readonly", true);
                $("#modificarButton").html("Modificar <i class='bi bi-lock-fill'></i>");
                $("#modificarButton").removeClass("btn-outline-warning");
                $("#modificarButton").addClass("btn-warning");
                $("#enviarButton").prop("disabled", true);

                bloquado = true;
            }
        });

        $(document).on("click", "#enviarButton", function(){
            let texto = $("#textInput").val();

            $.get({
            url: "/admin/getEditEjemplo3",
            data: {
                id: 143,
                comentario: texto,
            },
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: '<h1 style="font-family: Poppins; font-weight: 700;">Registro actualizado</h1>',
                    html: '<p style="font-family: Poppins">El registro ha sido actualizado correctamente</p>',
                    confirmButtonText:
                        '<a style="font-family: Poppins">Aceptar</a>',
                    confirmButtonColor: "#01bbcc",
                });
            },
            error: function (error) {
                console.log(error);
            },
        });
        });
    </script>
@endsection