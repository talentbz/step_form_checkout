$(document).ready(function () {
    var total_value = parseFloat($('.total-value').val())
    $('#duration, #length').on("change", function (e) { 
        aaa = total_value + parseFloat($(this).val());
        console.log(aaa);
    })
})