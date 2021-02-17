<p align="center">
    <h1 align="center">Reward Gateway interview exercise <br/> developed with Yii 2</h1>
</p>

## Used technologies
<a href="https://github.com/yiisoft" target="_blank">
        <img src="https://fiverr-res.cloudinary.com/images/t_main1,q_auto,f_auto,q_auto,f_auto/gigs/98057151/original/cd8b2e08e7e942a2d00845ee398c525f13cdc0e9/develop-website-using-yii-yii2-and-also-fix-issues.png" height="100px">
</a>
<a href="https://laravel.com/docs/8.x/homestead" target="_blank">
        <img src="https://chrisloftus.github.io/public/img/laravel.png" height="100px">
</a>
<br/>
<a href="https://www.virtualbox.org/" target="_blank">
        <img src="https://upload.wikimedia.org/wikipedia/commons/d/d5/Virtualbox_logo.png" height="100px">
</a>
<a href="https://www.vagrantup.com/intro" target="_blank">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/87/Vagrant.png/738px-Vagrant.png" height="100px">
</a>

## Installation using Laravel Homestead
* Assumed local environment: https://github.com/vesoch/reward-gateway-interview-exercise
* Clone the repository
* Configure your Homestead.yaml file like the example below:
    ```
    folders:
        - map: D:\VMs\homestead\code
          to: /home/vagrant/code
    
    sites:
        - map: reward-gateway-backend.test
          to: /home/vagrant/code/reward-gateway-exercise/backend/web
  
    databases:
        - rewardgateway
    ```
* Run `composer install` via SSH in the VM
* Run `./init` via SSH in the VM and follow the steps for the environment you want to initialize
* Map your server for the backend to the `backend/web` directory
* Run the migrations from the console: `src/yii migrate`
* Go through all the config directories and fill out the `-local.php` files

## Assignment
As a software engineer at Reward Gateway you will be delivering an amazing and creative Employee Engagement platform that is used by thousands of employees every day. Reward Gateway works with over 1,800 companies worldwide and has many touch points with third party systems.
A critical part of the platform are the integrations with these third parties and making everything appear simple using APIs. Not every API we work with is as straightforward as we would like it to be and, whilst we don’t like writing bad code, we’ve intentionally written an API to simulate the quirks we deal with on a daily basis.

You can access the API using the following details:
<br/>URL: https://hiring.rewardgateway.net
<br/>Auth type: Basic
<br/>Username: hard
<br/>Password: hard
<br/>Documentation: https://hiring.rewardgateway.net/docs

You will see from the documentation that there is only one API endpoint that you will need to integrate with. Keep in mind that the API uses Basic access authentication with the credentials listed above.
The API is designed to randomly fail. Be prepared to handle these cases.

WHAT ARE THE CRITERIA NECESSARY?
<br/>Your task is to consume the data this API generates and output it as a list of employees. This list should show the employee's photo, name, bio and company like LinkedIn does (Google "LinkedIn search" if you're not sure.) Don't worry too much about having it look 100% the same - it is the PHP we are interested in.

## About the framework
Yii 2 Advanced Project Template is a skeleton [Yii 2](http://www.yiiframework.com/) application best for
developing complex Web applications with multiple tiers.

The template includes two tiers: back end, and console, each of which
is a separate Yii application.

The template is designed to work in a team development environment. It supports
deploying the application in different environments.

Documentation is at [docs/guide/README.md](docs/guide/README.md).

[![Latest Stable Version](https://img.shields.io/packagist/v/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![Total Downloads](https://img.shields.io/packagist/dt/yiisoft/yii2-app-advanced.svg)](https://packagist.org/packages/yiisoft/yii2-app-advanced)
[![build](https://github.com/yiisoft/yii2-app-advanced/workflows/build/badge.svg)](https://github.com/yiisoft/yii2-app-advanced/actions?query=workflow%3Abuild)

DIRECTORY STRUCTURE
-------------------
```
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    services/            contains service classes to assisst the backoffice logic  
    tests/               contains tests for backend application
    views/               contains view files for the Web application
    web/                 contains the index.php file and various assets (css,js,images)
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
