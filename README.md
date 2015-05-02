## Lumen API

[![Join the chat at https://gitter.im/Tjoosten/Lumen-2](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/Tjoosten/Lumen-2?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)
[![Build Status](https://travis-ci.org/Tjoosten/Lumen-2.svg?branch=master)](https://travis-ci.org/Tjoosten/Lumen-2)
[![devDependency Status](https://img.shields.io/david/dev/Tjoosten/lumen-2.svg?style=flat)](https://david-dm.org/Tjoosten/lumen-2#info=devDependencies)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/13d9c0fa-d01e-452c-88dd-b95a8debe9a3/mini.png)](https://insight.sensiolabs.com/projects/13d9c0fa-d01e-452c-88dd-b95a8debe9a3)

Lumen API is een gebouwd op het Lumen framework van laravel.

## Installation

1. Copy the `.env.example` to `.env` and edit the configuration.
2. Run `sudo composer install`. 
3. Run `php artisan migrate`
4. And your done.

## Costum artisan commands.

The API has its own cli commands, the costum commands are:

| Command:      | Description:                                                             |
| :------------ | :----------------------------------------------------------------------- |
| `api:count`   | Display and count all the database records related to the api.           |
| `api:newUser` | Create a new user for the API.                                           |

You can simple run these commands with: `php artisan <command>`

### License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
