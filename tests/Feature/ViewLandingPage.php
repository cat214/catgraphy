<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewLandingPage extends TestCase
{
    //test
    public function landing_page_loads_correctly(){
        //indexに入ってタイトルが表示されればok
        $response = $this->get('/index');
        $response->assertStatus(200);
        $response->assertSee('catgraphy');
    }
}
