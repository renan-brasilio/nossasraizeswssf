<?php

use Illuminate\Foundation\Inspiring;

// Console Rotes

Artisan::command('inspire', function () {
    
    $this->comment(Inspiring::quote());
	
	})->describe('Display an inspiring quote'
);