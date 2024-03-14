@extends('layout.app')
@section('content')
 <div class="mt-2 mx-4" style="border-bottom: 1px solid #ccc">
    <div style="display: flex">
        <h2 class="me-2" >Dr.{{$doctor->name}}</h2> from
        <h3 class="ms-2">{{$doctor->deparment->title}} </h3>department
    </div>
    <p >Expricence: {{$doctor->experience}}</p>
    <p>Email: {{$doctor->email}}</p>
 </div>
 <div style="margin: 3% 20%">
    @foreach ($bookings as $booking)
        <div style="border-bottom: 1px solid #ccc;position: relative;margin-top: 20px" >
            <div style="display: flex;align-items: center;justify-content: space-between">
            <h2>{{$booking->title}}</h2>
            <h3>{{$booking->started_time}}</h3>
        </div>
        <p>{{$booking->description}}</p>
        <a href="{{ route('patient.book', $booking->id) }}" class="py-1 px-3 text-white"
            style="background: black;text-decoration: none;position: absolute;right: 0;bottom: 0">book_</a>
        </div>
    @endforeach
 </div>
@endsection
