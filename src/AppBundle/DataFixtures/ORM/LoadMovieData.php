<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Movie;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadMovieData
 * @package AppBundle\DataFixtures\ORM
 */
class LoadMovieData extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $json = <<<JSON
{
  "1927": {
    "title": "Wings",
    "imdbId": "tt0018578",
    "releaseDate": "1927-05-19T05:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1927,
    "releaseMonth": 4,
    "releaseDay": 19
  },
  "1929": {
    "title": "The Broadway Melody",
    "imdbId": "tt0019729",
    "releaseDate": "1929-02-01T05:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1929,
    "releaseMonth": 1,
    "releaseDay": 1
  },
  "1930": {
    "title": "All Quiet on the Western Front",
    "imdbId": "tt0020629",
    "releaseDate": "1930-04-21T04:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1930,
    "releaseMonth": 3,
    "releaseDay": 21
  },
  "1931": {
    "title": "Cimarron",
    "imdbId": "tt0021746",
    "releaseDate": "1931-01-26T05:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1931,
    "releaseMonth": 0,
    "releaseDay": 26
  },
  "1932": {
    "title": "Grand Hotel",
    "imdbId": "tt0022958",
    "releaseDate": "1932-04-12T04:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1932,
    "releaseMonth": 3,
    "releaseDay": 12
  },
  "1933": {
    "title": "Cavalcade",
    "imdbId": "tt0023876",
    "releaseDate": "1933-01-05T05:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1933,
    "releaseMonth": 0,
    "releaseDay": 5
  },
  "1934": {
    "title": "It Happened One Night",
    "imdbId": "tt0025316",
    "releaseDate": "1934-02-22T05:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1934,
    "releaseMonth": 1,
    "releaseDay": 22
  },
  "1935": {
    "title": "Mutiny on the Bounty",
    "imdbId": "tt0026752",
    "releaseDate": "1935-11-08T05:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1935,
    "releaseMonth": 10,
    "releaseDay": 8
  },
  "1936": {
    "title": "The Great Ziegfeld",
    "imdbId": "tt0027698",
    "releaseDate": "1936-03-22T04:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1936,
    "releaseMonth": 2,
    "releaseDay": 22
  },
  "1937": {
    "title": "The Life of Emile Zola",
    "imdbId": "tt0029146",
    "releaseDate": "1937-08-11T04:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1937,
    "releaseMonth": 7,
    "releaseDay": 11
  },
  "1938": {
    "title": "You Can't Take It with You",
    "imdbId": "tt0030993",
    "releaseDate": "1938-08-23T04:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1938,
    "releaseMonth": 7,
    "releaseDay": 23
  },
  "1939": {
    "title": "Gone with the Wind",
    "imdbId": "tt0031381",
    "releaseDate": "1939-12-28T05:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1939,
    "releaseMonth": 11,
    "releaseDay": 28
  },
  "1940": {
    "title": "Rebecca",
    "imdbId": "tt0032976",
    "releaseDate": "1940-03-27T04:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1940,
    "releaseMonth": 2,
    "releaseDay": 27
  },
  "1941": {
    "title": "How Green Was My Valley",
    "imdbId": "tt0033729",
    "releaseDate": "1941-10-28T05:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1941,
    "releaseMonth": 9,
    "releaseDay": 28
  },
  "1942": {
    "title": "Mrs. Miniver",
    "imdbId": "tt0035093",
    "releaseDate": "1942-07-22T04:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1942,
    "releaseMonth": 6,
    "releaseDay": 22
  },
  "1943": {
    "title": "Casablanca",
    "imdbId": "tt0034583",
    "releaseDate": "1942-11-26T05:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1942,
    "releaseMonth": 10,
    "releaseDay": 26
  },
  "1944": {
    "title": "Going My Way",
    "imdbId": "tt0036872",
    "releaseDate": "1944-08-16T04:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1944,
    "releaseMonth": 7,
    "releaseDay": 16
  },
  "1945": {
    "title": "The Lost Weekend",
    "imdbId": "tt0037884",
    "releaseDate": "1945-11-29T05:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1945,
    "releaseMonth": 10,
    "releaseDay": 29
  },
  "1946": {
    "title": "The Best Years of Our Lives",
    "imdbId": "tt0036868",
    "releaseDate": "1946-12-25T05:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1946,
    "releaseMonth": 11,
    "releaseDay": 25
  },
  "1947": {
    "title": "Gentleman's Agreement",
    "imdbId": "tt0039416",
    "releaseDate": "1947-11-11T05:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1947,
    "releaseMonth": 10,
    "releaseDay": 11
  },
  "1948": {
    "title": "Hamlet",
    "imdbId": "tt0040416",
    "releaseDate": "1948-10-27T04:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1948,
    "releaseMonth": 9,
    "releaseDay": 27
  },
  "1949": {
    "title": "All the Kings Men",
    "imdbId": "tt0041113",
    "releaseDate": "1949-11-08T05:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1949,
    "releaseMonth": 10,
    "releaseDay": 8
  },
  "1950": {
    "title": "All About Eve",
    "imdbId": "tt0042192",
    "releaseDate": "1950-10-13T04:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1950,
    "releaseMonth": 9,
    "releaseDay": 13
  },
  "1951": {
    "title": "An American in Paris",
    "imdbId": "tt0043278",
    "releaseDate": "1951-10-04T04:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1951,
    "releaseMonth": 9,
    "releaseDay": 4
  },
  "1952": {
    "title": "The Greatest Show on Earth",
    "imdbId": "tt0044672",
    "releaseDate": "1952-01-10T05:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1952,
    "releaseMonth": 0,
    "releaseDay": 10
  },
  "1953": {
    "title": "From Here to Eternity",
    "imdbId": "tt0045793",
    "releaseDate": "1953-09-30T04:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1953,
    "releaseMonth": 8,
    "releaseDay": 30
  },
  "1954": {
    "title": "On the Waterfront",
    "imdbId": "tt0047296",
    "releaseDate": "1954-07-28T04:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1954,
    "releaseMonth": 6,
    "releaseDay": 28
  },
  "1955": {
    "title": "Marty",
    "imdbId": "tt0048356",
    "releaseDate": "1955-07-15T04:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1955,
    "releaseMonth": 6,
    "releaseDay": 15
  },
  "1956": {
    "title": "Around the World in 80 Days",
    "imdbId": "tt0048960",
    "releaseDate": "1956-12-22T05:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1956,
    "releaseMonth": 11,
    "releaseDay": 22
  },
  "1957": {
    "title": "The Bridge on the River Kwai",
    "imdbId": "tt0050212",
    "releaseDate": "1957-12-19T05:00:00.000Z",
    "releaseCountry": "USA",
    "releaseYear": 1957,
    "releaseMonth": 11,
    "releaseDay": 19
  }
}
JSON;
        $data = json_decode($json);

        foreach ($data as $row) {
            $movie = (new Movie())
                ->setName($row->title)
            ;

            $manager->persist($movie);
        }

        $manager->flush();
    }
}
