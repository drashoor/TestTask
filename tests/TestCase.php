<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signIn($user = null)
    {
        $user = $user ?: $this->create(User::class);
        $this->actingAs($user);
        return $this;
    }

    protected function create($class, $attributes = [])
    {
        return factory($class)->create($attributes);
    }
}
