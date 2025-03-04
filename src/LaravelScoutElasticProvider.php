<?php

namespace Sohamgreens\LaravelScoutElastic;

use Exception;
use Elastic\Elasticsearch\ClientBuilder;
use Laravel\Scout\EngineManager;
use Illuminate\Support\ServiceProvider;
use Sohamgreens\LaravelScoutElastic\Engines\ElasticsearchEngine;

class LaravelScoutElasticProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->ensureElasticClientIsInstalled();

        resolve(EngineManager::class)->extend('elasticsearch', function () {
            $builder= ClientBuilder::create()
                    ->setHosts(config('scout.elasticsearch.hosts'));
            $auth = config('scout.elasticsearch.auth');
            if(is_array($auth) && !empty($auth['user'])){
                $builder->setBasicAuthentication($auth['user'], $auth['password']);
            }
                    
            return new ElasticsearchEngine(
                $builder->build()
            );
        });
    }

    /**
     * Ensure the Elastic API client is installed.
     *
     * @return void
     *
     * @throws \Exception
     */
    protected function ensureElasticClientIsInstalled()
    {
        if (class_exists(ClientBuilder::class)) {
            return;
        }

        throw new Exception('Please install the Elasticsearch PHP client: elasticsearch/elasticsearch.');
    }
}
