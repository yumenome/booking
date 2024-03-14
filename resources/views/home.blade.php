@extends('layout.app')
@section('content')

        <style>
            .bookings {
                width: 50%;
                max-height: 500px;
                overflow-x: scroll;
            }::-webkit-scrollbar{
                width: 0;
            }
        </style>

    @if(auth()->user()->is_doctor)
            <h2 class=" mt-2">WELCOME TO {{auth()->user()->deparment->title}} DEPARTMENT</h2>
            @include('components.doctor.store_booking')
            @include('components.doctor.bookings')
            @if (count($finnished_record) > 0)
                @include('components.doctor.patient_records')
            @endif
    @else
        @if(count(auth()->user()->bookedBookings) > 0)
            @include('components.patient.booked_bookings')
        @endif
        @include('components.patient.department')
    @endif
@endsection
