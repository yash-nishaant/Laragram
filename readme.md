## About Laragram   

Laragram is a simple social network (based on Instagram) designed almost entirely in Laravel (with a few Vue components in the front-end). Please note that this project was designed with the primary goal in mind of demonstrating competency with various Laravel features, and is not a full-featured social network. Nonetheless, you can <b>post</b>, <b>like</b> and <b>comment</b> on posts and <b>follow</b> other users. You also receive <b>notifications</b> upon the follow status being changed.  

## Instructions:

1. Clone git repository and `cd` into it.
2. Type `composer install` to install all dependencies.
3. Create `.env` file copying or renaming  `.env.example` file. Hint: `cp .env.example .env`.
4. `php artisan key:generate` to creat application key.
5. Set your database credentials in the `.env` file.
6. Set your Mailtrap credentials in the `.env` file.
6. `php artisan migrate` to get all migrations into database.
6. `php artisan storage:link` to link the public storage directory and thus allow image paths to be read.
7. `php artisan serve`.
8. Enjoy!

