# Installation

  - Clone the project
  - Run `(cd docker && docker-compose up --build -d)` (You need to have Docker running)
  - Run `composer install && npm install && npm run dev`
  
Add database
  - Run `docker exec -ti docker_php_1 bash`
  - Inside the container run : `php bin/console doctrine:migrations:migrate`
  - To load fixtures : `php bin/console doctrine:fixtures:load --append`
