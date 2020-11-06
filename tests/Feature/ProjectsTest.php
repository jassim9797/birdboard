<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use WithFaker,RefreshDatabase;

        public function test_a_user_can_create_a_project(){
            $this->withExceptionHandling();
            $attributes = [
                'title'=>$this->faker->sentence,
                'description'=>$this->faker->paragraph

            ];
            $this->post('/projects',$attributes)->assertRedirect('/projects');

            $this->assertDatabaseHas('projects',$attributes);
           $this->get('/projects')->assertSee($attributes['title']);
        }

        public function a_project_requires_a_title(){
            
        }
    
}
