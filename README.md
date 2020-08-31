# Authentication app

## Task 1:

The exercise is to write a program which is adding name property into each leaf of given tree
structure from tree.json file with name from list.json file. You should correlate
structures through category_id from list.json and Id in tree.json.

The output should be similar to:
[
…
{“id”:19”, “name”:”Zdrowie i uroda”,”children”:[]},
...
]

Things to consider in your implementation
- Tree nesting level - in some cases nesting level could be really deep
- Testability

## Task 2:

The exercise is to write a Symfony application. Read user stories below and try to implement
them. Your goal is to deliver working example application. Don’t spend too much time on
implementation, focus on functionalities and try to make your implementation as simple as
possible.

### User Story 1:
As a user, I want to see an option to either sign in or sign up,
so I can access application with my account
Acceptance criteria:
- User should see sign in screen with input data fields for 1)
Username 2) Password
- User should see an option to Sign-up if they don't have an
account created - clicking on this option will route user to the
Sign-in screen
- User with disabled account should not sign in
- Signed in User should be redirect to restricted part of
application
- Signed in User should see logout option

### User Story 2:
As a signed in User, I want to see paginated list of all
application users, where I can disable each application account.
Acceptance criteria
- User should see paginated list with maximum 10 rows with
columns 1) username and 2) action
- User should see disable button which is active for enabled
users, and disabled for disabled users.
- User should be able to paginate over the list.
Things to consider in your implementation:
- Maybe you will need provide some example data, to be able to present working
application
- Think about User Experience. Maybe is there out of the box solution.
- Remember about “golden rules” of programming

## Steps to setup
- composer install
- configure db connection in .env file f.e.:
DATABASE_URL=mysql://root:root@127.0.0.1:3306/authentication?serverVersion=mariadb-10.4.10
- php bin/console doctrine:database:create
- php bin/console doctrine:schema:update --force
- php bin/console doctrine:fixtures:load

For task 1 go to: localhost/update-tree

For task 2 go to: localhost/login

## Screenshots

<p align="center">
    <a href="https://i.imgur.com/loY4gme.png"><img src="https://i.imgur.com/loY4gme.png" alt="image" border="0" /></a>
</p>

<p align="center">
    <a href="https://i.imgur.com/vbmLAsV.png"><img src="https://i.imgur.com/vbmLAsV.png" alt="image" border="0" /></a>
</p>

<p align="center">
    <a href="https://i.imgur.com/YRYELNT.png"><img src="https://i.imgur.com/YRYELNT.png" alt="image" border="0" /></a>
</p>

<p align="center">
    <a href="https://i.imgur.com/z31ZcOC.png"><img src="https://i.imgur.com/z31ZcOC.png" alt="image" border="0" /></a>
</p>
