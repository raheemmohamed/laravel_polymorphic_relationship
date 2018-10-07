<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Photo;
use App\Staff;
use App\Product;

Route::get('/', function () {
    return view('welcome');
});

//polymorphic insert data method 1 with photo table
Route::get('/polymorphicinsert',function (){

    $staff = Staff::create(['staff_name'=>'edwin diaz']);
   //$staff = Staff::find(3);

   $staff->staff_photo()->create(['path'=>'Raheem.jpg']);

});
//polymorphic insert data method 1 with product table
Route::get('/polymorphicinsertproduct',function (){

    $staff = Staff::find(3);

    $product = Product::create(['prod_name'=>'Laravel Disk']);

});

//read polymorphic data
Route::get('/readpolymorphicdata',function(){
    $staff = Staff::find(3);

    foreach($staff->staff_photo as $staff_photo){
        echo $staff_photo->path;
    }
});

//update the Polymorphic data records
Route::get('/updatedPolymorphic',function(){
    $staff = Staff::find(3);

    $staffs = $staff->staff_photo()->where('id',1)->first();

    $staffs->path = "Rhaeem.jpeg";

    $staffs->save();

});


//Delete Polymorphic data record from table
Route::get('/deletepolymorhpic',function(){
    $staff = Staff::findOrFail(3);

    $staff->staff_photo()->whereId(1)->delete();
});


//Laravel Assign fucntion
/* How this Assign function work is there any empty colum without any column value we can
update the particular record using the photo table id
*/
Route::get('/assign',function(){
    $staff = Staff::findOrFail(3);

    $photoes = Photo::findOrFail(4);

    $staff->staff_photo()->save($photoes);
});

//Laravel Unasign function
/*This is unassign of laravel which is update the assign function as unassigned or make table
colum empty
*/
Route::get('/un-assign',function(){
    $staff = Staff::findOrFail(3);

    $staff->staff_photo()->whereId(4)->update(['imageable_id'=>'','imageable_type'=>'']);
});