const stripe =  Stripe("{{ env('STRIPE_PUBLIC_KEY') }}");
const elements = stripe.elements();

const card = elements.create('card', {
    style: {
        base: {
            color: "#ffffff",
            fontSize: "16px",
            lineHeight: "24px",
            fontFamily: "Arial, sans-serif",
            fontSmoothing: "antialiased",
            padding: "10px",
            '::placeholder': {
                color: "#ccc",
            },
        },
    },
});

card.mount('#card-element');

const form = document.getElementById('payment-form');
form.addEventListener('submit', async (event) => {
    event.preventDefault();

    const clientSecret = document.getElementById('client-secret').value;

    const { error, paymentIntent } = await stripe.confirmCardPayment(clientSecret, {
        payment_method: {
            card: card,
            billing_details: {
                name: document.querySelector('[name="full_name"]').value,
                email: document.querySelector('[name="email"]').value,
                phone: document.querySelector('[name="phone_number"]').value,
            },
        },
    });

    if (error) {
        const errorElement = document.getElementById('card-errors');
        errorElement.textContent = error.message;
    } else if (paymentIntent.status === 'succeeded') {
        form.submit();
    }
});
