<?php

Route::get('', 'ShortLinkController@index')->name('home');

Route::post('create', 'ShortLinkController@store')->name('create.short.link');

Route::get('{token}', 'ShortLinkController@shortLink')->name('short.link');
