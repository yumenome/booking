@extends('layout.app')
@section('content')

<h2 class="ms-3 mt-2 text-center">stepup doctor info</h2>
<div style="display: flex;align-items: center; justify-content: center">
    <form enctype="multipart/form-data" action="{{ route('stepup_info')}}" method="post">
        @csrf
        <div class="form-group mt-3">
            <label for="experience" class="text-dark">Experience:</label><br>
            <input type="text" name="experience" id="experience" class="form-control">
            @error('experience')<span class="fs-6 mt-2 text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group mt-3">
            <label for="img" class="text-dark">Doctor Photo:</label><br>
            <input type="file" name="img" id="img" class="form-control">
            @error('img')<span class="fs-6 mt-2 text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group mt-3">
            <select class="form-select" name="department">
                <option selected>Select Department</option>
                @foreach ($departments as $dep)
                <option value={{$dep->id}}>{{$dep->title}}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary mt-2 btn-sm fs-6 " type="submit"> confirm</button>
    </form>
</div>
@endsection

