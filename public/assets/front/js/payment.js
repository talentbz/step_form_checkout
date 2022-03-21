$(document).ready(function () {
    $('#payment-form').hide();
    $('#d_stripe').on('change', function(){
        if ($(this).is(':checked')) {
            $('#payment-form').show();
            $('#order-confirm').hide();
            // var iframeBody = $($('iframe')[1]).contents();
            // console.log(iframeBody);
            // console.log(iframeBody.find('.p-PaymentDetails'));
        }
    });
    $('#credit').on('change', function(){
        $('#payment-form').hide();
        $('#order-confirm').show()
    })
    
    
})
// $('#submit').on('click', function(e){
//     e.preventDefault();
//     e.stopPropagation();
//     var order_id = $("input[name=order_id]").val(),
//         company = $("input[name=company]").val(),
//         email = $("input[name=email]").val(),
//         first_name = $("input[name=first_name]").val(),
//         last_name = $("input[name=last_name]").val(),
//         phone = $("input[name=phone]").val();
//     if(!company || !email || !first_name || !last_name){
//         validate();
//     } else {
//         $.ajaxSetup({
//             headers: {
//             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//             }
//         });
        
//         $.ajax({
//             url: checkout_post,
//             method: 'POST',
//             dataType: 'json',
//             data: {
//                 order_id: order_id,
//                 company: company,
//                 email: email,
//                 first_name: first_name,
//                 last_name: last_name,
//                 phone: phone,
//                 payment: 'Stripe',
//             },
//             success: function (res) {
//                 console.log(res);
//             },
//             error: function (res){
//                 console.log(res)
//             },
//         })
//     }
// })
// function validate() {
//     var forms = document.querySelectorAll('.needs-validation')
//     // Loop over them and prevent submission
//     Array.prototype.slice.call(forms)
//         .forEach(function (form) {
//             form.classList.add('was-validated')
//     })
// }
