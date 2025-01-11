<?php

    use Illuminate\Pagination\LengthAwarePaginator;
    use Illuminate\Support\Carbon;

    if (!function_exists('paginateCachedCollection')) {
        /**
         * Paginate a cached collection.
         *
         * @param  string               $cacheKey
         * @param  int                  $perPage
         * @param  Closure              $callback
         * @param  array                $cacheTags
         * @param  Carbon               $ttl
         * @return LengthAwarePaginator
         */
        function paginateCachedCollection(string $cacheKey, int $perPage, Closure $callback, array $cacheTags, Carbon $ttl): LengthAwarePaginator
        {
            $page = request('page', 1);

            $collection = Cache::tags($cacheTags)->remember($cacheKey, $ttl, function () use ($callback) {
                return $callback()->get();
            });

            return new LengthAwarePaginator(
                $collection->forPage($page, $perPage),
                $collection->count(),
                $perPage,
                $page,
                ['path' => request()->url()],
            );
        }
    }
