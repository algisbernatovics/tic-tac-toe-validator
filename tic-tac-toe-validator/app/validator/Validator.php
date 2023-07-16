<?php

class Validator
{
    private const PLAYER_X = 'x';
    private const PLAYER_O = 'o';
    private const EMPTY_CELL = '.';
    private array $imitationGrid;
    private array $testGridCopy;
    private int $totalWinLines;

    public function __construct()
    {
        $this->imitationGrid = array_fill(0, 9, self::EMPTY_CELL);
        $this->testGridCopy = [];
        $this->totalWinLines = 0;
    }

    private function doTurns(): void
    {
        $xCount = 0;
        $oCount = 0;

        while (true) {
            $xIndex = array_search(self::PLAYER_X, $this->testGridCopy);
            if ($xIndex !== false) {
                $this->makeMove($xIndex, self::PLAYER_X);
                if ($this->totalWinLines > 1) {
                    $this->undoMove($xIndex, self::PLAYER_X);
                    break;
                }
                $xCount++;
            } else {
                break;
            }

            $oIndex = array_search(self::PLAYER_O, $this->testGridCopy);
            if ($oIndex !== false && $oCount < $xCount) {
                $this->makeMove($oIndex, self::PLAYER_O);
                if ($this->totalWinLines > 1) {
                    $this->undoMove($oIndex, self::PLAYER_O);
                    break;
                }
                $oCount++;
            } else {
                break;
            }
        }
    }

    private function makeMove(int $index, string $player): void
    {
        $this->imitationGrid[$index] = $player;
        $this->testGridCopy[$index] = self::EMPTY_CELL;
        $this->checkWinningLines(self::PLAYER_X);
        $this->checkWinningLines(self::PLAYER_O);
    }

    private function undoMove(int $index, string $player): void
    {
        $this->imitationGrid[$index] = self::EMPTY_CELL;
        $this->testGridCopy[$index] = $player;
    }

    private function checkWinningLines(string $player): void
    {
        $winningLines = [
            [0, 1, 2], [3, 4, 5], [6, 7, 8], // Horizontal lines
            [0, 3, 6], [1, 4, 7], [2, 5, 8], // Vertical lines
            [0, 4, 8], [2, 4, 6]             // Diagonal lines
        ];

        foreach ($winningLines as $line) {
            $values = array_intersect_key($this->imitationGrid, array_flip($line));
            $uniqueValues = array_unique($values);
            if (count($uniqueValues) === 1 && current($uniqueValues) == $player) {
                $this->totalWinLines++;
            }
        }
    }

    private function checkXWinTwice(string $player, array $testGrid): int
    {
        $count = 0;
        $winningLines = [
            [0, 4, 8, 2, 6],                                                    // X
            [0, 1, 2, 5, 8], [2, 5, 8, 7, 6], [8, 7, 6, 3, 0], [6, 3, 0, 1, 2], // L
            [1, 3, 4, 5, 7],                                                    // +
            [6, 4, 2, 5, 8], [6, 3, 0, 4, 8], [0, 3, 6, 4, 2], [2, 5, 8, 4, 0], // V Left,Right
            [8, 7, 6, 4, 2], [6, 7, 8, 4, 0], [0, 1, 2, 4, 6], [2, 1, 0, 4, 8], // V Top,Bottom
        ];

        foreach ($winningLines as $line) {
            $values = array_intersect_key($testGrid, array_flip($line));
            $uniqueValues = array_unique($values);
            if (count($uniqueValues) === 1 && current($uniqueValues) == $player) {
                $count++;
            }
        }
        return $count;
    }

    public function getValidatorAnswer(array $testGrid): string
    {
        $counts = array_count_values($testGrid);
        $this->testGridCopy = $testGrid;
        $this->doTurns();

        if ($this->checkXWinTwice(self::PLAYER_X, $testGrid) === 1 && $counts[self::PLAYER_O] === 4) {
            return 'yes';
        } elseif ($this->imitationGrid === $testGrid) {
            return 'yes';
        }
        return 'no';
    }
}

$N = intval(fgets(STDIN));
$testGrids = [];

for ($i = 0; $i < $N; $i++) {
    $grid = [];
    for ($j = 0; $j < 3; $j++) {
        $grid = array_merge($grid, str_split(strtolower(trim(fgets(STDIN)))));
    }
    fgets(STDIN);
    $testGrids[] = $grid;
}

foreach ($testGrids as $grid) {
    $validator = new Validator();
    echo $validator->getValidatorAnswer($grid) . PHP_EOL;
}

