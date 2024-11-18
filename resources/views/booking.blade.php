<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
<div class="min-h-screen flex items-center justify-center bg-gray-100 p-6">
  <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
    <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Book Your Movie</h2>
    <form action="/book" method="POST" class="space-y-6">
      <div>
        <label for="movie" class="block text-sm font-medium text-gray-700">Select a Movie</label>
        <select
          id="movie"
          name="movie"
          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
          required
        >
          <option disabled selected>Select a movie</option>
          <option value="movie1">Movie 1</option>
          <option value="movie2">Movie 2</option>
          <option value="movie3">Movie 3</option>
        </select>
      </div>
    
      <div>
        <label for="date" class="block text-sm font-medium text-gray-700">Choose a Date</label>
        <input
          type="date"
          id="date"
          name="date"
          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
          required
        />
      </div>
      
      <div>
        <label for="time" class="block text-sm font-medium text-gray-700">Time Slot</label>
        <select
          id="time"
          name="time"
          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
          required
        >
          <option disabled selected>Select a time slot</option>
          <option value="10am">10:00 AM</option>
          <option value="1pm">01:00 PM</option>
          <option value="6pm">06:00 PM</option>
          <option value="9pm">09:00 PM</option>
        </select>
      </div>

      <div>
        <label for="tickets" class="block text-sm font-medium text-gray-700">Number of Tickets</label>
        <input
          type="number"
          id="tickets"
          name="tickets"
          min="1"
          max="10"
          class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
          placeholder="Enter number of tickets"
          required
        />
      </div>

      <button
        type="submit"
        class="w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:bg-blue-600 focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 focus:outline-none transition-all"
      >
        Confirm Booking
      </button>
    </form>
  </div>
</div>
</body>
</html>