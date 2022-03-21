const stripe = Stripe("pk_test_51Kd24KI1ALVfJU3ioVluIxaZ3K0c3Y9OUaFFTO9yV6D3949AEDWmBHRUEEDVxds8XNPWpw4H7V6z8L5uylvVHdlF00LkI82GPW");
  // The items the customer wants to buy
  const items = [{ id: "xl-tshirt" }];

  let elements;

initialize();
checkStatus();
document
  .querySelector("#payment-form")
  .addEventListener("submit", handleSubmit)
// Fetches a payment intent and captures the client secret
async function initialize() {
  const { clientSecret } = await fetch(stripe_url, {
    method: "POST",
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        "Content-Type": "application/json"
      },
    body: JSON.stringify({}),
  }).then((r) => r.json());
  console.log(clientSecret);
  elements = stripe.elements({ clientSecret });

  const paymentElement = elements.create("payment");
  paymentElement.mount("#payment-element");
}

async function handleSubmit(e) {
  e.preventDefault();
  dataStore(e);
  setLoading(true);
  const { error } = await stripe.confirmPayment({
    elements,
    confirmParams: {
      // Make sure to change this to your payment completion page
      return_url: complete_url,
    },
  });

  // This point will only be reached if there is an immediate error when
  // confirming the payment. Otherwise, your customer will be redirected to
  // your `return_url`. For some payment methods like iDEAL, your customer will
  // be redirected to an intermediate site first to authorize the payment, then
  // redirected to the `return_url`.
  if (error.type === "card_error" || error.type === "validation_error") {
    showMessage(error.message);
  } else {
    showMessage("An unexpected error occured.");
  }

  setLoading(false);
}

// Fetches the payment intent status after payment submission
async function checkStatus() {
  const clientSecret = new URLSearchParams(window.location.search).get(
    "payment_intent_client_secret"
  );

  if (!clientSecret) {
    return;
  }

  const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);

  switch (paymentIntent.status) {
    case "succeeded":
      showMessage("Payment succeeded!");
      break;
    case "processing":
      showMessage("Your payment is processing.");
      break;
    case "requires_payment_method":
      showMessage("Your payment was not successful, please try again.");
      break;
    default:
      showMessage("Something went wrong.");
      break;
  }
}

// ------- UI helpers -------

function showMessage(messageText) {
  const messageContainer = document.querySelector("#payment-message");

  messageContainer.classList.remove("hidden");
  messageContainer.textContent = messageText;

  setTimeout(function () {
    messageContainer.classList.add("hidden");
    messageText.textContent = "";
  }, 4000);
}

// Show a spinner on payment submission
function setLoading(isLoading) {
  if (isLoading) {
    // Disable the button and show a spinner
    document.querySelector("#submit").disabled = true;
    document.querySelector("#spinner").classList.remove("hidden");
    document.querySelector("#button-text").classList.add("hidden");
  } else {
    document.querySelector("#submit").disabled = false;
    document.querySelector("#spinner").classList.add("hidden");
    document.querySelector("#button-text").classList.remove("hidden");
  }
}   

function dataStore(e){
  validate();
    var order_id = $("input[name=order_id]").val(),
        company = $("input[name=company]").val(),
        email = $("input[name=email]").val(),
        first_name = $("input[name=first_name]").val(),
        last_name = $("input[name=last_name]").val(),
        phone = $("input[name=phone]").val();
        console.log(checkout_post, {
                order_id: order_id,
                company: company,
                email: email,
                first_name: first_name,
                last_name: last_name,
                phone: phone,
                payment: 'Stripe',
            })
    if(!company || !email || !first_name || !last_name){
        validate();
    } else {
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $.ajax({
            url: checkout_post,
            method: 'POST',
            dataType: 'json',
            data: {
                order_id: order_id,
                company: company,
                email: email,
                first_name: first_name,
                last_name: last_name,
                phone: phone,
                payment: 'Stripe',
            },
            success: function (res) {
                console.log(res);
            },
            error: function (res){
                console.log(res)
            },
        })
    }
}

function validate(event) {
    var forms = document.querySelectorAll('.needs-validation')
    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }
            form.classList.add('was-validated')
          }, false)
}
