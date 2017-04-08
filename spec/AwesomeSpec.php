<?php
/**
 * Created by PhpStorm.
 * User: oussaka
 * Date: 06/04/2017
 * Time: 00:28
 */

namespace App\Spec;

use App\Awesome;
use App\AwesomeDependency;
use Kahlan\Arg;

describe('Awesome', function () {

    given('awesome', function() {
        return new Awesome(new AwesomeDependency);
    });

    describe('Awesome instance', function () {
        it('instanceof DependencyInterface', function () {
            expect($this->awesome)->toBeAnInstanceOf(Awesome::class);
        });
    });

    describe('->process', function () {

        it('return "$param processed" string', function () {
            $param = 'foo';
            $expected = $param.' processed';

            allow('rand')->toBeCalled()->andReturn(1);

            expect('rand')->toBeCalled()->once();
            expect($this->awesome)->toReceive('process')->with(Arg::toBeA('string'));

            $result = $this->awesome->process($param);
            expect($result)->toBe($expected);
        });

        it("called how many times assert", function () {
            $param = 'foo';
            $expected = $param.' processed';

            expect('rand')->toBeCalled()->once();

            $result = $this->awesome->process($param);

            if($result == $expected) {
                // todo: awesomedependancy->process assert how many times it called
            }
        });

    });
});
