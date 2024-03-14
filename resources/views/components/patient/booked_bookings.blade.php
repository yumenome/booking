<h3 class="mt-3" style="margin-left: 10%">your bookings</h3>
<table class="table table-striped table-bordered shadow-lg p-3 mb-5 bg-white rounded" style="margin: 20px 10%;width: 80%">
    <thead>
      <tr>
        <th scope="col">DOCTOR</th>
        <th scope="col">TITLE</th>
        <th scope="col">ARRIVED AT</th>
        <th scope="col">WHAT IF?</th>
      </tr>
    </thead>
    <tbody>
        @foreach (auth()->user()->bookedBookings as $booking)
            <tr>
                <td><h6>DR.{{$booking->doctor->name}}</h6></td>
                <td> {{$booking->title}}</td>
                <td>{{$booking->started_time}}</td>
                <td>
                    <a href="{{ route('patient.cancle', $booking->id) }}" class="py-1 px-3 text-white"
                    style="background: black;text-decoration: none">cancle </a>
                    <span class="ms-2">before {{$booking->to_cancle}}</span>
                </td>
            </tr>
        @endforeach

    </tbody>
  </table>





{{-- patient_id --}}
