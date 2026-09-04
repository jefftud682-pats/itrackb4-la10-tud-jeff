# ITRACKB4 - Laboratory Activity 3

## Movie Collection

This project is a simple Laravel application about movies.
It has a movie list, detail pages, a featured movie, and a filter
for movie genres.

## Routes

- `/movies` - shows all movies.
- `/movies/featured` - shows the featured movie.
- `/movies/{id}` - shows the details of a movie.
- `/movies/filter/{value}` - filters movies by genre.
- `/movies/filter` - shows all movies when there is no filter.

## Questions

### 1. Why must `/movies/featured` be placed before `/movies/{id}`?

The featured route must be placed before the detail route because
Laravel checks routes from top to bottom. If `/movies/{id}` comes
first, Laravel may treat "featured" as an ID. Putting the featured
route first makes sure the correct page is loaded.

### 2. What happens when a nonexistent ID is requested?

The controller checks if the requested ID exists in the movie data.
If the ID does not exist, `abort(404)` is used. This displays a
404 Not Found page instead of an error.

### 3. Why are named routes useful? What can break if we do not use them?

Named routes make it easier to create links because we can use the
route name instead of typing the URL directly. If the URL changes,
hard-coded links may stop working. Named routes make the links
easier to manage.

## How to Run

1. Open the project folder in the terminal.
2. Run `php artisan serve`.
3. Open the local Laravel URL in a browser.
4. Visit `/movies` to view the movie collection.

## Author

Jeff Tud