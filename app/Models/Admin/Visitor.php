<?php

    namespace App\Models\Admin;

    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Support\Facades\Cache;

    class Visitor extends Model
    {
        use HasFactory;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'ip_address',
            'user_agent',
            'visited_at',
        ];

        /**
         * Get the attributes that should be cast.
         *
         * @return array<string, string>
         */
        protected function casts(): array
        {
            return [
                'visited_at' => 'datetime',
            ];
        }

        /**
         * Get the total number of visitors.
         *
         * @return int
         */
        public static function totalVisitors(): int
        {
            return Cache::tags('visitors')->remember('visitors.total', now()->addHour(), function () {
                return self::count();
            });
        }

        /**
         * Get the number of visitors for the current month.
         *
         * @return int
         */
        public static function visitorsCurrentMonth(): int
        {
            return Cache::tags('visitors')->remember('visitors.current_month', now()->addHour(), function () {
                $startCurrentMonth = Carbon::now();
                $endCurrentMonth = Carbon::now();

                return self::whereBetween('visited_at', [
                    $startCurrentMonth->startOfMonth(),
                    $endCurrentMonth->endOfMonth(),
                ])->count();
            });
        }

        /**
         * Get the number of visitors for the same month in the previous year.
         *
         * @return int
         */
        public static function visitorsLastMonth(): int
        {
            return Cache::tags('visitors')->remember('visitors.last_month', now()->addHour(), function () {
                $startLastMonth = Carbon::now()->subMonth();
                $endLastMonth = Carbon::now()->subMonth();

                return self::whereBetween('visited_at', [
                    $startLastMonth->startOfMonth(),
                    $endLastMonth->endOfMonth(),
                ])->count();
            });
        }

        /**
         * Calculate the percentage change between the current and previous values.
         *
         * If the previous value is zero, this method will return 100, indicating a 100%
         * increase.
         *
         * @param  int       $current  The current value.
         * @param  int       $previous The previous value.
         * @return float|int The percentage change as a float.
         */
        public static function percentageChange(int $current, int $previous): float|int
        {
            if ($current == 0) {
                return 100; // 100% increase if no visitors last month
            }

            return (($current - $previous) / $previous) * 100;
        }
    }
