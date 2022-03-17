$(document).ready(function () {
    $('#d_stripe').on('change', function(){
        if ($(this).is(':checked')) {
            $("#tab-stripe").removeClass('d-none');
            $("#tab-stripe").addClass('d-block');
            $('#tab-stripe').find('input').prop('required',true);
        } else {
            $("#tab-stripe").removeClass('d-block');
            $("#tab-stripe").addClass('d-none');
            $('#tab-stripe').find('input').prop('required',false);
        }
    });
    $('#credit, #s_stripe').on('change', function(){
        $("#tab-stripe").removeClass('d-block');
        $("#tab-stripe").addClass('d-none');
        $('#tab-stripe').find('input').prop('required',false);
    })
})