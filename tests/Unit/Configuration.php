<?php

test('middleware', function () {
    expect(config('laramote.middleware'))->toBeArray();
});
