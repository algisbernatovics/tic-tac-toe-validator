<?php
require __DIR__ . '/../validator/validator.php';

use PHPUnit\Framework\TestCase;

class validatorTest extends TestCase
{
    public function testEmpty()
    {
        $validator = new validator();
        $board =
            [
                '.', '.', '.',
                '.', '.', '.',
                '.', '.', '.',
            ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }

    public function testFilledWithO()
    {
        $validator = new validator();
        $board =
            [
                'o', 'o', 'o',
                'o', 'o', 'o',
                'o', 'o', 'o',
            ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testFilledWithX()
    {
        $validator = new validator;
        $board =
            [
                'x', 'x', 'x',
                'x', 'x', 'x',
                'x', 'x', 'x',
            ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testMultipleWinningLines1()
    {
        $validator = new validator();
        $board =
            [
                'x', 'x', 'x',
                '.', '.', '.',
                'o', 'o', 'o',
            ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testMultipleWinningLines2()
    {
        $validator = new validator();
        $board =
            [
                'x', '.', 'o',
                'x', '.', 'o',
                'x', '.', 'o',
            ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testMultipleWinningLines3()
    {
        $validator = new validator();
        $board =
            [
                'x', 'x', 'o',
                'x', 'x', 'o',
                'x', 'x', 'o',
            ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testMultipleWinningLines4()
    {
        $validator = new validator();
        $board =
            [
                'x', 'x', 'x',
                '.', '.', '.',
                'o', 'o', 'o',
            ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testCounts1()
    {
        $validator = new validator();
        $board =
            [
                'x', 'x', '.',
                'o', 'o', '.',
                'o', '.', '.',
            ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testCounts2()
    {
        $validator = new validator();
        $board =
            [
                'x', 'x', 'x',
                'o', 'o', 'o',
                'o', '.', '.',
            ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testCounts3()
    {
        $validator = new validator();
        $board =
            [
                'o', 'o', 'o',
                'o', 'x', 'x',
                'x', '.', '.',
            ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testCounts4()
    {
        $validator = new validator;
        $board =
            [
                'x', 'o', 'o',
                'o', 'o', 'o',
                'o', 'o', 'o',
            ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testCounts5()
    {
        $validator = new validator;
        $board =
            [
                'o', 'x', 'x',
                'x', 'x', 'x',
                'x', 'x', 'x',
            ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }

    public function testOfirstOWin()
    {
        $validator = new validator;
        $board =
            [
                'o', 'o', 'o',
                'x', '.', 'x',
                '.', '.', 'x',
            ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
    public function testOfirst()
    {
        $validator = new validator;
        $board =
            [
                'o', 'x', 'x',
                'o', '.', 'o',
                '.', 'x', 'x',
            ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
    public function testXfirstXWin()
    {
        $validator = new validator;
        $board =
            [
                'x', 'x', 'x',
                'o', '.', 'o',
                '.', '.', 'o',
            ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }
    public function testXfirst()
    {
        $validator = new validator;
        $board =
            [
                'x', 'o', 'o',
                'x', '.', 'x',
                '.', 'o', 'x',
            ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
    public function testTie1()
    {
        $validator = new validator;
        $board =
            [
                'x', 'o', 'x',
                'x', 'o', 'x',
                'o', 'x', 'o',
            ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
    public function testTie2()
    {
        $validator = new validator();
        $board = [
            'o', 'x', 'o',
            'x', 'o', 'x',
            'x', 'o', 'x',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
    public function testInvalidGrid1()
    {
        $validator = new validator();
        $board = [
            'x', 'o', 'o', 'x',
            'o', 'x', 'x', 'o',
            'x', 'o', '.', 'x',
            'o', 'x', 'o', 'o',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }
    public function testInvalidGrid2()
    {
        $validator = new validator();
        $board = [
            'o', 'o', 'o', 'o',
            'x', 'x', 'x', 'o',
            'x', 'o', '.', 'x',
            'o', 'x', 'o', 'o',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }
    public function testInvalidGrid3()
    {
        $validator = new validator();
        $board = [
            '.', '.', '.', '.',
            '.', '.', '.', '.',
            '.', '.', '.', '.',
            '.', '.', '.', '.',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }
    public function testInvalidGrid4()
    {
        $validator = new validator();
        $board = [
            'o', 'o', 'o', 'o',
            'o', 'o', 'o', 'o',
            'o', 'o', 'o', 'o',
            'o', 'o', 'o', 'o',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }
    public function testInvalidGrid5()
    {
        $validator = new validator();
        $board = [
            'x', 'x', 'x', 'x',
            'x', 'x', 'x', 'x',
            'x', 'x', 'x', 'x',
            'x', 'x', 'x', 'x',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }
    public function testUnconventionalWin()
    {
        $validator = new validator();
        $board = [
            'x', '.', 'o',
            'x', 'o', 'x',
            'o', 'x', '.',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }
    public function testInvalidGridWin()
    {
        $validator = new validator();
        $board = [
            'o', '.', 'x', '.',
            'x', 'o', 'o', 'x',
            'x', 'o', 'o', '.',
            '.', 'x', 'o', 'o',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }
    public function testIncompleteGrid1()
    {
        $validator = new validator();
        $board = [
            'x', 'o', '.',
            '.', 'o', '.',
            '.', 'x', '.',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
    public function testIncompleteGrid2()
    {
        $validator = new validator();
        $board = [
            'x', 'o', 'x',
            '.', 'o', '.',
            'o', 'x', '.',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
    public function testMixedSymbols1()
    {
        $validator = new validator();
        $board = [
            'x', 'o', 'o',
            'o', 'x', 'x',
            'o', 'x', 'o',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }
    public function testMixedSymbols2()
    {
        $validator = new validator();
        $board = [
            'x', 'x', 'o',
            'o', 'o', 'x',
            'x', 'o', 'o',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }
    public function testLargeGrid()
    {
        $validator = new validator();
        $board = [
            'x', 'o', 'x', 'o', 'x',
            'o', 'x', 'o', 'x', 'o',
            'o', 'x', 'o', 'x', 'o',
            'x', 'o', 'x', 'o', 'x',
            'o', 'x', 'o', 'x', 'o',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }
    public function testXWinTwice1()
    {
        $validator = new validator();
        $board = [
            'x', 'o', 'x',
            'o', 'x', 'o',
            'x', 'o', 'x',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
    public function testXWinTwice2()
    {
        $validator = new validator();
        $board = [
            'x', 'x', 'x',
            'o', 'o', 'x',
            'o', 'o', 'x',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
    public function testXWinTwice3()
    {
        $validator = new validator();
        $board = [
            'o', 'o', 'x',
            'o', 'o', 'x',
            'x', 'x', 'x',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
    public function testXWinTwice4()
    {
        $validator = new validator();
        $board = [
            'x', 'o', 'o',
            'x', 'o', 'o',
            'x', 'x', 'x',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
    public function testXWinTwice5()
    {
        $validator = new validator();
        $board = [
            'x', 'x', 'x',
            'x', 'o', 'o',
            'x', 'o', 'o',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
    public function testXWinTwice6()
    {
        $validator = new validator();
        $board = [
            'o', 'x', 'o',
            'x', 'x', 'x',
            'o', 'x', 'o',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
    public function smallBoard()
    {
        $validator = new validator();
        $board = [
            'x', 'x',
            'x', 'x',
            'x', 'x',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('no', $answer);
    }
    public function testXWinTwice7()
    {
        $validator = new validator();
        $board = [
            'o', 'o', 'x',
            'o', 'x', 'x',
            'x', 'o', 'x',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
    public function testXWinTwice8()
    {
        $validator = new validator();
        $board = [
            'x', 'o', 'x',
            'o', 'x', 'x',
            'o', 'o', 'x',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
    public function testXWinTwice9()
    {
        $validator = new validator();
        $board = [
            'x', 'o', 'o',
            'x', 'x', 'o',
            'x', 'o', 'x',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
    public function testXWinTwice10()
    {
        $validator = new validator();
        $board = [
            'x', 'o', 'x',
            'x', 'x', 'o',
            'x', 'o', 'o',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
    public function testXWinTwice11()
    {
        $validator = new validator();
        $board = [
            'o', 'o', 'x',
            'o', 'x', 'o',
            'x', 'x', 'x',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
    public function testXWinTwice12()
    {
        $validator = new validator();
        $board = [
            'x', 'o', 'o',
            'o', 'x', 'o',
            'x', 'x', 'x',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
    public function testXWinTwice13()
    {
        $validator = new validator();
        $board = [
            'x', 'x', 'x',
            'o', 'x', 'o',
            'x', 'o', 'o',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
    public function testXWinTwice14()
    {
        $validator = new validator();
        $board = [
            'x', 'x', 'x',
            'o', 'x', 'o',
            'o', 'o', 'x',
        ];
        $answer = $validator->getValidatorAnswer($board);
        $this->assertEquals('yes', $answer);
    }
}
