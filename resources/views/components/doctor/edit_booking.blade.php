@extends('layout.app')
@section('content')
    @if($booking->is_finnish)
        <div style="display: flex;flex-direction: column;align-items: center; justify-content: center">
            <form action="{{ route('bookings.update', $booking->id)}}" method="post" style="width: 50%">
                @csrf
                <h3 class="mt-4">patient name: {{$booking->patient->name}}</h3>
                <div class="form-group mt-3">
                    <label for="progress" class="text-dark">PROGRESS RECORD:</label><br>
                    <textarea type="text" name="progress" class="form-control" cols="30" rows="10"> </textarea>
                    @error('progress')<span class="fs-6 mt-2 text-danger">{{ $message }}</span>@enderror
                    <button class="btn btn-primary btn-sm mt-3" style="width: 100%" type="submit"> save</button>
                </div>
            </form>
        </div>
    @else
        <div style="display: flex;flex-direction: column;align-items: center; justify-content: center">
            <h3 class="mt-2">edit booking</h3>
            <form action="{{ route('bookings.update', $booking->id)}}" method="post" style="width: 50%">
                @csrf

                <div class="form-group mt-3">
                    <label for="title" class="text-dark">TITLE:</label><br>
                    <input value="{{$booking->title}}"  type="text" name="title" class="form-control">
                    @error('title')<span class="fs-6 mt-2 text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group mt-3">
                    <label for="description" class="text-dark">DESCRIPTION:</label><br>
                    <textarea  name="description" class="form-control"> {{$booking->description}}
                    </textarea>
                    @error('description')<span class="fs-6 mt-2 text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group mt-3" >
                    <label for="started_time" class="text-dark">BEGIN_AT:</label><br>
                    <input value="{{$booking->started_time}}"  type="datetime-local" name="started_time" class="form-control">
                    @error('started_time')<span class="fs-6 mt-2 text-danger">{{ $message }}</span>@enderror
                </div>
                <button class="btn btn-primary btn-sm mt-3" style="width: 100%" type="submit"> confirm</button>
            </form>
        </div>
    @endif
@endsection
