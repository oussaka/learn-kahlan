<?php

use App\Bear;
use App\Redis;
use Kahlan\Plugin\Double;
use kahlan\plugin\Monkey;

describe("Bear", function() {
    describe("::wrath", function() {
        it('should demonstrate Bear super-power', function() {
            expect(Bear::wrath())->toEqual('WRAAAAATH');
        });
    });

    describe("::isSleepy", function() {
        it('should not be sleepy if it is before 21:00', function() {
            Monkey::patch('time', function() {
                return "1465502399";
            });
            expect(Bear::isSleepy())->toEqual(false);
        });

        it('should be at least sleepy if it is 21:00 or later', function() {
            Monkey::patch('time', function() {
                // return "1465502400";
                return "946760400";
            });
            expect(Bear::isSleepy())->toEqual(true);
        });
    });

    describe('->doHug()', function () {
        it('delegates a hug to a hugger instance nearby', function () {
            $hugger = Double::instance(['implements' => ['App\Huggable']]);
            /* $hugger = Double::instance([
                // if we want to use exact class, we can use
                // 'extends' => Hug::class,
                'implements' => Huggable::class,
                'methods' => ['__construct'],
                // if we want to pass instance implements interface
                // 'implements' => [DependencyInterface::class, AnotherInterface::class],
            ]); */
            allow($hugger)->toReceive('hug')->andReturn(new \App\Hug);

            $bear = new Bear($hugger);
            expect($bear->doHug())->toEqual('(つ´∀｀)つ');
        });
    });

    it("makes a instance double of a PHP core class", function() {
        $redis = Double::instance([
                                    'extends' => Redis::class,
                                    'methods' => 'connect'
        ]);
        allow($redis)->toReceive('connect')->andReturn(true);

        expect($redis->connect('127.0.0.1'))->toBe(true);
    });
    
});
