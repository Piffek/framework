<?php

namespace App\Middleware;

use InvalidArgumentException;
use Closure;
use App\Middleware\LayerInterface;

class Middleware {
	
    private $layers;
    
    public function __construct(array $layers = [])
    {
        $this->layers = $layers;
    }
    
    /**
     * Add layer(s) or Middleware
     * @param  mixed $layers
     * @return Onion
     */
    public function layer($layers)
    {
        if ($layers instanceof Middleware) {
            $layers = $layers->toArray();
        }
        if ($layers instanceof LayerInterface) {
            $layers = [$layers];
        }
        if (!is_array($layers)) {
            throw new InvalidArgumentException(get_class($layers) . " is not a valid onion layer.");
        }
        return new static(array_merge($this->layers, $layers));
    }
    /**
     * @param  mixed  $object
     * @param  Closure $core
     * @return mixed         
     */
    public function handle($object, Closure $core)
    {
        $coreFunction = $this->createCoreFunction($core);
        $layers = array_reverse($this->layers);
        $completeMiddleware = array_reduce($layers, function($nextLayer, $layer){
            return $this->createLayer($nextLayer, $layer);
        }, $coreFunction);

        return $completeMiddleware($object);
    }
    
    /**
     * @return array
     */
    public function toArray()
    {
        return $this->layers;
    }
    
    /**
     * @param  Closure $core the core function
     * @return Closure
     */
    private function createCoreFunction(Closure $core)
    {
        return function($object) use($core) {
            return $core($object);
        };
    }
  
    /**
     * @param  LayerInterface $nextLayer
     * @param  LayerInterface $layer
     * @return Closure
     */
    private function createLayer($nextLayer, $layer)
    {
        return function($object) use($nextLayer, $layer){
        	
            return $layer->handle($object, $nextLayer);
            
        };
    }

}