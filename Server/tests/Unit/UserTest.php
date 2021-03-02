<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Log\Logger;
use PHPUnit\Exception;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example
     *
     * @return void
     */
    CONST ITER_COUNT = 10;
    CONST TESTING_CLASS = User::class;
    private $CHECK_BY = [
        'email',
//        'id',
    ];
    private $IDs = [];

    CONST RUN_TESTS = [ // CREATE & READ will always run, comment out others by will - this will affect DB state
        "UPDATE",
        "DELETE",
    ];

    public function testCreateAndRead()
    {
        for ($i = 0; $i < self::ITER_COUNT; $i++) {
            // create a User instance, pattern created in UserFactory
            $testUnit = factory(self::TESTING_CLASS)->make();

            // saving to database
            $testUnit->save();

            // saving locally the IDs of the created objects, to know which ones we can modify in further tests
            $this->IDs[] = $testUnit->id;

            // array indicating which attributes to check
            $assertArray = [];
            array_walk($this->CHECK_BY, function ($attr) use ($testUnit, &$assertArray) {
                $assertArray[$attr] = $testUnit->$attr;
            });

            $this->assertDatabaseHas('users', $assertArray);
        }
        $this->assertTrue(count($this->IDs)>0);
    }

    /*
     * @depends testCreateAndRead
     */
    public function testUpdateShouldPass()
    {
        $this->assertTrue(count($this->IDs)>0);
        if (in_array('READ', self::RUN_TESTS)) {
            foreach ($this->IDs as $id) {
                try {
                    $userClass = new \ReflectionClass(self::TESTING_CLASS);
                    $updateValues = [
                        'email' =>  "test@email.com",
                    ];
                    // update the DB with the new values
                    $userClass->update($updateValues);
                    // check if the DB has the new values
                    $this->assertDatabaseHas($updateValues);
                } catch (Exception $exception) {
                    Logger::log("TEST", $exception);
                    // if we cant reach the class by reflection, the test fails
                    $this->assertTrue(false);
                }
            }
        }
    }

    public function testUpdateShouldNotPass()
    {
        if (in_array('READ', self::RUN_TESTS)) {
            foreach ($this->IDs as $id) {
                try {
                    $userClass = new \ReflectionClass(self::TESTING_CLASS);
                    $updateValues = [
                        'gmail' =>  "test@email.com",
                    ];
                    // update the DB with the new values
                    $userClass->update($updateValues);
                    // check if the DB has the new values
                    $this->assertDatabaseHas($updateValues);
                } catch (Exception $exception) {
                    Logger::log("TEST", $exception);
                    // if we cant reach the class by reflection, the test fails
                    $this->assertTrue(false);
                }
            }
        }
    }

    public function testDelete()
    {
        if (in_array('DELETE', self::RUN_TESTS)) {

        }
    }
}
