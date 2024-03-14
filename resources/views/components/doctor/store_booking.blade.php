<div style="display: flex;flex-direction: column;align-items: center; justify-content: center">
    <h3>create new booking</h3>
    <form action="{{ route('bookings.store')}}" method="post" style="width: 50%">
        @csrf
        <div class="form-group mt-3">
            <label for="title" class="text-dark">TITLE:</label><br>
            <input  type="title" name="title" class="form-control">
            @error('title')<span class="fs-6 mt-2 text-danger">{{ $message }}</span>@enderror
        </div>
        <div class="form-group mt-3">
            <label for="description" class="text-dark">DESCRIPTION:</label><br>
            <textarea name="description" class="form-control">
            </textarea>
            @error('description')<span class="fs-6 mt-2 text-danger">{{ $message }}</span>@enderror
        </div>

        <div class="form-group mt-3" >
            <label for="started_time" class="text-dark">BEGIN_AT:</label><br>
            <input  type="datetime-local" name="started_time" class="form-control">
            @error('started_time')<span class="fs-6 mt-2 text-danger">{{ $message }}</span>@enderror
        </div>
        <button class="btn btn-primary btn-sm mt-3" style="width: 100%" type="submit"> +booking</button>
    </form>
</div>
