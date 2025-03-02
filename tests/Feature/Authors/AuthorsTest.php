<?php 

use Illuminate\Http\UploadedFile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Author;
use Illuminate\Support\Arr;

// uses(RefreshDatabase::class);

test('author can be created', function () {

    // Create a user and authenticate
    $user = User::factory()->create(['role' => 'librerian']);
    $this->actingAs($user);

    // Generate author data
    $authorArray = Author::factory()->raw(); // `raw()` returns an array without creating a model
    $authorArray['image'] = UploadedFile::fake()->image('image.jpg');
    $authorArray['user_id'] = $user->id; // Ensure user_id is set

    // Send POST request
    $response = $this->post('/authors', $authorArray); 
    // dd($response);

    // Assert response status
     $response->assertStatus(302);

    // Remove `image` key before checking the database
    unset($authorArray['image']);

    // Assert author exists in the database, except for the picture key
    $this->assertDatabaseHas('authors', Arr::except($authorArray, ['picture']));
});
