<?php

use App\Category;
use App\Tag;
use App\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Record', 'Progress', 'Customers', 'Freebie', 'Offer', 'Screenshot', 'Milestone', 'Version', 'Design', 'Customers', 'Job'];
        $categoryNames = ['News', 'Design', 'Updates', 'Marketing', 'Partnership', 'Product', 'Hiring', 'Offers'];

        foreach ($categoryNames as $category) {
            Category::create([
                'name' => $category,
            ]);
        }

        foreach ($tags as $tag) {
            Tag::create([
                'name' => $tag,
            ]);
        }

        $author = User::create([
            'name' => 'Muhemuryahebwa Ivoraymond',
            'email' => 'ivoraymond@gmail.com',
            'about' => 'The Black Smith\'s Son',
            'role' => 'writer',
            'password' => Hash::make('ivoraymond')
        ]);


        $post1 = $author->posts()->create([
            'title' => 'We relocated our office to a new designed garage',
            'description' => 'The standard Lorem Ipsum passage',
            'content' => 'It used since the 1500s Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'category_id' => 1,
            'image' => 'posts/1.jpg'
        ]);

        $post1->tags()->attach([1, 2]);

        $post2 = $author->posts()->create([
            'title' => 'Top 5 brilliant content marketing strategies',
            'description' => 'The standard Lorem Ipsum passage 2',
            'content' => 'It used since the 1500s Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'category_id' => 2,
            'image' => 'posts/2.jpg'
        ]);

        $post2->tags()->attach([1, 2, 3]);


        $post3 = $author->posts()->create([
            'title' => 'Best practices for minimalist design with example',
            'description' => 'The standard Lorem Ipsum passage 3',
            'content' => 'It used since the 1500s Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'category_id' => 3,
            'image' => 'posts/3.jpg'
        ]);

        $post3->tags()->attach([1, 2, 5, 4]);

        $post4 = $author->posts()->create([
            'title' => 'Congratulate and thank to Maryam for joining our team',
            'description' => 'The standard Lorem Ipsum passage 4',
            'content' => 'It used since the 1500s Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'category_id' => 4,
            'image' => 'posts/4.jpg'
        ]);

        $post4->tags()->attach([2, 5, 6]);

        $post5 = $author->posts()->create([
            'title' => 'New published books to read by a product designer',
            'description' => 'The standard Lorem Ipsum passage 5',
            'content' => 'It used since the 1500s Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'category_id' => 5,
            'image' => 'posts/5.jpg'
        ]);

        $post5->tags()->attach([1, 2, 6]);

        $post6 = $author->posts()->create([
            'title' => 'This is why it\'s time to ditch dress codes at work',
            'description' => 'The standard Lorem Ipsum passage 6',
            'content' => 'It used since the 1500s Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'category_id' => 6,
            'image' => 'posts/6.jpg'
        ]);

        $post6->tags()->attach([1, 2, 6, 3]);
    }
}
