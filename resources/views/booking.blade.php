<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="{{ asset('css/navbar.css')}}">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://js.stripe.com/v3/"></script>

  <title>Booking</title>
</head>

<header>
  @include('navbar')
</header>

<body class="bg-[#0b0b22] text-white font-sans">
  <form action=" {{ isset($movie) ? route('bookingmovies') : (isset($event) ? route('bookingevents') : route('bookingsports')) }}" method="POST" class="flex flex-col lg:flex-row gap-8 max-w-6xl mx-auto p-6">
    @csrf
    <div class="flex-1 space-y-8">
      <div class="bg-[#1b1b33] p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold">Share Your Contact Details</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 bg-[#1a1a33] p-6 rounded-md shadow-md max-w-md mx-auto">
          <label class="block text-gray-400 text-sm">
            Full Name
            <input type="text" name="full_name" placeholder="Full Name"
              class="bg-[#2a2a45] text-gray-300 p-3 w-full rounded-md shadow-sm border border-[#383867] focus:outline-none focus:ring-2 focus:ring-[#6b6bcc]" />
          </label>

          <label class="block text-gray-400 text-sm">
            Enter Your Email
            <input type="email" name="email"
              value="{{ auth()->user()->email }}"
              readonly
              class="bg-[#2a2a45] text-gray-300 p-3 w-full rounded-md shadow-sm border border-[#383867] focus:outline-none focus:ring-2 focus:ring-[#6b6bcc]" />
          </label>


          <label class="block text-gray-400 text-sm md:col-span-2">
            Enter Your Phone Number
            <input type="text" name="phone_number" placeholder="Enter Your Phone Number"
              class="bg-[#2a2a45] text-gray-300 p-3 w-full rounded-md shadow-sm border border-[#383867] focus:outline-none focus:ring-2 focus:ring-[#6b6bcc]" />
          </label>
        </div>
      </div>

      <div class="bg-[#1b1b33] p-6 rounded-lg shadow-lg">
        <h2 class="text-xl font-bold">Number of Tickets</h2>
        <div class="mt-4 bg-[#1a1a33] p-6 rounded-md shadow-md max-w-md mx-auto">
          <label for="ticketCount" class="block text-gray-400 text-sm font-medium">
            Select the number of tickets you wish to book:
          </label>
          <input type="number" id="ticketCount" name="ticket_count" placeholder="Enter number of tickets"
            class="bg-[#2a2a45] text-gray-300 p-3 mt-2 rounded-md w-full shadow-sm border border-[#383867] focus:outline-none focus:ring-2 focus:ring-[#6b6bcc]"
            min="1" max="10" value="1" />
        </div>
      </div>
      <div class="bg-[#1b1b33] p-6 rounded-lg shadow-lg">
            <h2 class="text-xl font-bold">Payment Option</h2>
            <div class="mt-6 space-y-4">
                <div class="space-y-4 bg-[#1a1a33] p-6 rounded-md shadow-md max-w-md mx-auto">
                    <label class="block text-gray-400 text-sm">
                        Card Details
                        <div id="card-element" class="bg-[#2a2a45] p-3 w-full rounded-md shadow-sm border border-[#383867] focus:outline-none focus:ring-2 focus:ring-[#6b6bcc]"></div>
                    </label>
                </div>
                <button class="bg-gradient-to-r from-pink-500 to-purple-500 px-6 py-2 rounded-lg" id="payment-button">
                    Make Payment
                </button>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div class="w-full lg:w-1/3 bg-[#1b1b33] p-6 rounded-lg shadow-md text-white">
      <h2 class="text-xl font-semibold border-b border-gray-700 pb-2">Booking Summary</h2>
      <div class="space-y-3 mt-4 text-sm">
        <p class="flex justify-between">
          <span class="font-medium">Number of tickets:</span>
          <span id="ticketCountDisplay">1</span>
        </p>
        <p class="flex justify-between">
          <span class="font-medium">Ticket Price:</span>
          <span id="ticketPriceDisplay">
            @if(isset($movie)) {{$movie->ticket_price}}
            @elseif(isset($event)) {{$event->ticket_price}}
            @elseif(isset($sport)) {{$sport->ticket_price}}
            @else Not available @endif</span>
          <input type="hidden" name="ticket_price" id="ticketpriceinput">
        </p>
        <p class="flex justify-between">
          <span class="font-medium">Total Price:</span>
          <span id="totalPriceDisplay">
            @if(isset($movie)) {{$movie->ticket_price}}
            @elseif(isset($event)) {{$event->ticket_price}}
            @elseif(isset($sport)) {{$sport->ticket_price}}
            @else Not available @endif
          </span>
          <input type="hidden" name="total_price" id="totalpriceinput">
        </p>
        <p class="flex justify-between border-t border-gray-700 pt-2">
          <span class="font-medium">VAT:</span>
          <span id="vatDisplay">$15</span>
          <input type="hidden" name="vat" id="vatInput" />
        </p>
        <h3 class="flex justify-between font-semibold text-lg border-t border-gray-700 pt-3">
          <span>Amount Payable:</span>
          <span id="amountPayable"></span>
          <input type="hidden" name="amount_payable" id="totalamount">
        </h3>
      </div>
    </div>
    <span id="type" class="hidden">
      @if(isset($movie)) movie
      @elseif(isset($event)) event
      @elseif(isset($sport)) sport
      @else Not available @endif</span>
    <input type="hidden" name="type" id="typeinput">
    <span id="typeid" class="hidden">
      @if(isset($movie)) {{$movie->id}}
      @elseif(isset($event)) {{$event->id}}
      @elseif(isset($sport)) {{$sport->id}}
      @else Not available @endif
    </span>
    <input type="hidden" name="type_id" id="typeidinput">
  </form>
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <script src="{{asset('js/booking.js')}}"></script>
  <script src="{{asset('js/stripe.js')}}"></script>
</body>

</html>