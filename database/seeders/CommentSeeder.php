<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 50; $i++) {
            $project = Project::inRandomOrder()->first();

            $comment = new Comment();
            $comment->author = fake()->name();
            $comment->content = fake()->text();
            $comment->project_id = $project->id;

            $comment->save();
        }
    }
}
