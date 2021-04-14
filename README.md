# Stranger Danger Chat

<img src="https://media.giphy.com/media/3o6fJ66RKYXJbkQ1RC/giphy.gif"  width="50%">

## Assignment

A school assignment to write a Laravel application of our own choosing.

We have chosen to make a randomized chat.

## Requirments

<details><summary><strong>The application should contain the following features of Laravel:</strong></b></summary>
- Controllers
- Migrations
- HTTP Tests (on all routes)
- Laravel Mix
- Middleware
- Models (with relationships)
- Routes (with route model binding)
- Eloquent
- Relationships
- Validation
- Views (Blade)
</details>

<details><summary><strong>Requirments:</strong></b></summary>
- The application idea should be discussed with the teacher and be given an OK before you get started.
- Each group should write a code review of at least 20 comments on the next groups project the day before presentations.
- The code syntax must adhere to the PSR-12 standard. If not, your project wont be approved and you'll get an extra assignment.
- Install the [Clockwork](https://github.com/itsgoingd/clockwork) extension in order to find issues such as [N+1 problem](https://laracasts.com/lessons/eager-loading) in your Laravel application.
- Oh, by the way, you can't use any fancy-pantzy JavaScript frameworks, **this is a backend assignment**. If you do want to write JavaScript it should be vanilla and just some basic stuff. Discuss this with your teacher.
</details>

## Installation

1. Clone this repository through the terminal: `git clone https://github.com/gusjak/stranger-danger-chat.git`.
2. Change your current directory to the repository: `cd stranger-danger-chat/`.
3. Install [Composer](https://getcomposer.org/).
4. Update composer with `composer update` in your terminal and wait for it to finish. 
5. Type `php artisan serve` in your terminal and it should open up a localhost for you. The default is: [http://localhost:8000](http://localhost:8000).

## Authors

- [Carolina Hagman](https://github.com/carolinahagman)
- [Jakob Gustafsson](https://github.com/gusjak)

## Code Review
By: [Gilda Ahmadniaye Jourshary](https://github.com/gillybeans) & [Joakim Sjögren](https://github.com/JoakimSjogren)

1. There is no .env-example file to copy and paste into .env to make the site viewable for us.
2. Tests does not work without the Unit map.
3. Your code looks very clean and nice, we like it.
4. We noticed that there isn’t a testing for joining chats.
5. We noticed that there isn’t a testing for writing messages.
6. In LogoutController.php there is some commented code and we’re not sure why.
7. In UserController.php it’s not necessary for some else-statements, for instance on row 20 else { is not necessary after return.
8. The site looks pretty, the layout and design is very good.
9. We are having difficulty starting a new chat after logging in.
10. In the ChatsController.php on row 18 and 24 there’s no need to write \App\Models\Chat, it should be enough to only write Chat.
11. On the website when you go to your profile to change your password you don’t see the input fields.
12. On row 28 in ChatsController.php, the $request parameter is not being used.
13. This is a fun idea of an application, ooo scary, stranger danger time ~
14. On UserTest.php row 24, a suggestion is to make it more easy to read maybe try to consider using “/user/$user->id” instead.
15. Amazing usage of tailwind, the design of the website looks very simple and aesthetic.
16. Good job with following the PSR-12 standard.
17. Your blade-files were very organized and clean. Easy to follow. Very nice. 
18. Sad that we couldn't see or use the full application :(
19. In ChatsController.php on row 56 there’s a commented code ;)
20. Great job you guys rock! 

## License

This project is licensed under the MIT License - see the **[LICENSE](https://github.com/gusjak/stranger-danger-chat/blob/main/LICENSE)** here.
