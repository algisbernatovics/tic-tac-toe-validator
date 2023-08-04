<?php
require __DIR__ . '/../app/validator.php';

use PHPUnit\Framework\TestCase;

class validatorTest extends TestCase
{
    protected validator $validator;

    protected function setUp(): void
    {
        $this->validator = new validator();
    }

    public function testEmpty()
    {
        $board =
            [
                '.', '.', '.',
                '.', '.', '.',
                '.', '.', '.',
            ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function testFilledWithO()
    {
        $board =
            [
                'o', 'o', 'o',
                'o', 'o', 'o',
                'o', 'o', 'o',
            ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testFilledWithX()
    {
        $board =
            [
                'x', 'x', 'x',
                'x', 'x', 'x',
                'x', 'x', 'x',
            ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testMultipleWinningLines1()
    {
        $board =
            [
                'x', 'x', 'x',
                '.', '.', '.',
                'o', 'o', 'o',
            ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testMultipleWinningLines2()
    {
        $board =
            [
                'x', '.', 'o',
                'x', '.', 'o',
                'x', '.', 'o',
            ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testMultipleWinningLines3()
    {
        $board =
            [
                'x', 'x', 'o',
                'x', 'x', 'o',
                'x', 'x', 'o',
            ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testMultipleWinningLines4()
    {
        $board =
            [
                'x', 'x', 'x',
                '.', '.', '.',
                'o', 'o', 'o',
            ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testCounts1()
    {
        $board =
            [
                'x', 'x', '.',
                'o', 'o', '.',
                'o', '.', '.',
            ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testCounts2()
    {
        $board =
            [
                'x', 'x', 'x',
                'o', 'o', 'o',
                'o', '.', '.',
            ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testCounts3()
    {
        $board =
            [
                'o', 'o', 'o',
                'o', 'x', 'x',
                'x', '.', '.',
            ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testCounts4()
    {
        $board =
            [
                'x', 'o', 'o',
                'o', 'o', 'o',
                'o', 'o', 'o',
            ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testCounts5()
    {
        $board =
            [
                'o', 'x', 'x',
                'x', 'x', 'x',
                'x', 'x', 'x',
            ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testOfirstOWin()
    {
        $board =
            [
                'o', 'o', 'o',
                'x', '.', 'x',
                '.', '.', 'x',
            ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function testOfirst()
    {
        $board =
            [
                'o', 'x', 'x',
                'o', '.', 'o',
                '.', 'x', 'x',
            ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function testXfirstXWin()
    {
        $board =
            [
                'x', 'x', 'x',
                'o', '.', 'o',
                '.', '.', 'o',
            ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testXfirst()
    {
        $board =
            [
                'x', 'o', 'o',
                'x', '.', 'x',
                '.', 'o', 'x',
            ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function testTie1()
    {
        $board =
            [
                'x', 'o', 'x',
                'x', 'o', 'x',
                'o', 'x', 'o',
            ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function testTie2()
    {
        $board = [
            'o', 'x', 'o',
            'x', 'o', 'x',
            'x', 'o', 'x',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function testInvalidGrid1()
    {
        $board = [
            'x', 'o', 'o', 'x',
            'o', 'x', 'x', 'o',
            'x', 'o', '.', 'x',
            'o', 'x', 'o', 'o',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testInvalidGrid2()
    {
        $board = [
            'o', 'o', 'o', 'o',
            'x', 'x', 'x', 'o',
            'x', 'o', '.', 'x',
            'o', 'x', 'o', 'o',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testInvalidGrid3()
    {
        $board = [
            '.', '.', '.', '.',
            '.', '.', '.', '.',
            '.', '.', '.', '.',
            '.', '.', '.', '.',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testInvalidGrid4()
    {
        $board = [
            'o', 'o', 'o', 'o',
            'o', 'o', 'o', 'o',
            'o', 'o', 'o', 'o',
            'o', 'o', 'o', 'o',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testInvalidGrid5()
    {
        $board = [
            'x', 'x', 'x', 'x',
            'x', 'x', 'x', 'x',
            'x', 'x', 'x', 'x',
            'x', 'x', 'x', 'x',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testUnconventionalWin()
    {
        $board = [
            'x', '.', 'o',
            'x', 'o', 'x',
            'o', 'x', '.',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testInvalidGridWin()
    {
        $board = [
            'o', '.', 'x', '.',
            'x', 'o', 'o', 'x',
            'x', 'o', 'o', '.',
            '.', 'x', 'o', 'o',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testIncompleteGrid1()
    {
        $board = [
            'x', 'o', '.',
            '.', 'o', '.',
            '.', 'x', '.',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function testIncompleteGrid2()
    {
        $board = [
            'x', 'o', 'x',
            '.', 'o', '.',
            'o', 'x', '.',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function testMixedSymbols1()
    {
        $board = [
            'x', 'o', 'o',
            'o', 'x', 'x',
            'o', 'x', 'o',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testMixedSymbols2()
    {
        $board = [
            'x', 'x', 'o',
            'o', 'o', 'x',
            'x', 'o', 'o',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testLargeGrid()
    {
        $board = [
            'x', 'o', 'x', 'o', 'x',
            'o', 'x', 'o', 'x', 'o',
            'o', 'x', 'o', 'x', 'o',
            'x', 'o', 'x', 'o', 'x',
            'o', 'x', 'o', 'x', 'o',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testXWinTwice1()
    {
        $board = [
            'x', 'o', 'x',
            'o', 'x', 'o',
            'x', 'o', 'x',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function testXWinTwice2()
    {
        $board = [
            'x', 'x', 'x',
            'o', 'o', 'x',
            'o', 'o', 'x',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function testXWinTwice3()
    {
        $board = [
            'o', 'o', 'x',
            'o', 'o', 'x',
            'x', 'x', 'x',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function testXWinTwice4()
    {
        $board = [
            'x', 'o', 'o',
            'x', 'o', 'o',
            'x', 'x', 'x',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function testXWinTwice5()
    {
        $board = [
            'x', 'x', 'x',
            'x', 'o', 'o',
            'x', 'o', 'o',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function testXWinTwice6()
    {
        $board = [
            'o', 'x', 'o',
            'x', 'x', 'x',
            'o', 'x', 'o',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function smallBoard()
    {
        $board = [
            'x', 'x',
            'x', 'x',
            'x', 'x',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testXWinTwice7()
    {
        $board = [
            'o', 'o', 'x',
            'o', 'x', 'x',
            'x', 'o', 'x',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function testXWinTwice8()
    {
        $board = [
            'x', 'o', 'x',
            'o', 'x', 'x',
            'o', 'o', 'x',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function testXWinTwice9()
    {
        $board = [
            'x', 'o', 'o',
            'x', 'x', 'o',
            'x', 'o', 'x',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function testXWinTwice10()
    {
        $board = [
            'x', 'o', 'x',
            'x', 'x', 'o',
            'x', 'o', 'o',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function testXWinTwice11()
    {
        $board = [
            'o', 'o', 'x',
            'o', 'x', 'o',
            'x', 'x', 'x',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function testXWinTwice12()
    {
        $board = [
            'x', 'o', 'o',
            'o', 'x', 'o',
            'x', 'x', 'x',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function testXWinTwice13()
    {
        $board = [
            'x', 'x', 'x',
            'o', 'x', 'o',
            'x', 'o', 'o',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function testXWinTwice14()
    {
        $board = [
            'x', 'x', 'x',
            'o', 'x', 'o',
            'o', 'o', 'x',
        ];
        $answer = $this->validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
}
