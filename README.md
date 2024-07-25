<a id="readme-top"></a>

<div align="center">

![Laravel](https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/100px-Laravel.svg.png)

</div>

<h1 align="center">RegistroMJRV</h1>

<div align="center">

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Tailwind](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![AlpineJS](https://img.shields.io/badge/Alpine%20JS-8BC0D0?style=for-the-badge&logo=alpinedotjs&logoColor=black)
![NodeJS](https://img.shields.io/badge/Node%20js-339933?style=for-the-badge&logo=nodedotjs&logoColor=white)
![Vite](https://img.shields.io/badge/Vite-B73BFE?style=for-the-badge&logo=vite&logoColor=FFD62E)

Laravel app to manage member registration for Ecuador's 2024 Elections.

</div>

![Register](https://i.ibb.co/8mXsz3S/Registro-MJRV.webp)


## Table of Contents

  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
        <li><a href="#imports">Imports</a></li>
      </ul>
    </li>
    <li><a href="#license">License</a></li>
  </ol>


## About The Project

RegistroMJRV is a Laravel-based application designed for managing the registration of members of the voting reception board for the Referendum and Popular Consultation 2024 in the province of Santo Domingo de los Tsachilas, which took place on Sunday, April 21, 2024.

The application facilitates the bulk loading of member data from an Excel file, which includes more than 8,600 individuals. Additionally, it allows the creation of user accounts from another Excel file, enabling registered users to verify the attendance of these members on the election day.

This streamlined process ensures accurate tracking and accountability for the electoral event, contributing to the integrity of the voting process.

> For privacy reasons I will not provide more screenshots. 😇

<p align="right"><a href="#readme-top">Back to top ⬆️</a></p>


## Getting Started

### Prerequisites

- **Laravel 10**
- **Composer**
- **NodeJS**

### Installation

1. Clone this repo to your computer:
   ```sh
   git clone git@github.com:MarcosKlender/RegistroMJRV.git
   ```
2. Install dependencies with:
   ```sh
   cd RegistroMJRV
   composer install
   npm install
   ```
3. Use this to create your own `.env` file:
   ```sh
   cp .env.example .env
   ```
4. Update the `.env` file with your database credentials and run:
   ```sh
   php artisan migrate --seed
   php artisan key:generate
   ```
5. Launch both local servers and start using the app:
   ```sh
   php artisan serve
   npm run dev
   ```

<p align="right"><a href="#readme-top">Back to top ⬆️</a></p>

### Imports

Make sure that your Excel files have the following columns with their exact names:

**MJRV**

- provincia
- canton
- parroquia
- zona
- recinto
- institucion
- junta
- sexo
- cedula
- nombre
- celular

**Users**

- name
- email
- username
- phone
- location


## License

Distributed under the MIT License.

<p align="right"><a href="#readme-top">Back to top ⬆️</a></p>
