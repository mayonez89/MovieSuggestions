<?php

namespace Tests\Unit;

use App\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        for($i = 0; $i < 10; $i++)
            factory(User::class)->make();
        $this->assertTrue(true);
    }
}
