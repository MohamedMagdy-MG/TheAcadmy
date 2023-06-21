<?php

use Illuminate\Support\Facades\Route;

Route::fallback('API\V1\AuthController@NotFound');
