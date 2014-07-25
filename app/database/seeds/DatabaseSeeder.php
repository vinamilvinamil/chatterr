<?php

class DatabaseSeeder extends Seeder {
 
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserTableSeeder');
		$this->command->info('User table seeded!');

		$this->call('CategoryTableSeeder');
		$this->command->info('Category table seeded!');

		$this->call('TopicTableSeeder');
		$this->command->info('Topic table seeded!');
	}

}

class UserTableSeeder extends Seeder { 

	public function run()
	{
		DB::table('users')->delete();
		User::create(array(
		'username' => 'Coheed',
		'name' => 'Mike Hanslo',
		'email' => 'mikehanslo@gmail.com',
		'password' => Hash::make('badger005'),
		'role' => 'admin',
		'about' => 'Founder and creator',
		'location' => 'Cape Town, South Africa',
		'website' => 'www.mikehanslo.com'));
	}
}

class CategoryTableSeeder extends Seeder { 

	public function run()
	{
		DB::table('categories')->delete();
		Category::create(array('name' => 'General'));
		Category::create(array('name' => 'News'));
		Category::create(array('name' => 'Tech'));
		Category::create(array('name' => 'Funny'));
		Category::create(array('name' => 'Gaming'));
	}
}

class TopicTableSeeder extends Seeder { 

	public function run()
	{
		DB::table('topics')->delete();
		Topic::create(array(
			'title' => 'How to use Chatterr',
			'content' => 'Welcome to Chatterr, we hope you enjoy your stay',
			'user_id' => 1,
			'category_id' => 1
			));
		Topic::create(array(
			'title' => 'Why Doge Is The Greatest Thing Ever',
			'content' => 'We like dogs, but so do you. Go Doge!',
			'user_id' => 1,
			'category_id' => 2
			));
	}
}