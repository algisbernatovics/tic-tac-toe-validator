## To launch unit tests.

- composer install
- vendor/bin/phpunit tests/validatorTest.php
- enter

## Tic-Tac-Toe Validator

This is a PHP class that validates Tic-Tac-Toe game grids. It checks if the given grid represents a valid game state based on specific conditions.

## Features

- Validates Tic-Tac-Toe game grids.
- Determines if the grid represents a valid game state.
- Checks for winning conditions.
- Handles special cases where 'x' wins twice.

## Usage

1. Instantiate the `Validator` class.
2. Call the `getValidatorAnswer` method, passing in the Tic-Tac-Toe game grid as an array.
3. The method returns a string value: `'yes'` if the grid is valid, and `'no'` otherwise.

```php

$validator = new Validator();
$grid = [
    'x', 'o', 'x',
    'o', 'x', 'o',
    'x', 'o', 'x'
];
$result = $validator->getValidatorAnswer($grid);
echo $result; // Outputs: 'yes' or 'no'


