<?php

/**
 * Created by PhpStorm.
 * User: oussaka
 * Date: 12/04/2017
 * Time: 12:30
 */
namespace App\Spec;

use App\MyController;
use App\User;
use Kahlan\Plugin\Double;

describe('MyController Hard dependency', function () {

    given('myController', function () {
        return new MyController();
    });

    given("dependency", function() {
       return Double::instance([
            // if we want to use exact class, we can use
            'extends' => User::class,
            'methods' => ['__construct', 'save'],
        ]);
    });

    describe("myController instance", function() {
        it("instanceof MyController", function() {
            expect($this->myController)->toBeAnInstanceOf(MyController::class);
        });
    });

    describe("->save", function () {
        it("return 'saved' string", function () {
            allow(User::class)->toReceive('save')->andReturn(true);

            $this->myController->save();
            $result = ob_get_clean();

            expect($result)->toBe("saved");
        });

        it("return 'not saved' string", function () {
            allow(User::class)->toReceive('save')->andReturn(false);

            $this->myController->save();
            $result = ob_get_clean();
            expect($result)->toBe("not saved");
        });
    });

});