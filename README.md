# LA10 – Your Own Lookup Table
## Part G – Guide Questions

### 1. Which column did you convert into a separate lookup table, and why?

I converted the `genre` column into a separate `genres` lookup table. This avoids storing repeated genre names in the `movies` table and allows each movie to reference a genre using a foreign key, `genre_id`.

### 2. How many queries were displayed in Screenshot 6, and why?

Screenshot 6 displayed **7 queries**. The application executed one query to retrieve the movies, one query to retrieve the genre list, and additional queries to retrieve the genre of each movie because the relationship was not yet eager loaded.

### 3. What would happen if the relationship method in the Movie model were plural instead of singular?

If the relationship method were named `genres()` instead of `genre()`, calling `$item->genre` or `with('genre')` would fail because Laravel would not find a relationship with that name. The relationship method name used in the controller and Blade view must match the method defined in the model.

## Author

Jeff Tud