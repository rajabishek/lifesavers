<?php namespace Eckspan\Eventing;

use Illuminate\Support\ServiceProvider;

class EventingServiceProvider extends ServiceProvider{

	public function register(){
		$listeners = $this->app['config']->get('eckspan.listeners');
		foreach ($listeners as $listener) {
			$this->app['events']->listen('Eckspan.*',$listener);
		}
	}
}