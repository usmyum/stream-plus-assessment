# StreamPlus Assessment Web Application

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Getting Started](#getting-started)
- [Usage/Setup](#usage)
    
## Introduction

This is a multi-step onboarding form developed using Laravel. It allows users to fill out their information in a
structured manner, improving the overall user experience. The form collects user information, address details, and
payment information (if applicable) in a step-by-step format.

## Features

- **User Information Collection**: Collects name, email, and phone number.
- **Address Information**: Gathers the user's address details across multiple fields.
- **Conditional Payment Step**: Displays payment information fields based on the selected subscription type.
- **Real-time Validation**: Validates input fields on blur events, providing immediate feedback.
- **Error Handling**: Displays error messages and highlights invalid fields.
- **Responsive Design**: Works well on both desktop and mobile devices.

## Getting Started

### Prerequisites

- Download & install Docker on for your machine

### Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/usmyum/stream-plus
   cd stream-plus
   ```

Copy the env file as:

   ```bash
   cp .env.example .env
   ```

2. Docker Setup

### Setting Up with Docker

Lets build the project first

   ```bash
   docker-compose build --no-cache
   ```

   ```bash
   docker-compose up -d
   ```

### Usage

3. Run the command to list docker containers

   ```bash
   docker ps
   ```

You can see all the running containers in here

Run the laravel container named, 'streamplus-app' as follows:

   ```bash
   docker exec -it streamplus-app bash
   ```

Run composer installation

   ```bash
   composer install
   ```

Run the migrations with the command

   ```bash
   php artisan migrate
   ```

Run key generation

   ```bash
   php artisan key:generate
   ```

Clear the caches:

   ```bash
   php artisan cache:clear
   php artisan config:cache
   composer dumpautoload
   ```


### Known Issues that could occur

If you come across any failure in generating key, like key is generated but error still persists, trying considering the
following:

   ```bash
   docker-compose down
   docker-compose up
   ```

If you come across any failure in migrations or testing, please consider changing the DB_HOST value in the .env

   ```bash
   DB_HOST=mysql OR DB_HOST=127.0.0.1 or localhost
   ```

## Endpoints

- **GET** `/`
  a welcome screen of laravel
- **GET** `/register`
  register form for the user subscription

