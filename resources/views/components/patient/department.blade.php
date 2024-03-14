<div style="width: 90%;margin: 2% 5%">
    @foreach ($departments as $dep)
        @if (count($dep->doctors) > 0)
        <div>
            <h1>{{$dep->title}} department</h1>
            <div style="margin-top: 20px;display: flex;max-width: 100%;
            overflow-x: scroll">
                @foreach ($dep->doctors as $doctor)
                @if (count($doctor->bookings) > 0)

                <div class="card me-5" style="min-width: 350px;max-width: 350px;height: 520px;margin-bottom: 20px">
                    <img src={{$doctor->getImgUrl()}} style="height: 300px">
                    <div class="card-body">
                        <h5 class="card-title">Dr.{{$doctor->name}}</h5>
                        <p class="card-text">Gender: {{$doctor->gender}}</p>
                        <p class="card-text">Expricence: {{$doctor->experience}}</p>
                        <p class="card-text">Email: {{$doctor->email}}</p>
                        <a href="{{route('doctor.bookings', $doctor->id)}}" class="btn btn-primary btn-sm">Bookings {{count($doctor->bookings)}} </a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        @endif
    @endforeach
</div>
