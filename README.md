# Jolt Docker Adminer

Source repository for the [joltdesign/adminer](repo) image.

A version of [Adminer Evo](adminer) set up for Jolt.

## Usage

Add the following to your docker-compose.yml.

```yml
services:
  # ...
  adminer:
    image: joltdesign/adminer
    ports:
      - 8081:8080
  # ...
```

We expose adminer as 8081 by convention.

## Building

Run `yarn install` the first time you clone the repo.

To build a new version of this image, make your changes in `build/src` then run `yarn deploy`. Your Docker Hub account must be added as a collaborator on the [Docker Hub repo](repo) to be able to deploy the changes and you must have run `docker login` first.

[adminer]: https://github.com/adminerevo/adminerevo/
[repo]: https://hub.docker.com/r/joltdesign/adminer
