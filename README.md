# WordPress plugin development boilerplate

## Start local WordPress via Docker
```sh
make wp-start
```

## Stop local WordPress via Docker
```sh
make wp-stop
```

## Build plugin
```sh
make
```

## Github workflow

* Ensure that workflow can access the GITHUB_TOKEN secret to create releases: Repository settings -> Actions -> General -> Workflow permission -> select "Read and write permissions".
