<?php

namespace App\Traits;

trait WithCachedRows
{
    protected $useCache = false;
    public $id;

    public function useCachedRows()
    {
        $this->useCache = true;
    }

    public function cache($callback)
    {
        $cacheKey = $this->id;  

        if ($this->useCache && cache()->has($cacheKey)) {
            return cache()->get($cacheKey);
        }

        $result = $callback();

        cache()->put($cacheKey, $result);

        return $result;
    }
}
