<?php

use Illuminate\Support\Facades\Log;
use TahsinGokalp\Lett\Facades\Lett;
use TahsinGokalp\Lett\Tests\Fakes\LettFake;
use TahsinGokalp\Lett\Tests\Mocks\LettClient;

it('it_will_not_send_log_information_to_lett', function () {
    config()->set('logging.channels.lett', ['driver' => 'lett']);
    config()->set('logging.default', 'lett');
    config()->set('lett.environments', ['testing']);

    $client = new LettClient(
        'login_key',
        'project_key'
    );

    $this->app['router']->get('/log-information-via-route/{type}', function (string $type) {
        Log::{$type}('log');
    });

    $this->get('/log-information-via-route/debug');
    $this->get('/log-information-via-route/info');
    $this->get('/log-information-via-route/notice');
    $this->get('/log-information-via-route/warning');
    $this->get('/log-information-via-route/error');
    $this->get('/log-information-via-route/critical');
    $this->get('/log-information-via-route/alert');
    $this->get('/log-information-via-route/emergency');

    expect(count($client->requestsSent()))->toBe(0);
});

it('it_will_only_send_throwables_to_lett', function () {
    config()->set('logging.channels.lett', ['driver' => 'lett']);
    config()->set('logging.default', 'lett');
    config()->set('lett.environments', ['testing']);

    $lett = new LettFake(new LettClient(
        'login_key',
        'project_key'
    ));

    Lett::fake($lett);

    $this->app['router']->get('/throwables-via-route', function () {
        throw new RuntimeException('exception-via-route');
    });

    $this->get('/throwables-via-route');

    $total = count(app('lett')->requestsSent());

    expect($total)->toBe(1);
});
