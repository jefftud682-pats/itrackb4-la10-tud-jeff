# ITRACKB4 - Movie Collection

## Routes

- `/movies` - shows all movies (with genre and director filters).
- `/movies/featured` - shows the featured movie.
- `/movies/{id}` - shows the details of a movie.
- `/movies/filter/{value}` - old genre filter, redirects to `/movies?genre=value`.
- `/movies/create` - shows the form for adding a new movie.
- `POST /movies` - validates and saves the new movie.

## LA6 Questions

### Q1. Why was there no need to create another route for the second filter?

The two filters are part of the same movie list, so they can use the existing
movies index route. The router only checks the path and does not use the query
string to match a route. Because of this, genre and director can be added after
the question mark. Both filters can also be placed in the same URL.

### Q2. If both filters were route parameters, what would the URL for one genre only look like?

If the genre was a route parameter, the URL could be `/movies/Romance`. The value
Romance would become part of the path that the router matches. This would make
filtering less flexible when another filter needs to be added.

### Q3. Which navigation pattern needed to change for the detail page?

The navigation pattern needed to include the movie detail path, so the movies
link can still be active on `/movies/1`. The filter page did not need a different
pattern because the query string is not part of the path.

### Q4. Why was the old filter removed while the empty methods were kept?

The old filter was removed because the new query-string filtering already
replaces its purpose. The old filter URL is still supported through a redirect.
The empty update and destroy methods were kept because they are unfinished
controller methods that can be used in later activities.

## LA7 - Add Movie Form (JSON Storage)

Movies are saved in `storage/app/private/movies.json`. The file is created
automatically with the starting movies the first time the app runs.

### Q1. What is the difference between POST and GET, and what happens when you refresh after a POST?

GET is used to view a page, while POST is used to send form data. The movie form
uses POST because it sends a new movie to the controller. After saving, the
controller redirects to the movie list, so refreshing the page does not submit
the form again.

### Q2. What happens when validation fails, and why does the save code not run?

Laravel sends the user back to the form and shows the errors. The entered values
can be shown again using `old()`. The save code does not run because validation
did not pass, so an invalid movie is not written to the JSON file.

### Q3. Why does the success message appear once even though the layout is shown on every page?

The message is stored as a session flash message after a movie is saved. The
layout checks the session and shows it when it exists. After one request, the
flash message is removed, so it only appears once.

## How to Run

1. Open the project folder in the terminal.
2. Run `php artisan serve`.
3. Open `/movies` in the browser.
4. Click "Add Movie" to add a new movie.

## Author

Jeff Tud