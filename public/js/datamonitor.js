$(document).ready(function () {
    var tabla = $("#monitor").DataTable({
        ajax: "/admin/showDataMonitor",
        columns: [
            { data: "id" },
            { data: "moneda" },
            { data: "type" },
            { data: "valor" },
            { data: "sl" },
            { data: "tp" },
            { data: "profit" },
            { data: "risk" },
            { data: "ratio" },
            // { data: "color" },
            { data: "hora" },
        ],
        responsive: {
            breakpoints: [
                {
                    name: "desktop",
                    width: Infinity,
                },
                {
                    name: "tablet",
                    width: 1024,
                },
                {
                    name: "fablet",
                    width: 768,
                },
                {
                    name: "phone",
                    width: 480,
                },
            ],
        },
        language: {
            processing: "Procesando...",
            lengthMenu: "Mostrar _MENU_ monitores",
            zeroRecords: "No se encontraron resultados",
            emptyTable: "No se ha registrado ningún operación",
            infoEmpty:
                "Mostrando monitores del 0 al 0 de un total de 0 monitores",
            infoFiltered: "(filtrado de un total de _MAX_ monitores)",
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
                collaoperacione: {
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
            info: "Mostrando de _START_ a _END_ de _TOTAL_ monitores",
        },
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(document).on("click", ".apertura", function (e) {
        e.preventDefault();
        let moneda = $(this).data("moneda");
        let valor = $(this).data("valor");
        let type = $(this).data("type");
        let sl = $(this).data("sl");
        let tp = $(this).data("tp");
        let profit = $(this).data("profit");
        let risk = $(this).data("risk");

        Swal.fire({
            title: "Solicitar apertura",
            text: "¿Estás seguro que quieres solicitar una apertura? esta opción no se puede deshacer",
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
                    url: "/admin/solicitarApertura",
                    data: {
                        moneda: moneda,
                        valor: valor,
                        type: type,
                        sl: sl,
                        tp: tp,
                        profit: profit,
                        risk: risk,
                    },
                    cache: false,
                    success: function () {
                        tabla.ajax.reload(null, false);
                        Swal.fire({
                            icon: "success",
                            title: "Solicitud enviada",
                            text: "La solicitud se ha enviado correctamente",
                            confirmButtonText:
                                '<a style="font-family: Poppins">Aceptar</a>',
                            confirmButtonColor: "#01bbcc",
                        });
                    },
                });
            }
        });
    });

    // $(document).on("change", ".colorInput", function (e) {
    //     e.preventDefault();
    //     let id = $(this).data("id");
    //     let color = $(this).val();

    //     console.log(id);

    //     // $.ajax({
    //     //     type: "POST",
    //     //     url: "/admin/editarColor",
    //     //     data: { id: id, color: color },
    //     //     dataType: "json",
    //     //     contentType: false,
    //     //     cache: false,
    //     //     processData: false,
    //     //     success: function (result) {
    //     //         const Toast = Swal.mixin({
    //     //             toast: true,
    //     //             position: "top-end",
    //     //             showConfirmButton: false,
    //     //             timer: 2000,
    //     //             timerProgressBar: true,
    //     //             didOpen: (toast) => {
    //     //                 toast.addEventListener("mouseenter", Swal.stopTimer);
    //     //                 toast.addEventListener("mouseleave", Swal.resumeTimer);
    //     //             },
    //     //         });

    //     //         Toast.fire({
    //     //             icon: "success",
    //     //             title: "Color guardado",
    //     //         });
    //     //     },
    //     // });
    // });

    setInterval(function () {
        tabla.ajax.reload(null, false);
    }, 10000);
});
$(".table").addClass("compact nowrap w-100");
