<?php

Route::get('/home', 'DashboardController@Vendor')->name('home');

Route::get('/master/vendor', 'MasterController@vendor');
Route::post('/master/vendor', 'MasterController@storevendor');
Route::delete('/master/vendor/{id}','MasterController@delete')->name('destory_vendortype');
Route::get('/master/{id}/edit','MasterController@edit')->name('edit_vendortype');
Route::post('/master/{id}/update','MasterController@update')->name('update_vendor_type');
Route::get('/master/{id}/edit','MasterController@edit')->name('edit_vendortype');
Route::post('/master/{id}/default','MasterController@default')->name('default_vendor_type');
Route::get('/master/default', 'MasterController@default');

Route::get('/productpercentage/default', 'ProductpercentageController@default');
Route::post('/productpercentage/default', 'ProductpercentageController@update');


Route::get('/vendor/blocked','VendorController@blockedVendor');
Route::post('/vendor/{id}/unblock','VendorController@unblockedVendor')->name('unblock_vendor');

Route::get('/vendor/vendortypeapprove', 'VendorController@viewVendortypeapprove');
Route::post('/vendor/vendortypeapprove/{id}', 'VendorController@vendortypeapprove')->name('approve-vendortype');

Route::get('/vendor/add', 'VendorController@index');
Route::post('/vendor/add', 'VendorController@store');
Route::get('/vendor/approve', 'VendorController@showUnApprovedVendors');
Route::post('/vendor/approve/{id}', 'VendorController@approveVendor')->name('approve_vendor');
Route::get('/vendor', 'VendorController@vendorindex');
Route::get('/vendor/{id}','VendorController@view')->name('view_vendor');
Route::delete('/vendor/{id}','VendorController@deleteVendor')->name('destory_vendor');
Route::get('vendor/{id}/edit', 'VendorController@showEditVendor')->name('edit_vendor');
Route::post('/vendor/edit/{id}', 'VendorController@showEditVendor');
Route::post('/vendor/{id}/update', 'VendorController@updateVendor')->name('update_vendor');
Route::get('/vendor/{id}/block','VendorController@blockVendor')->name('block_vendor');



Route::get('/product/add','AdminProductController@addProducts');
Route::get('/product/view','AdminProductController@viewProducts');

Route::get('/account', 'VendorController@account');
Route::post('/account/{id}/update', 'VendorController@updateaccount')->name('updateaccount');
Route::get('/password', 'VendorController@password');
Route::post('/password/{id}/update', 'VendorController@updatepassword')->name('updatepassword');

Route::get('/sitesetting/sitesetting', 'SitesettingController@setting');
Route::post('/sitesetting/sitesetting/{id}', 'SitesettingController@updatesetting');



Route::get('master/venues','AdminVendorMasterController@showVenues');
Route::post('master/venues','AdminVendorMasterController@addVenues')->name('showVenues');
Route::get('master/viewvenues','AdminVendorMasterController@viewVenues');
Route::delete('master/venues/{id}','AdminVendorMasterController@deleteVenues')->name('destory_venues');
Route::get('venues/{id}/edit', 'AdminVendorMasterController@showEditVenues')->name('edit_venues');
Route::post('venues/edit/{id}', 'AdminVendorMasterController@updateVenues')->name('update_venues');



Route::get('master/caterings','AdminVendorMasterController@showCaterings');
Route::post('master/caterings','AdminVendorMasterController@addCaterings')->name('showCaterings');
Route::get('master/viewcaterings','AdminVendorMasterController@viewCaterings');
Route::delete('master/caterings/{id}','AdminVendorMasterController@deleteCaterings')->name('destory_caterings');
Route::get('venues/{id}/edit', 'AdminVendorMasterController@showEditCaterings')->name('edit_caterings');
Route::post('venues/edit/{id}', 'AdminVendorMasterController@updateCaterings')->name('update_caterings');


Route::get('master/bridalwear','AdminVendorMasterController@showBridalWear');
Route::post('master/bridalwear','AdminVendorMasterController@addBridalWear')->name('showBridalWear');
Route::get('master/viewbridalwear','AdminVendorMasterController@viewBridalWear');
Route::delete('master/bridalwear/{id}','AdminVendorMasterController@deleteBridalWear')->name('destory_bridalwear');
Route::get('bridalwear/{id}/edit', 'AdminVendorMasterController@showEditBridalWear')->name('edit_bridalwear');
Route::post('bridalwear/edit/{id}', 'AdminVendorMasterController@updateBridalWear')->name('update_bridalwear');


Route::get('master/dj', 'AdminVendorMasterController@showDj');
Route::post('master/dj', 'AdminVendorMasterController@addDj')->name('showDj');
Route::get('master/viewdj', 'AdminVendorMasterController@viewDj');
Route::delete('master/dj/{id}','AdminVendorMasterController@deleteDj')->name('destory_dj');
Route::get('dj/{id}/edit', 'AdminVendorMasterController@showEditDj')->name('edit_dj');
Route::post('dj/edit/{id}', 'AdminVendorMasterController@updateDj')->name('update_dj');


Route::get('master/photography','AdminVendorMasterController@showPhotography');
Route::post('master/photography','AdminVendorMasterController@addPhotography')->name('showPhotography');
Route::get('master/viewphotography','AdminVendorMasterController@viewphotography');
Route::delete('master/photography/{id}','AdminVendorMasterController@deletephotography')->name('destory_photography');
Route::get('photography/{id}/edit', 'AdminVendorMasterController@showEditphotography')->name('edit_photography');
Route::post('photography/edit/{id}', 'AdminVendorMasterController@updatephotography')->name('update_photography');


Route::get('master/videography','AdminVendorMasterController@showVideoGraphy');
Route::post('master/videography','AdminVendorMasterController@addVideoGraphy')->name('showVideoGraphy');
Route::delete('master/videography/{id}','AdminVendorMasterController@deleteVideoGraphy')->name('destory_videography');
Route::get('videography/{id}/edit', 'AdminVendorMasterController@showEditVideoGraphy')->name('edit_videography');
Route::get('master/viewvideography','AdminVendorMasterController@viewVideoGraphy');
Route::post('videography/edit/{id}', 'AdminVendorMasterController@updateVideoGraphy')->name('update_videography');


Route::get('master/makeup','AdminVendorMasterController@showMakeUp');
Route::post('master/makeup','AdminVendorMasterController@addMakeUp')->name('showMakeUp');
Route::get('master/viewmakeup','AdminVendorMasterController@viewMakeUp');
Route::delete('master/makeup/{id}','AdminVendorMasterController@deleteMakeUp')->name('destory_makeup');
Route::get('makeup/{id}/edit', 'AdminVendorMasterController@showEditMakeUp')->name('edit_makeup');
Route::post('makeup/edit/{id}', 'AdminVendorMasterController@updateMakeUp')->name('update_makeup');


Route::get('master/grooming','AdminVendorMasterController@showGrooming');
Route::post('master/grooming','AdminVendorMasterController@addGrooming')->name('showGrooming');
Route::get('master/viewgrooming', 'AdminVendorMasterController@viewGrooming');
Route::delete('master/grooming/{id}','AdminVendorMasterController@deleteGrooming')->name('destory_grooming');
Route::get('grooming/{id}/edit', 'AdminVendorMasterController@showEditGrooming')->name('edit_grooming');
Route::post('grooming/edit/{id}', 'AdminVendorMasterController@updateGrooming')->name('update_grooming');


Route::get('master/decoration','AdminVendorMasterController@showDecoration');
Route::post('master/decoration','AdminVendorMasterController@addDecoration')->name('showDecoration');
Route::delete('master/decoration/{id}','AdminVendorMasterController@deleteDecoration')->name('destory_decoration');
Route::get('decoration/{id}/edit', 'AdminVendorMasterController@showEditDecoration')->name('edit_decoration');
Route::get('master/viewdecoration','AdminVendorMasterController@viewDecoration');
Route::post('decoration/edit/{id}', 'AdminVendorMasterController@updateDecoration')->name('update_decoration');


Route::get('master/sangeethchoreographers','AdminVendorMasterController@showSangeethChoreographers');
Route::post('master/sangeethchoreographers','AdminVendorMasterController@addChoreo')->name('showChoreo');
Route::get('master/viewchoreo','AdminVendorMasterController@viewChoreo');
Route::delete('master/choreo/{id}','AdminVendorMasterController@deleteChoreo')->name('destory_choreo');
Route::get('choreo/{id}/edit', 'AdminVendorMasterController@showEditChoreo')->name('edit_choreo');
Route::post('choreo/edit/{id}', 'AdminVendorMasterController@updateChoreo')->name('update_choreo');


Route::get('master/music','AdminVendorMasterController@showMusic');
Route::post('master/music','AdminVendorMasterController@addMusic')->name('showMusic');
Route::get('master/viewmusic','AdminVendorMasterController@viewMusic');
Route::delete('master/music/{id}','AdminVendorMasterController@deleteMusic')->name('destory_music');
Route::get('music/{id}/edit', 'AdminVendorMasterController@showEditMusic')->name('edit_music');
Route::post('music/edit/{id}', 'AdminVendorMasterController@updateMusic')->name('update_music');


Route::get('master/giftcompliments', 'AdminVendorMasterController@showGiftCompliments');
Route::post('master/giftcompliments', 'AdminVendorMasterController@addGifts')->name('showGifts');
Route::get('master/viewgift', 'AdminVendorMasterController@viewGifts');
Route::delete('master/gift/{id}','AdminVendorMasterController@deleteGifts')->name('destory_gift');
Route::get('gift/{id}/edit', 'AdminVendorMasterController@showEditGifts')->name('edit_gift');
Route::post('gift/edit/{id}', 'AdminVendorMasterController@updateGifts')->name('update_gift');


Route::get('master/cakes','AdminVendorMasterController@showCakes');
Route::post('master/cakes','AdminVendorMasterController@addCakes')->name('showCakes');
Route::get('master/viewcakes','AdminVendorMasterController@viewcakes');
Route::delete('master/cakes/{id}','AdminVendorMasterController@deleteCakes')->name('destory_cakes');
Route::get('cakes/{id}/edit', 'AdminVendorMasterController@showEditCakes')->name('edit_cakes');
Route::post('cakes/edit/{id}', 'AdminVendorMasterController@updateCakes')->name('update_cakes');


Route::get('master/transport','AdminVendorMasterController@showTransport');
Route::post('master/transport','AdminVendorMasterController@addTransport')->name('addtransport');
Route::get('master/viewtransport','AdminVendorMasterController@viewtransport');
Route::delete('master/transport/{id}','AdminVendorMasterController@deletetransport')->name('destory_transport');
Route::get('transport/{id}/edit', 'AdminVendorMasterController@showEditTransport')->name('edit_transport');
Route::post('transport/edit/{id}', 'AdminVendorMasterController@updatetransport')->name('update_transport');



Route::get('master/location','AdminVendorMasterController@showlocation');
Route::post('master/location','AdminVendorMasterController@addLocation')->name('add_location');
Route::delete('master/location/{id}','AdminVendorMasterController@deletelocation')->name('destory_location');
Route::get('location/{id}/edit','AdminVendorMasterController@showEditLocation')->name('edit_location');
Route::post('location/edit/{id}','AdminVendorMasterController@updateLocation')->name('update_location');



Route::get('event/add', 'AdminEventMasterController@show');
Route::post('event/add', 'AdminEventMasterController@add')->name('addEvent');
Route::get('event/view', 'AdminEventMasterController@view');
Route::get('event/{id}/edit', 'AdminEventMasterController@showEdit')->name('edit_event');
Route::post('event/edit/{id}','AdminEventMasterController@update')->name('update_event');
Route::delete('master/event/{id}','AdminEventMasterController@delete')->name('destory_event');



Route::get('types/add', 'AdminTypesMasterController@show');
Route::post('types/add', 'AdminTypesMasterController@add')->name('addTypes');
Route::get('types/view', 'AdminTypesMasterController@view');
Route::get('types/{id}/edit', 'AdminTypesMasterController@showEdit')->name('edit_types');
Route::post('types/edit/{id}','AdminTypesMasterController@update')->name('update_types');
Route::delete('master/types/{id}','AdminTypesMasterController@delete')->name('destory_types');

