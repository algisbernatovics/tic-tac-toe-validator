# Tic Tac Toe Validator

A PHP validator that checks whether Tic Tac Toe board states can appear in a valid game sequence.

## Learning Goal

Practice domain-rule validation, turn-order checks, win-line detection, and automated tests around tricky board states.

## Features

- Reads one or more 3x3 boards from standard input.
- Checks player counts, turn simulation, and winning-line constraints.
- Includes PHPUnit tests for validation scenarios.

## Complexity

- Time: `O(1)` per board because the board is always 3x3.
- Space: `O(1)` per board.

## Example

```text
Input
1
xox
o.x
..x

Output
yes
```

## Tech Stack

- PHP
- Composer
- PHPUnit

## Run

```bash
composer install
vendor/bin/phpunit
php app/validator.php
```

## Project Structure

- `app/validator.php` - board validation logic and CLI runner
- `tests/validatorTest.php` - validation tests

## License

MIT License. See [LICENSE](./LICENSE).
