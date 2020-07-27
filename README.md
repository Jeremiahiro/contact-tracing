#### TASK LIST 

Auth Folder
- *Register Window*
- *Login*
- *confirm email*
- *confirm password*
- *reset password*

Homepage Folder
- *Index* <br/>
Homepage/Splash
- *Splash Screen -1*
- *Splash Screen -2*
- *Splash Screen -3*

Activity Folder
- *Index = View all Activity*
- *Create = Add Activity* <br/>
Activity/Modal Folder
- *ActivtiySelection = Activity Selection Modal *
- *NetworkActivity = Network Activity Modal*
- *proximity = Proximity Alert Modal*

Search Folder
- *index = search page*

Profile Page
- *index = Users Profile*
- *show = Users Public Profile*
- *edit = Edit Users Profile*

This will be updated as we progress


#### PERSONS ON PROJECT
> Daniel Eche (danieleche7@gmail.com) - NielEche<br/>
> Jeremiah Iro (jeremiahiro@gmail.com) - @jeremiahiro

####  USAGE GUIDE / INSTALLATION
- Step 1: Click on Fork at the top right corner
- Step 2: Clone your forked repository
- Step 3: cd into the cloned folded | `cd contact-tracing`
- Step 4: add upstream | `git remote add upstream https://github.com/Jeremiahiro/contact-tracing.git`
- Step 5: git pull upstream development
- Step 6: Check out to the task branch | `git checkout -b <BRANCH-NAME>`


#### RUNNING THE PROJECT LOCALLY
- Step 1: cd into the cloned folded | cd contact-tracing
- Step 2: copy .env.example to .env | On terminal `cp .env.example .env`
- Step 3: `php artisan key:generate`
- Step 4: `composer install`
- Step 5: `npm install`
- Step 4: `php artisan server`
- Then go to http://127.0.0.1:8000

#### CREATING A PULL REQUEST
- Step 1: Run: `git add .`
- Step 2: Run: `git commit -m "<YOUR-COMMIT-MESSAGE>"`
- Step 3: rRun: `git push origin <BRANCH-NAME>`
- Go to the repository https://github.com/Jeremiahiro/contact-tracing.git
- As soon as you get there, you are going to see a green ‘compare and create a pull request’
- Click on it, and type your message, be specific about the task done click on create pull request.

#### USEFUL RESOURCE
https://www.youtube.com/watch?v=HbSjyU2vf6Y

https://akrabat.com/the-beginners-guide-to-contributing-to-a-github-project/

You can access larave [documentation](https://laravel.com/docs)

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. 

