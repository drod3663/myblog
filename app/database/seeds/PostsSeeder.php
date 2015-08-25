<?php 
use Faker\Factory as Faker;

class PostsSeeder extends Seeder {

	public function run()
	{
		// Post::truncate(); 

		$faker = Faker::create();

		$post = new Post();
		$post->title =$faker->catchPhrase;
		$post->body = $faker->bs;
		$post->save();

		$post = new Post();
		$post->title = 'My First Post';
		$post->body = 'This is my first post on my Laravel blog which I hae made from scratch!';
		$post->save();

		$post2 = new Post();
		$post2->title = 'hello';
		$post2->body = 'is it me you\'re looking for';
		$post2->save();
	}

}

 