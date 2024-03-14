<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DeparmentController;
use App\Models\Booking;
use App\Models\Deparment;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $departments = Deparment::orderBy('created_at', 'desc')->get();
    if(auth()->user()->is_doctor){
        $active_bookings = Booking::query()
                                    ->whereNull('patient_id')
                                    ->where('doctor_id', auth()->user()->id)
                                    ->where('is_finnish', false)
                                    ->orderBy('created_at', 'desc')->get();
        $booked_bookings = Booking::query()
                                    ->whereNotNull('patient_id')
                                    ->where('doctor_id', auth()->user()->id)
                                    ->where('is_finnish', false)
                                    ->orderBy('started_time', 'asc')->get();
        // dd($booked_bookings);
        $finnished_record = Booking::query()
                                    ->whereNotNull('patient_id')
                                    ->where('doctor_id', auth()->user()->id)
                                    ->where('is_finnish', true)
                                    ->orderBy('started_time', 'desc')->get();

        return view('home', compact('departments', 'active_bookings', 'booked_bookings', 'finnished_record'));

    }
    return view('home', compact('departments'));

})->name('home')->middleware('auth');

Route::get('/stepup', function (){
    $departments = Deparment::all();
    return view('components.doctor.stepup', compact('departments'));
})->name('stepup')->middleware('auth');

Route::get('/doctors/{id}', function ($id){

    $doctor = User::find($id);
    $bookings = $doctor->bookings()
                       ->where('is_finnish', false)
                       ->whereNull('patient_id')
                       ->orderBy('started_time', 'asc')
                       ->get();
// dd($bookings);
    return view('components.patient.doctor_bookings', compact('doctor', 'bookings'));

})->name('doctor.bookings')->middleware('auth');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');

    Route::post('/register', [AuthController::class, 'store']);

    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/login', [AuthController::class, 'auth_check']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('/stepup_info', [DeparmentController::class, 'toSetpupInfo'])->name('stepup_info')->middleware('auth');

Route::post('/store', [BookingController::class, 'store'])->name('bookings.store');
Route::get('/{id}/edit', [BookingController::class, 'edit'])->name('bookings.edit');
Route::post('/{id}/update', [BookingController::class, 'update'])->name('bookings.update');
Route::get('/{id}/delete', [BookingController::class, 'destroy'])->name('bookings.delete');
Route::get('/{id}/book', [BookingController::class, 'book'])->name('patient.book');
Route::get('/{id}/cancle', [BookingController::class, 'cancle'])->name('patient.cancle');
Route::get('/{id}/finnish', [BookingController::class, 'finnish'])->name('bookings.finnish');

