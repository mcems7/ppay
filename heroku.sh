
mv ./.gitignore ./.gitignore2
git init
git config --global user.name "Manuel Cerón"
git config --global user.email mcems7@gmail.com
heroku git:remote -a ppay-mcems7
git add .
git commit -am "make it better"
git push -f heroku master
mv ./.gitignore2 ./.gitignore