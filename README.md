

# Apple Music APIs

## Storefronts

```php
// Fetch a single storefront using its identifier.
$storefronts = $client->storefronts()->get(':id');

// Fetch multiple storefronts.
$storefronts = $client->storefronts()->get([':id', ':id', ':id']);

// Fetch all the storefronts in alphabetical order.
$storefronts = $client->storefronts()->all(':limit', ':offset');
```

## Albums

```php
// Fetch an album using its identifier.
$albums = $client->albums()->get(':id', ':include');

// Fetch one or more albums using their identifiers.
$albums = $client->albums()->get([':id', ':id', ':id'], ':include');
```

## Music Videos

```php
// Fetch a music video using its identifier.
$musicVideos = $client->musicVideos()->get(':id', ':include');

// Fetch one or more music videos using their identifiers.
$musicVideos = $client->musicVideos()->get([':id', ':id', ':id'], ':include');
```

## Playlists

```php
// Fetch a playlist using its identifier.
$playlists = $client->playlists()->get(':id', ':include');

// Fetch one or more playlists using their identifiers.
$playlists = $client->playlists()->get([':id', ':id', ':id'], ':include');
```

## Songs

```php
// Fetch a song using its identifier.
$songs = $client->songs()->get(':id', ':include');

// Fetch one or more songs using their identifiers.
$songs = $client->songs()->get([':id', ':id', ':id'], ':include');
```

## Stations

```php
// Fetch a station using its identifier.
$stations = $client->stations()->get(':id', ':include');

// Fetch one or more stations using their identifiers.
$stations = $client->stations()->get([':id', ':id', ':id'], ':include');
```

## Artists

```php
// Fetch an artist using its identifier.
$artists = $client->artists()->get(':id', ':include');

// Fetch one or more artists using their identifiers.
$artists = $client->artists()->get([':id', ':id', ':id'], ':include');
```

## Curators

```php
// Fetch a curator using its identifier.
$curators = $client->curators()->get(':id', ':include');

// Fetch one or more curators using their identifiers.
$curators = $client->curators()->get([':id', ':id', ':id'], ':include');
```

## Activities

```php
// Fetch an activity using its identifier.
$activities = $client->activities()->get(':id', ':include');

// Fetch one or more activities using their identifiers.
$activities = $client->activities()->get([':id', ':id', ':id'], ':include');
```

## Apple Curators

```php
// Fetch an Apple curator using its identifier.
$appleCurators = $client->appleCurators()->get(':id', ':include');

// Fetch one or more Apple curators using their identifiers.
$appleCurators = $client->appleCurators()->get([':id', ':id', ':id'], ':include');
```

## Charts

```php
// Fetch one or more charts.
$charts = $client->charts()->get(':types', ':chart', ':genre', ':limit', ':offset');
```

## Genres

```php
// Fetch all genres for the current top charts.
$genres = $client->genres()->top(':limit', ':offset');

// Fetch a genre using its identifier.
$genres = $client->genres()->get(':id');

// Fetch one or more genres.
$genres = $client->genres()->get([':id', ':id', ':id']);
```

## Search

```php
// Search the catalog using a query.
$search = $client->search()->query(':term', ':type', ':limit', ':offset');

// Fetch the search term results for a hint.
$searchHints = $client->search()->hints(':term', ':types', ':limit');
```