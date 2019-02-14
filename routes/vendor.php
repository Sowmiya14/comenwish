<?php

Route::get('/home', 'VendorMasterController@dashboard')->name('home');



Route::get('not_approved', function(){
    return view('vendor.not_approved');
});
Route::get('blocked', function(){
    return view('vendor.blocked_vendor');
});

Route::get('verifyphonenumber', 'VendorMasterController@sendOTP');
Route::get('resendotp', 'VendorMasterController@sendOTP');


Route::post('verifyotp', 'VendorMasterController@verifyotp');



Route::get('products/add','ProductController@addProducts');
Route::get('products/view','ProductController@viewProducts');
Route::get('products/updatevendorcategory', 'ProductController@updateVendorCategory');
	





Route::get('master/caterings','VendorMasterController@showCaterings');
Route::post('master/caterings','VendorMasterController@addCaterings')->name('showCatering');
Route::get('master/viewcaterings','VendorMasterController@viewCaterings');
Route::delete('master/catering/{id}','VendorMasterController@deleteCaterings')->name('destory_catering');
Route::get('catering/{id}/edit', 'VendorMasterController@showEditCaterings')->name('edit_catering');
Route::post('catering/edit/{id}', 'VendorMasterController@updateCaterings')->name('update_catering');


Route::get('master/bridalwear','VendorMasterController@showBridalWear');
Route::post('master/bridalwear','VendorMasterController@addBridalWear')->name('showBridalWear');
Route::get('master/viewbridalwear','VendorMasterController@viewBridalWear');
Route::delete('master/bridalwear/{id}','VendorMasterController@deleteBridalWear')->name('destory_bridalwear');
Route::get('bridalwear/{id}/edit', 'VendorMasterController@showEditBridalWear')->name('edit_bridalwear');
Route::post('bridalwear/edit/{id}', 'VendorMasterController@updateBridalWear')->name('update_bridalwear');


Route::get('master/dj', 'VendorMasterController@showDj');
Route::post('master/dj', 'VendorMasterController@addDj')->name('showDj');
Route::get('master/viewdj', 'VendorMasterController@viewDj');
Route::delete('master/dj/{id}','VendorMasterController@deleteDj')->name('destory_dj');
Route::get('dj/{id}/edit', 'VendorMasterController@showEditDj')->name('edit_dj');
Route::post('dj/edit/{id}', 'VendorMasterController@updateDj')->name('update_dj');


Route::get('master/photography','VendorMasterController@showPhotography');
Route::post('master/photography','VendorMasterController@addPhotography')->name('showPhotography');
Route::get('master/viewphotography','VendorMasterController@viewphotography');
Route::delete('master/photography/{id}','VendorMasterController@deletephotography')->name('destory_photography');
Route::get('photography/{id}/edit', 'VendorMasterController@showEditphotography')->name('edit_photography');
Route::post('photography/edit/{id}', 'VendorMasterController@updatephotography')->name('update_photography');


Route::get('master/videography','VendorMasterController@showVideoGraphy');
Route::post('master/videography','VendorMasterController@addVideoGraphy')->name('showVideoGraphy');
Route::delete('master/videography/{id}','VendorMasterController@deleteVideoGraphy')->name('destory_videography');
Route::get('videography/{id}/edit', 'VendorMasterController@showEditVideoGraphy')->name('edit_videography');
Route::get('master/viewvideography','VendorMasterController@viewVideoGraphy');
Route::post('videography/edit/{id}', 'VendorMasterController@updateVideoGraphy')->name('update_videography');


Route::get('master/makeup','VendorMasterController@showMakeUp');
Route::post('master/makeup','VendorMasterController@addMakeUp')->name('showMakeUp');
Route::get('master/viewmakeup','VendorMasterController@viewMakeUp');
Route::delete('master/makeup/{id}','VendorMasterController@deleteMakeUp')->name('destory_makeup');
Route::get('makeup/{id}/edit', 'VendorMasterController@showEditMakeUp')->name('edit_makeup');
Route::post('makeup/edit/{id}', 'VendorMasterController@updateMakeUp')->name('update_makeup');


Route::get('master/grooming','VendorMasterController@showGrooming');
Route::post('master/grooming','VendorMasterController@addGrooming')->name('showGrooming');
Route::get('master/viewgrooming', 'VendorMasterController@viewGrooming');
Route::delete('master/grooming/{id}','VendorMasterController@deleteGrooming')->name('destory_grooming');
Route::get('grooming/{id}/edit', 'VendorMasterController@showEditGrooming')->name('edit_grooming');
Route::post('grooming/edit/{id}', 'VendorMasterController@updateGrooming')->name('update_grooming');


Route::get('master/decoration','VendorMasterController@showDecoration');
Route::post('master/decoration','VendorMasterController@addDecoration')->name('showDecoration');
Route::delete('master/decoration/{id}','VendorMasterController@deleteDecoration')->name('destory_decoration');
Route::get('decoration/{id}/edit', 'VendorMasterController@showEditDecoration')->name('edit_decoration');
Route::get('master/viewdecoration','VendorMasterController@viewDecoration');
Route::post('decoration/edit/{id}', 'VendorMasterController@updateDecoration')->name('update_decoration');


Route::get('master/sangeethchoreographers','VendorMasterController@showSangeethChoreographers');
Route::post('master/sangeethchoreographers','VendorMasterController@addChoreo')->name('showChoreo');
Route::get('master/viewchoreo','VendorMasterController@viewChoreo');
Route::delete('master/choreo/{id}','VendorMasterController@deleteChoreo')->name('destory_choreo');
Route::get('choreo/{id}/edit', 'VendorMasterController@showEditChoreo')->name('edit_choreo');
Route::post('choreo/edit/{id}', 'VendorMasterController@updateChoreo')->name('update_choreo');


Route::get('master/music','VendorMasterController@showMusic');
Route::post('master/music','VendorMasterController@addMusic')->name('showMusic');
Route::get('master/viewmusic','VendorMasterController@viewMusic');
Route::delete('master/music/{id}','VendorMasterController@deleteMusic')->name('destory_music');
Route::get('music/{id}/edit', 'VendorMasterController@showEditMusic')->name('edit_music');
Route::post('music/edit/{id}', 'VendorMasterController@updateMusic')->name('update_music');


Route::get('master/giftcompliments', 'VendorMasterController@showGiftCompliments');
Route::post('master/giftcompliments', 'VendorMasterController@addGifts')->name('showGifts');
Route::get('master/viewgift', 'VendorMasterController@viewGifts');
Route::delete('master/gift/{id}','VendorMasterController@deleteGifts')->name('destory_gift');
Route::get('gift/{id}/edit', 'VendorMasterController@showEditGifts')->name('edit_gift');
Route::post('gift/edit/{id}', 'VendorMasterController@updateGifts')->name('update_gift');


Route::get('master/cakes','VendorMasterController@showCakes');
Route::post('master/cakes','VendorMasterController@addCakes')->name('showCakes');
Route::get('master/viewcakes','VendorMasterController@viewcakes');
Route::delete('master/cakes/{id}','VendorMasterController@deleteCakes')->name('destory_cakes');
Route::get('cakes/{id}/edit', 'VendorMasterController@showEditCakes')->name('edit_cakes');
Route::post('cakes/edit/{id}', 'VendorMasterController@updateCakes')->name('update_cakes');


Route::get('master/transport','VendorMasterController@showTransport');
Route::post('master/transport','VendorMasterController@addTransport')->name('addtransport');
Route::get('master/viewtransport','VendorMasterController@viewtransport');
Route::delete('master/transport/{id}','VendorMasterController@deletetransport')->name('destory_transport');
Route::get('transport/{id}/edit', 'VendorMasterController@showEditTransport')->name('edit_transport');
Route::post('transport/edit/{id}', 'VendorMasterController@updatetransport')->name('update_transport');

Route::get('master/location','VendorMasterController@showlocation');
Route::post('master/location','VendorMasterController@addLocation')->name('add_location');
Route::delete('master/location/{id}','VendorMasterController@deletelocation')->name('destory_location');
Route::get('location/{id}/edit','VendorMasterController@showEditLocation')->name('edit_location');
Route::post('location/edit/{id}','VendorMasterController@updateLocation')->name('update_location');



Route::get('account','VendorMasterController@editAccount');
Route::post('account/update/{id}','VendorMasterController@updateAccount')->name('account_update');

Route::get('changepassword','VendorMasterController@changepassword');
Route::post('changepassword','VendorMasterController@updatepassword')->name('update_password');

Route::get('master/venues','VendorMasterController@showVenues');
Route::post('master/venues','VendorMasterController@addVenue')->name('add_venue');
Route::get('master/viewvenues','VendorMasterController@viewVenues');
Route::delete('master/venues/{id}','VendorMasterController@deleteVenues')->name('destory_venues');
Route::get('venues/{id}/edit', 'VendorMasterController@showEditVenues')->name('edit_venues');
Route::post('venues/edit/{id}', 'VendorMasterController@updateVenues')->name('update_venues');


