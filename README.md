

### we using SuperMemo 2 (SM2) algorithm

### vocab-system.postman_collection.json file exists in root(use it for import all endpoints in postman)

## before run  project
- check .env file 
- php artisan migrate
- php artisan db:seed --class=UserSeeder
- php artisan db:seed --class=WordSeeder
- php artisan server
## end points
- post https://localhost:8000/api/v1/tokens/create username:hshafiei374@gmail.com password:123456
- post https://localhost:8000/api/v1/exercise make a new exercise for current user
- post https://localhost:8000/api/v1/exercise/{exercise_id}/answer answer the exercise
- get  https://localhost:8000/api/v1/exercise/{exercise_id} show the exercise

