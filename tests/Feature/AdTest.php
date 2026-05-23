<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Ad;
use App\Models\Category; 
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class AdTest extends TestCase
{
    use RefreshDatabase;

    #[Test] 
    public function an_unauthenticated_user_cannot_create_an_ad()
    {
        $response = $this->get('/ads/create');
        $response->assertRedirect('/login');
    }

    #[Test] 
    public function an_authenticated_user_can_view_the_create_form()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/ads/create');
        $response->assertStatus(200);
    }

    #[Test] 
    public function a_user_cannot_delete_someone_elses_ad()
    {
        $user1 = User::factory()->create();
        $user2 = User::factory()->create();

        $category = Category::create(['name' => 'Test']);

        $ad = Ad::factory()->create([
            'user_id' => $user1->id,
            'category_id' => $category->id
        ]);

        $response = $this->actingAs($user2)->delete("/ads/{$ad->id}");
        $response->assertStatus(403);
    }

    #[Test]
    public function the_application_returns_a_successful_response(): void
    {
        Category::create(['name' => 'Test Category']);
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}
