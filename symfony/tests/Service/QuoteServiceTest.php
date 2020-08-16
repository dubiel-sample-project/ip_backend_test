<?php

namespace App\Tests\Service;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Service\QuoteService;

class QuoteServiceTest extends KernelTestCase
{
	private QuoteService $quoteService;
	
	public function setUp()
	{
		self::bootKernel();
		$this->quoteService = self::$container->get('App\Service\QuoteService');
	}
	
    public function testNormalizeQuote()
    {
		$quote = 'If you do what you’ve always done, you’ll get what you’ve always gotten.';
		$expected = 'If you do what you’ve always done, you’ll get what you’ve always gotten';
		
		$actual = $this->quoteService->normalizeQuote($quote);

        $this->assertSame($expected, $actual);
	}
	
	public function testTransformQuote()
    {
		$quote = 'You can’t use up creativity.  The more you use, the more you have.';
		$expected = 'YOU CAN’T USE UP CREATIVITY.  THE MORE YOU USE, THE MORE YOU HAVE.!';
		
		$actual = $this->quoteService->transformQuote($quote);

        $this->assertSame($expected, $actual);
	}
	
	public function testNormalizeTransformQuote()
    {
		$quote = 'You can’t fall if you don’t climb.  But there’s no joy in living your whole life on the ground.';
		$expected = 'YOU CAN’T FALL IF YOU DON’T CLIMB. BUT THERE’S NO JOY IN LIVING YOUR WHOLE LIFE ON THE GROUND!';
		
		$actual = $this->quoteService->normalizeQuote($quote);
		$actual = $this->quoteService->transformQuote($actual);

        $this->assertSame($expected, $actual);
	}
}
