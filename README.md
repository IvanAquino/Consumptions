# Consumptions

## Introduction
Consumptions is a Laravel-based web application designed to efficiently manage vehicle details, including mileage, gas consumption, and associated costs. Utilizing the robust features of Laravel 8.2 and the aesthetic flexibility of Tailwind CSS, this application offers a user-friendly interface powered by Jetstream.

## Features
- Track and manage vehicle details
- Monitor mileage and gas consumption
- Analyze cost efficiency of vehicles
- Intuitive user interface with responsive design

<iframe width="560" height="315" src="https://www.youtube.com/embed/DMy1cSQZJHk?si=NHQRiaxSsz-S51L9" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

## Installation Instructions

### Prerequisites
- PHP 8.2
- Composer
- Node.js and npm, yarn, pnpm or bun

### Setting Up

1. Clone the repository:

```bash
   git clone git@github.com:IvanAquino/consumptions.git
```

2. Navigate to the project directory:

```bash
cd consumptions
```

3. Copy .env.example to create a .env file:

```bash
cp .env.example .env
```

4. Generate an application key:

```bash
php artisan key:generate
```

5. Set up your database in the .env file, then run migrations:

```bash
php artisan migrate
```


6. Install NPM packages and run in dev mode:

```bash
# NPM
npm install
# YARN
yarn
# BUN
bun install

npm run dev
yarn dev
bun run dev
```

7. Build assets

```bash
npm run build
yarn build
bun run build
```

## Roadmap

- [x] Vehicles
- [x] Consumptions
- [ ] Images
- [ ] Export reports

## Usage
After installation, access the application through your web browser to start managing your vehicle data.

## Contributing
Contributions to the Consumptions project are welcome. Please ensure to follow the standard coding conventions and submit pull requests for review.
