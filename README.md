[![Known Vulnerabilities](https://snyk.io/test/github/CatFishTeam/Wooy-chat/badge.svg?targetFile=package.json)](https://snyk.io/test/github/CatFishTeam/Wooy-chat?targetFile=package.json)

# Installation

  - Clone the project
  - Run `(cd docker && docker-compose up --build -d)` (You need to have Docker running)
  - Run `composer install && npm install && npm run dev`
  
Add database
  - Run `docker exec -ti docker_php_1 bash`
  - Inside the container run : `php bin/console doctrine:migrations:migrate`
  - To load fixtures : `php bin/console doctrine:fixtures:load --append`

# Connect as admin
  - If you've runned the fixtures you can login with `admin:admin` and access `/admin`
  - If this is not the case and you just want to use your user : you can run from the container : `fos:user:promote <your_pseudo> ROLE_ADMIN` 