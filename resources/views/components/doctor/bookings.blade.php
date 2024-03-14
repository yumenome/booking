<div style="width: 100%;display: flex;" class="mt-5">
    @if(count($booked_bookings) > 0)
    <div class="bookings">
        <h1 class="text-center">patient bookings</h1>
        @foreach ($booked_bookings as $booking)
        <div class="card p-3 mx-5 my-3">
            <h4> {{$booking->title}} </h4>
            <div class="card-body relative">
                <p>{{$booking->description}}</p>
                <p>{{$booking->started_time}}</p>
                <span class="bg-black p-2 text-white" style="position: absolute;right: 0;bottom: 0">booked by
                    {{$booking->patient->name}} </span>
                <a href="{{ route('bookings.finnish', $booking->id) }}" class="p-2 text-white"
                    style="background: brown;text-decoration: none;position: absolute;right: 0;top: 0">note record </a>
            </div>
        </div>
        @endforeach
    </div>
    @endif
    @if(count($active_bookings) > 0)
    <div class="bookings">
        <h1 class="text-center">new bookings</h1>
        @foreach ($active_bookings as $booking)
        <div class="card p-3 mx-5 my-3 relative" value={{$booking->id}}>
            <h4> {{$booking->title}} </h4>
            <div class="card-body">
                <p>{{$booking->description}}</p>
                <p>{{$booking->started_time}}</p>
            </div>
            <a href="{{ route('bookings.edit', $booking->id) }}" class=" p-2 text-white"
                style="background: brown;text-decoration: none;position: absolute;right: 0;top: 0">edit </a>
            <a href="{{ route('bookings.delete', $booking->id) }}" class="p-2 text-white"
                style="background: black;text-decoration: none;position: absolute;right: 0;bottom: 0">cancle </a>

        </div>
        @endforeach
    </div>
    @endif
</div>
