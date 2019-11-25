$(document).ready(function () {
    var base_url = $("#base_url").val();

    if ($('.has-datetimepicker').length) {
        $('.has-datetimepicker').datetimepicker({
            format: "YYYY-MM-DD HH:mm:ss",
            locale: 'es'
        });
    }

    if ($('.has-datepicker').length) {
        $('.has-datepicker').datetimepicker({
            format: 'DD/MM/YYYY',
            locale: 'es'
        });
    }

    var d = new Date();
    var mes = d.getMonth() + 1; //obteniendo mes
    var dia = d.getDate(); //obteniendo dia
    var ano = d.getFullYear(); //obteniendo año
    var hor = d.getHours(); //obteniendo la hora
    var min = d.getMinutes(); //obteniendo los minutos
    var sec = d.getSeconds(); //obteniendo los segundos
    // $("#horariolocal").text( dia + "-" + mes + "-" + ano + " " + hor + ":" + min + ":" + sec );

    var timer, count = 1;
    function transition() {
        clearTimeout(timer);
        // console.log(count);
        listaDeSesionesTimer(count);
        count++;

        // timer = setTimeout(transition, 1000);
        timer = setTimeout(transition, 3600000);
    }
    transition();

    function calcularDiasAusencia(fechaIni, fechaFin) {
        var diaEnMils = 1000 * 60 * 60 * 24,
            desde = new Date(fechaIni.substr(0, 10)),
            hasta = new Date(fechaFin.substr(0, 10)),
            diff = hasta.getTime() - desde.getTime() + diaEnMils; // +1 incluir el dia de ini
        return diff / diaEnMils;
    }

    function sendmails(datos) {
        $.ajax({
            url: base_url + "email/send",
            type: "post",
            data: datos,
            dataType: "json",
            success: function (e) {
                console.log(e);
            }
        });
        //console.log(datos);

    }

    //lista de sesionestimer
    function listaDeSesionesTimer() {

        $.ajax({
            url: base_url + "sesione/get_sesiones_all",
            type: "post",
            dataType: "json",
            success: function (dataTimer) {
                $.each(dataTimer, function (i, item) {
                    // console.log(item.fecha_sesion);
                    let fecha = new Date(); //Fecha actual
                    let mes = fecha.getMonth() + 1; //obteniendo mes
                    let dia = fecha.getDate(); //obteniendo dia
                    let ano = fecha.getFullYear(); //obteniendo año
                    let hor = fecha.getHours(); //obteniendo la hora
                    let min = fecha.getMinutes(); //obteniendo los minutos
                    let sec = fecha.getSeconds(); //obteniendo los segundos
                    if (dia < 10)
                        dia = '0' + dia; //agrega cero si el menor de 10
                    if (mes < 10)
                        mes = '0' + mes //agrega cero si el menor de 10

                    let fa = ano + "-" + mes + "-" + dia + " " + hor + ":" + min + ":" + sec;

                    if (calcularDiasAusencia(item.fecha_sesion, fa) == 5
                        &&
                        item.rec_1 != 1

                    ) {
                        //console.log(item.fecha_sesion + " se le enviará recordatorio 1 ");
                        d = {
                            idsesiones: item.idsesiones,
                            id_comite: item.id_comite,
                            nombre_sesion: item.nombre_sesion,
                            fecha_ingreso: item.fecha_ingreso,
                            fecha_sesion: item.fecha_sesion,
                            proxima_sesion: item.proxima_sesion,
                            rec_1: item.rec_1,
                            rec_2: item.rec_2,
                            rec_3: item.rec_3,
                            tipo_aviso: 1
                        }
                        sendmails(d);
                    }
                    else if (
                        calcularDiasAusencia(item.fecha_sesion, fa) == 3
                        &&
                        item.rec_2 != 1
                    ) {
                        // console.log(item.fecha_sesion + "  se le enviará recordatorio 2");
                        d = {
                            idsesiones: item.idsesiones,
                            id_comite: item.id_comite,
                            nombre_sesion: item.nombre_sesion,
                            fecha_ingreso: item.fecha_ingreso,
                            fecha_sesion: item.fecha_sesion,
                            proxima_sesion: item.proxima_sesion,
                            rec_1: item.rec_1,
                            rec_2: item.rec_2,
                            rec_3: item.rec_3,
                            tipo_aviso: 2
                        }
                        sendmails(d);
                    }
                    else if (
                        calcularDiasAusencia(item.fecha_sesion, fa) == 1
                        &&
                        item.rec_3 != 1
                    ) {
                        // console.log(item.idsesiones + "  se le enviará recordatorio 3");
                        d = {
                            idsesiones: item.idsesiones,
                            id_comite: item.id_comite,
                            nombre_sesion: item.nombre_sesion,
                            fecha_ingreso: item.fecha_ingreso,
                            fecha_sesion: item.fecha_sesion,
                            proxima_sesion: item.proxima_sesion,
                            rec_1: item.rec_1,
                            rec_2: item.rec_2,
                            rec_3: item.rec_3,
                            tipo_aviso: 3
                        }
                        sendmails(d);
                    }

                    //llena el número de sesiones de cada comite



                });
                var counts = {};

                for (var i = 0; i < dataTimer.length; i++) {
                    var key = dataTimer[i];
                    let item = dataTimer[i].id_comite;
                    counts[item] = (counts[item]) ? counts[item] + 1 : 1;
                    // console.log(dataTimer.id_comite);

                    (counts[item] >= 1) ? $("#num_sesiones_" + item).text(counts[item]) : $("#num_sesiones_" + item).text('');

                }

            }
        });
    }


    $('#tbl_Productos').DataTable({
        "pageLength": 2,
        "lengthMenu": [2, 5, 10, 20],
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });
    $('#tbl_comites').DataTable({
        "pageLength": 5,
        "lengthMenu": [5, 10, 20],
        "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });

    //DatePicker

    

    
    

    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
});

