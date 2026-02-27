<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

Route::get('/',[AdminController::class,'home']);


// =================== ADMIN GROUP ===================
Route::middleware(['auth','admin'])->group(function () {

    Route::get ('/home',[AdminController::class, 'index'])->name('home');

    Route::get('/create_room',[AdminController::class,'create_room']);
    Route::Post('/add_room',[AdminController::class,'add_room']);
    Route::get('/view_room',[AdminController::class,'view_room'])->name('view_room');
    Route::get('/delete_room/{id}',[AdminController::class,'delete_room']);
    Route::get('/edit_room/{id}',[AdminController::class,'edit_room']);
    Route::put('/update_room/{id}',[AdminController::class,'update_room']);

    Route::get('/bookings',[AdminController::class,'bookings']);
    Route::get('/delete_booking/{id}',[AdminController::class,'delete_booking']);
    Route::get('/approve_booking/{id}',[AdminController::class,'approve_booking']);
    Route::get('/reject_booking/{id}',[AdminController::class,'reject_booking']);

    Route::get('/view_gallary',[AdminController::class,'view_gallary']);
    Route::post('/upload_gallary',[AdminController::class,'upload_gallary']);
    Route::get('/delete_gallary/{id}',[AdminController::class,'delete_gallary']);

    Route::get('/all_messages',[AdminController::class,'all_messages']);
    Route::get('/send_mail/{id}',[AdminController::class,'send_mail']);
    Route::post('/mail/{id}',[AdminController::class,'mail']);
    Route::get('/update_room/{id}', function () {
    return redirect('/');

    
});
Route::get('/allusers', [AdminController::class, 'allUsers'])->name('allusers');


});


// =================== PUBLIC ROUTES ===================

Route::get('/room_details/{id}',[HomeController::class,'room_details']);
Route::post('/add_booking/{id}',[HomeController::class,'add_booking']);
Route::post('/contact',[HomeController::class,'contact'])->name('contact.submit');
Route::get('/our_rooms',[HomeController::class,'our_rooms'])->name('our_rooms');
Route::get('/hotel_gallary',[HomeController::class,'hotel_gallary'])->name('hotel_gallary');
Route::get('/contact_us',[HomeController::class,'contact_us'])->name('contact_us');
Route::get('/profile', [HomeController::class, 'show']);