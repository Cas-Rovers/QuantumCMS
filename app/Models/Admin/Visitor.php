<?php

    namespace App\Models\Admin;

    use Carbon\Carbon;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

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
         * Get the number of visitors for the current month.
         *
         * @return int
         */
        public static function visitorsCurrentMonth(): int
        {
            return self::where('visited_at', '>=', Carbon::now()->startOfMonth())
                ->where('visited_at', '<=', Carbon::now()->endOfMonth())
                ->count();
        }

        /**
         * Get the number of visitors for the same month in the previous year.
         *
         * @return int
         */
        public static function visitorsLastMonth(): int
        {
            return self::where('visited_at', '>=', Carbon::now()->subMonth()->startOfMonth())
                ->where('visited_at', '<=', Carbon::now()->subMonth()->endOfMonth())
                ->count();
        }

        /**
         * Calculate the percentage change between the current and previous values.
         *
         * If the previous value is zero, this method will return 100, indicating a 100%
         * increase.
         *
         * @param int $current  The current value.
         * @param int $previous The previous value.
         *
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
