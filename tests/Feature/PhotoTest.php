<?php

namespace Tests\Feature;

use App\Photo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PhotoTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreatingPhoto()
    {
        // Upload a Photo
        $photo = factory(Photo::class)->create([
            'latitud' => '345234',
            'longitud' => '2345234',
            'picture' => 'jkhjgfgh'
        ]);
        // Verify it works
        $this->assertDatabaseHas('photos', ['picture' => 'jkhjgfgh']);
        $saved = Photo::where('picture', 'jkhjgfgh')->first();
        $this->assertEquals($saved->latitud, '345234');
        $this->assertEquals($saved->longitud, '2345234');
        $this->assertEquals($saved->picture, 'jkhjgfgh');
    }
}
