$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$(document).on("click", "#obtenerRegistros", () => {
    var table;
    var url = window.location + "";
    var separador = url.split("/");
    var terminal = $("#inputTerminal").val();
    //var PIP = $("#inputPIP").val();

    const tableStatus = () => {
        $.get({
            url: `/admin/showAutorizacion?terminal=${terminal}`,
            success: function (response) {
                $("#contTablaAut").empty();
                $("#contTablaAut").html(response);

                table = $("#autorizacion").DataTable({
                    language: {
                        processing: "Procesando...",
                        lengthMenu: "Mostrar _MENU_ pagos",
                        zeroRecords: "No se encontraron resultados",
                        emptyTable: "No se ha registrado ningún pago",
                        infoEmpty:
                            "Mostrando pagos del 0 al 0 de un total de 0 pagos",
                        infoFiltered: "(filtrado de un total de _MAX_ pagos)",
                        search: "Buscar:",
                        infoThousands: ",",
                        loadingRecords: "Cargando...",
                        paginate: {
                            first: "Primero",
                            last: "Último",
                            next: ">",
                            previous: "<",
                        },
                        aria: {
                            sortAscending:
                                ": Activar para ordenar la columna de manera ascendente",
                            sortDescending:
                                ": Activar para ordenar la columna de manera descendente",
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Visibilidad",
                            collection: "Colección",
                            colvisRestore: "Restaurar visibilidad",
                            copyKeys:
                                "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br /> <br /> Para cancelar, haga clic en este mensaje o presione escape.",
                            copySuccess: {
                                1: "Copiada 1 fila al portapapeles",
                                _: "Copiadas %d fila al portapapeles",
                            },
                            copyTitle: "Copiar al portapapeles",
                            csv: "CSV",
                            excel: "Excel",
                            pageLength: {
                                "-1": "Mostrar todas las filas",
                                1: "Mostrar 1 fila",
                                _: "Mostrar %d filas",
                            },
                            pdf: "PDF",
                            print: "Imprimir",
                        },
                        autoFill: {
                            cancel: "Cancelar",
                            fill: "Rellene todas las celdas con <i>%d</i>",
                            fillHorizontal: "Rellenar celdas horizontalmente",
                            fillVertical: "Rellenar celdas verticalmentemente",
                        },
                        decimal: ",",
                        searchBuilder: {
                            add: "Añadir condición",
                            button: {
                                0: "Constructor de búsqueda",
                                _: "Constructor de búsqueda (%d)",
                            },
                            clearAll: "Borrar todo",
                            condition: "Condición",
                            conditions: {
                                date: {
                                    after: "Despues",
                                    before: "Antes",
                                    between: "Entre",
                                    empty: "Vacío",
                                    equals: "Igual a",
                                    notBetween: "No entre",
                                    notEmpty: "No Vacio",
                                    not: "Diferente de",
                                },
                                number: {
                                    between: "Entre",
                                    empty: "Vacio",
                                    equals: "Igual a",
                                    gt: "Mayor a",
                                    gte: "Mayor o igual a",
                                    lt: "Menor que",
                                    lte: "Menor o igual que",
                                    notBetween: "No entre",
                                    notEmpty: "No vacío",
                                    not: "Diferente de",
                                },
                                string: {
                                    contains: "Contiene",
                                    empty: "Vacío",
                                    endsWith: "Termina en",
                                    equals: "Igual a",
                                    notEmpty: "No Vacio",
                                    startsWith: "Empieza con",
                                    not: "Diferente de",
                                },
                                array: {
                                    not: "Diferente de",
                                    equals: "Igual",
                                    empty: "Vacío",
                                    contains: "Contiene",
                                    notEmpty: "No Vacío",
                                    without: "Sin",
                                },
                            },
                            data: "Data",
                            deleteTitle: "Eliminar regla de filtrado",
                            leftTitle: "Criterios anulados",
                            logicAnd: "Y",
                            logicOr: "O",
                            rightTitle: "Criterios de sangría",
                            title: {
                                0: "Constructor de búsqueda",
                                _: "Constructor de búsqueda (%d)",
                            },
                            value: "Valor",
                        },
                        searchPanes: {
                            clearMessage: "Borrar todo",
                            collapse: {
                                0: "Paneles de búsqueda",
                                _: "Paneles de búsqueda (%d)",
                            },
                            count: "{total}",
                            countFiltered: "{shown} ({total})",
                            emptyPanes: "Sin paneles de búsqueda",
                            loadMessage: "Cargando paneles de búsqueda",
                            title: "Filtros Activos - %d",
                        },
                        select: {
                            1: "%d fila seleccionada",
                            _: "%d filas seleccionadas",
                            cells: {
                                1: "1 celda seleccionada",
                                _: "$d celdas seleccionadas",
                            },
                            columns: {
                                1: "1 columna seleccionada",
                                _: "%d columnas seleccionadas",
                            },
                        },
                        thousands: ".",
                        datetime: {
                            previous: "Anterior",
                            next: "Proximo",
                            hours: "Horas",
                            minutes: "Minutos",
                            seconds: "Segundos",
                            unknown: "-",
                            amPm: ["am", "pm"],
                        },
                        editor: {
                            close: "Cerrar",
                            create: {
                                button: "Nuevo",
                                title: "Crear Nuevo Registro",
                                submit: "Crear",
                            },
                            edit: {
                                button: "Editar",
                                title: "Editar Registro",
                                submit: "Actualizar",
                            },
                            remove: {
                                button: "Eliminar",
                                title: "Eliminar Registro",
                                submit: "Eliminar",
                                confirm: {
                                    _: "¿Está seguro que desea eliminar %d filas?",
                                    1: "¿Está seguro que desea eliminar 1 fila?",
                                },
                            },
                            error: {
                                system: 'Ha ocurrido un error en el sistema (<a target="\\" rel="\\ nofollow" href="\\">Más información&lt;\\/a&gt;).</a>',
                            },
                            multi: {
                                title: "Múltiples Valores",
                                info: "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                                restore: "Deshacer Cambios",
                                noMulti:
                                    "Este registro puede ser editado individualmente, pero no como parte de un grupo.",
                            },
                        },
                        info: "Mostrando de _START_ a _END_ de _TOTAL_ pagos",
                    },
                    lengthMenu: [
                        [50, 100, 150, -1],
                        [50, 100, 150, "Todo"],
                    ],
                    pageLength: 50,
                    aaSorting: [],
                });
            },
            error: function (error) {
                console.log(error);
            },
        });
    };

    tableStatus();
   
    
    
});

let statusBTN = $(".statusOp").val();
console.log(statusBTN);

if (statusBTN == "activado") {
    $(document).on("click", ".nothing", function (e) {
        e.preventDefault();

        var id = $(this).data("id");

        Swal.fire({
            title: "Actualizar acción",
            text: "¿Estás seguro que quieres cambiar la acción a NADA?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Aceptar",
            // confirmButtonColor: "#01bbcc",
            cancelButtonText: "Cancelar",
            cancelButtonColor: "#dc3545",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "/admin/actionAuth",
                    data: {
                        id: id,
                        valor: 0,
                    },
                    cache: false,
                    success: function () {
                        Swal.fire({
                            icon: "success",
                            title: "Acción actualizada",
                            text: "La acción se ha actualizado correctamente",
                            confirmButtonText:
                                '<a style="font-family: Poppins">Aceptar</a>',
                            confirmButtonColor: "#01bbcc",
                        });
                        $( "#obtenerRegistros" ).trigger( "click" );
                    },
                });
            }
        });
    });

    $(document).on("click", ".buy", function (e) {
        e.preventDefault();

        var id = $(this).data("id");

        Swal.fire({
            title: "Actualizar acción",
            text: "¿Estás seguro que quieres cambiar la acción a SOLO COMPRA?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Aceptar",
            // confirmButtonColor: "#01bbcc",
            cancelButtonText: "Cancelar",
            cancelButtonColor: "#dc3545",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "/admin/actionAuth",
                    data: {
                        id: id,
                        valor: 1,
                    },
                    cache: false,
                    success: function () {
                        Swal.fire({
                            icon: "success",
                            title: "Acción actualizada",
                            text: "La acción se ha actualizado correctamente",
                            confirmButtonText:
                                '<a style="font-family: Poppins">Aceptar</a>',
                            confirmButtonColor: "#01bbcc",
                        });
                        $( "#obtenerRegistros" ).trigger( "click" );
                    },
                });
            }
        });
    });

    $(document).on("click", ".sell", function (e) {
        e.preventDefault();

        var id = $(this).data("id");

        Swal.fire({
            title: "Actualizar acción",
            text: "¿Estás seguro que quieres cambiar la acción a SOLO VENTA?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Aceptar",
            // confirmButtonColor: "#01bbcc",
            cancelButtonText: "Cancelar",
            cancelButtonColor: "#dc3545",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "/admin/actionAuth",
                    data: {
                        id: id,
                        valor: 2,
                    },
                    cache: false,
                    success: function () {
                        Swal.fire({
                            icon: "success",
                            title: "Acción actualizada",
                            text: "La acción se ha actualizado correctamente",
                            confirmButtonText:
                                '<a style="font-family: Poppins">Aceptar</a>',
                            confirmButtonColor: "#01bbcc",
                        });
                        $( "#obtenerRegistros" ).trigger( "click" );
                    },
                });
            }
        });
    });

    $(document).on("click", ".buy_sell", function (e) {
        e.preventDefault();

        var id = $(this).data("id");

        Swal.fire({
            title: "Actualizar acción",
            text: "¿Estás seguro que quieres cambiar la acción a COMPRA Y VENTA?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Aceptar",
            // confirmButtonColor: "#01bbcc",
            cancelButtonText: "Cancelar",
            cancelButtonColor: "#dc3545",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "/admin/actionAuth",
                    data: {
                        id: id,
                        valor: 3,
                    },
                    cache: false,
                    success: function () {
                        Swal.fire({
                            icon: "success",
                            title: "Acción actualizada",
                            text: "La acción se ha actualizado correctamente",
                            confirmButtonText:
                                '<a style="font-family: Poppins">Aceptar</a>',
                            confirmButtonColor: "#01bbcc",
                        });
                        $( "#obtenerRegistros" ).trigger( "click" );                  
                    },
                });
            }
        });
    });
}
if (statusBTN == "desactivado") {
    $(document).on("click", ".nothing", function (e) {
        e.preventDefault();
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'error',
            title: 'No tiene permitido realizar esta acción'
          })
       
    });

    $(document).on("click", ".buy", function (e) {
        e.preventDefault();
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'error',
            title: 'No tiene permitido realizar esta acción'
          })
       
    });

    $(document).on("click", ".sell", function (e) {
        e.preventDefault();
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'error',
            title: 'No tiene permitido realizar esta acción'
          })
       
    });

    $(document).on("click", ".buy_sell", function (e) {
        e.preventDefault();
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.addEventListener('mouseenter', Swal.stopTimer)
              toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
          })
          
          Toast.fire({
            icon: 'error',
            title: 'No tiene permitido realizar esta acción'
          })
       
    });
}



function estatusClaveIncorrecta(input) {
    let estatus = $(input).data("statusOp");
    if (estatus == "activado") {
        $(input).val("activado");
    } else {
        $(input).val("desactivado");
    }
}

$(document).on("click", ".statusOp", function (e) {
    e.preventDefault();

    let input = this;
    let id = $(this).data("id");
    let status = $(this).data("status");


    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });
    Swal.fire({
        title: '<h1 style="font-family: Poppins; font-weight: 700;">Editar estatus</h1>',
        html: '<p style="font-family: Poppins">Necesitas una clave para editar el estatus</p>',
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: '<a style="font-family: Poppins">Cancelar</a>',
        cancelButtonColor: "#01bbcc",
        confirmButtonText: '<a style="font-family: Poppins">Editar</a>',
        confirmButtonColor: "#198754",
        input: "password",
        showLoaderOnConfirm: true,
        preConfirm: (clave) => {
            $.ajax({
                type: "GET",
                url: "/admin/showClaveOp",
                data: {
                    clave: clave,
                    status: status,
                    campo: "status",
                   
                  
                },
                success: function (result) {
                    if (result == "success") {
                        $.get(
                            "/admin/botonStatus",
                            {
                               status: status,
                               campo: "status",
                            },
                            function (response) {
                                Toast.fire({
                                    icon: "success",
                                    title: "Estatus actualizado",
                                });

                               
                                    if ($(".statusOp").hasClass("btn-success")) {
                                        $(".statusOp").removeClass(
                                            "btn-success"
                                        );
                                        $(".statusOp").addClass("btn-danger");
                                        $(".statusOp").text("Desactivado");
                                      
                                      
                                    } else {
                                        $(".statusOp").removeClass("btn-danger");
                                        $(".statusOp").addClass("btn-success");
                                        $(".statusOp").text("Activado");
                                    }

                                    window.location.href = window.location.href;

                            }
                        );
                    } else {
                        estatusClaveIncorrecta(input);
                        Toast.fire({
                            icon: "error",
                            title: "Clave incorrecta",
                        });
                    }
                },
                error: function () {
                    estatusClaveIncorrecta(input);
                    Toast.fire({
                        icon: "error",
                        title: "Clave incorrecta",
                    });
                },
            });
        },
        allowOutsideClick: () => !Swal.isLoading(),
    }).then((result) => {
        if (!result.isConfirmed) {
            estatusClaveIncorrecta();
            Swal.fire({
                icon: "error",
                title: '<h1 style="font-family: Poppins; font-weight: 700;">Cancelado</h1>',
                html: '<p style="font-family: Poppins">El estatus no se ha actualizado</p>',
                confirmButtonText:
                    '<a style="font-family: Poppins">Aceptar</a>',
                confirmButtonColor: "#01bbcc",
            });
        }
    });
  
});

