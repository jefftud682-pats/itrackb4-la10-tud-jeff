# ITRACKB4 LA6 - Video Game Filters

## Q1. Why was there no need to create another route for the second filter?

The two filters are part of the same game list, so they can use the existing games index route. The router only checks the path and does not use the query string to match a route. Because of this, genre and developer can be added after the question mark. Both filters can also be placed in the same URL.

## Q2. If both filters were route parameters, what would the URL for one genre only look like?

If the genre was a route parameter, the URL could be `/games/RPG`. The value RPG would become part of the path that the router matches. This would make filtering less flexible when another filter needs to be added.

## Q3. Which navigation pattern needed to change for the detail page?

The navigation pattern needed to include the game detail path, so the games link can still be active on `/games/1`. The filter page did not need a different pattern because the query string is not part of the path. The same `/games` path is used even when a filter is added.

## Q4. Why was the old filter removed while the empty methods were kept?

The old filter was removed because the new query-string filtering already replaces its purpose. The old filter URL is still supported through a redirect, so users can reach the new URL. The empty store and update methods were kept because they are unfinished controller methods that can be used in later activities.