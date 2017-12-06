</main>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.1/sweetalert2.all.min.js"></script>

<script>
    $(".button-collapse").sideNav();
    $('select').material_select();
    $('.parallax').parallax();

    $(document).ready(function(){
        $('#parallax').parallax();
        $(".button-collapse").sideNav();
    });


    //DOCUMENTACION PARA CONFIGURAR EL DATE PICKER: http://amsul.ca/pickadate.js/date/
    $('.datepicker').pickadate({
    monthsFull: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    weekdaysFull: ['Domigo', 'Lunes', 'Marte', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
    weekdaysShort: ['Dom', 'Lun', 'Mar', 'Mier', 'Jue', 'Vie', 'Sab'],
    labelMonthNext: 'Siguiente Mes',
    labelMonthPrev: 'Mes Previo',
    labelMonthSelect: 'Selecciona un mes',
    labelYearSelect: 'Selecciona un año',
    format: 'yyyy-mm-dd',
    firstDay: true, // Set Lunes como primer dia de la semana
    formatSubmit: 'yyyy-mm-dd', //formato para MYSQL
    min: new Date(2017,6,1),
    max: true, // TRUE = dia maximo hoy.
    selectMonths: true, // Dropdown para el MES
    selectYears: 1, // Anios
    disable: [7], //Deshabilita el día domingo
    today: 'Hoy',
    clear: 'Reestablecer',
    close: 'Ok',
    closeOnSelect: true // cerrar al seleccionar
    });


</script>
