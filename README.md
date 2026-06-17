# Tic Tac Toe Validator

A PHP validator that checks whether Tic Tac Toe board states can appear in a valid game sequence.

## Overview

A PHP validator that checks whether Tic Tac Toe board states can appear in a valid game sequence.

## Features

- Reads one or more 3x3 boards from standard input.
- Checks turn order and winning-line constraints.
- Includes PHPUnit coverage for validation scenarios.

## Tech Stack

- PHP
- Composer
- PHPUnit

## Project Structure

- `app/validator.php` - board validation logic and CLI runner
- `tests/validatorTest.php` - test coverage for board states

## Getting Started

Install dependencies and run tests:

```bash
composer install
vendor/bin/phpunit
```

Run the validator directly:

```bash
php app/validator.php
```

## Portfolio Notes

- Demonstrates rule validation and edge-case handling.
- Includes automated tests for a small domain model.

## Status

Portfolio-ready coding challenge solution.
