# MovieSuggestions
- project work for project course PWP (Programmable Web Project)

## Server - contains back-end code
For setting up the server and the database, please navigate to [Server/README.md](https://github.com/mayonez89/MovieSuggestions/blob/main/Server/README.md)

For the purposes of project grading, the project API has been deployed to the AWS based server on 18.196.196.249

<small>The homepage of 18.196.196.249 is set only for internal testing, hence it can be completely disregarded;
the useful endpoints are defined under the [Wiki pages](https://github.com/mayonez89/MovieSuggestions/wiki).
</small>
## movie-suggester-ui - contains front-end code
For setting up the UI please go through [UI README.md](https://github.com/mayonez89/MovieSuggestions/blob/main/movie-suggester-ui/README.md)

### Click here to see the <a href="http://18.196.196.249/api/documentation" target="_blank">documentation</a>

### Project flow description:
With high enthusiasm, the team of 3 members begun planning the course work as a web project used for suggesting
content (movies) to users, based on their profiles and actions (such as setting favorites, likes, comments, ratings, etc.)
Basically, a recommendation system.

During the project development, the team was reduced to only 2 members, and due to 
the course-passing requirements, the project has re-oriented into a movie browsing web project.

## Hypermedia
The communication interface between the API and the client app is [Siren](https://github.com/kevinswiber/siren). 
For Siren hypermedia generation, an abstract helper was written, which heavily relies on the libraries of [jefersondaniel/siren-php](https://github.com/jefersondaniel/sirenphp). This dependency will be automatically installed with all the others.

## Testing - 404
Due to the team member-shortage, no tests been implemented.