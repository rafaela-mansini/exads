# Exads Project
This project contain some number of test projects.

## Techs

Those were the technologies used:

- [PHP 7.4] - https://www.php.net
- [Composer] - https://getcomposer.org/
- [MySQL] - https://www.mysql.com/
- [TWIG Templates] - https://twig.symfony.com/

## Requirements
- PHP (7.4) | Database relational (recomend MySql or PostgreSQL) | Composer | Apache (server to run PHP);

## Project
### 1. Prime Numbers
 - This script prints all integer values from 1 to 100. Beside each number, print the numbers it is a multiple of (inside brackets and comma-separated). If only multiple of itself then print `[PRIME]`.
 - To run this project: use the integrated PHP and run this command inside the main folder: `php -S your localhost:8880 -t prime-numbers`.

### 2. ASCII Array
 - Script to generate a random array containing all the ASCII characters from comma (“,”) to pipe (“|”). Then randomly remove and discard an arbitrary element from this newly generated array.
 - To run this project: use the integrated PHP and run this command inside the main folder: `php -S your localhost:8880 -t ascii-array`.

### 3. TV Series
 - Script to tell when the next TV Series will air based on the current time-date or an inputted time-date, and that can be optionally filtered by TV Series title.
 - Before run this project, you need make a dump with database informations. The file from dump it's in folder `tv-series/db/dump.sql`. 
 - Will be necessary too rename the file `.env~example` to `.env` and inside this file, insert your database configuration.
 - To run this project: use the integrated PHP and run this command inside the main folder: `php -S your localhost:8880 -t tv-series`.
 - To see this project running, you can use some Json viwer program (like postman or insomnia), or you can run a simple HTML template.
    - Requests/json: 
        - To search with a atual datetime, you need to do a GET request to your localhost;
        - To search passing some params to search by title or specific date, you need to do a POST request to your localhost.<br/>
        You can use this params on the body of the request to make you search:<br/>
        ```
        {
            title: 'Your title here',
            dateTime: '2021-11-10 20:00:00'
        }        
        ```
    - HTML: To see a simple form on this project, do you need to run your `http://localhost:8880/view/form.php`.
        - *IMPORTANT:* If you don't run the project on port 8880, will be necessary change the `apiURL` on file `/tv-series/view/form.php` inserting the running port.

### 4. A/B Testing
 - We would like to A/B test some promotional designs to see which provides the best conversion rate. Write a snippet of PHP code that redirects end users to the different designs based on the data provided by this library: `packagist.org/exads/ab-test-data`.
 - To run this project: use the integrated PHP and run this command inside the main folder: `php -S your localhost:8880 -t ab-testing`.
 - To open your project on web, use the url: `http://localhost:8880/{promo-id}` where the promo-id will be the id from searched promotion.
 - To use a custom template, you can just insert in a `/ab-testing/templates/` folder your custom template with the structure:
    - A folder with the name of promotion;
    - Inside this folder, each component template with the name of design separed by `-` and with the name in lower case.

## How run this project
To run this project, you can use the integrated PHP with the command `php -S your localhost:8880 -t folder-to-test`

## License and credits

MIT
**Free Software**
Code made by Rafaela Mansini [Github](https://github.com/rafaela-mansini) [LinkedIn](https://www.linkedin.com/in/rafaela-mansini/?locale=en_US)
