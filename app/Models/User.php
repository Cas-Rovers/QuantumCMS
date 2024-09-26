<?php

    namespace App\Models;

    // use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;

    //  use Laravel\Fortify\TwoFactorAuthenticatable;
    use Laravel\Sanctum\HasApiTokens;
    use Spatie\MediaLibrary\HasMedia;
    use Spatie\MediaLibrary\InteractsWithMedia;
    use Spatie\MediaLibrary\MediaCollections\Models\Media;
    use Spatie\Permission\Traits\HasRoles;

    /**
     * User model class.
     *
     * This class represents a user in the application and provides methods for
     * managing user data, including authentication, media management, and attribute
     * casting.
     *
     * @package App\Models
     */
    class User extends Authenticatable implements HasMedia
    {
        use HasApiTokens, HasFactory, HasRoles, InteractsWithMedia, Notifiable, SoftDeletes;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'first_name',
            'last_name',
            'email',
            'password',
            'locale',
            'is_active',
        ];

        /**
         * The attributes that should be hidden for serialization.
         *
         * @var array<int, string>
         */
        protected $hidden = [
            'password',
            'remember_token',
        ];

        /**
         * Get the attributes that should be cast.
         *
         * @return array<string, string>
         */
        protected function casts(): array
        {
            return [
                'email_verified_at' => 'datetime',
                'password' => 'hashed',
                'is_active' => 'boolean',
            ];
        }

        /**
         * Returns the full name of the user, combining first name, last name, and infix.
         *
         * @return string The full name of the user.
         */
        public function getFullNameAttribute(): string
        {
            $nameParts = explode(' ', $this->last_name);

            $first_name = $this->first_name;
            $last_name = array_shift($nameParts);
            $infix = implode(' ', $nameParts);

            return trim($first_name . ' ' . $last_name . ' ' . $infix);
        }

        /**
         * Returns the URL of the user's profile avatar.
         *
         * If the user has a media file named 'avatar', it returns the URL of the `thumbnail` version of that media
         * file. Otherwise, it returns the URL of the default avatar image.
         *
         * @return string The URL of the user's profile avatar.
         */
        public function getProfileAvatar(): string
        {
            if ($this->hasMedia('avatar')) {
                return $this->getFirstMedia('avatar')->getUrl('thumbnail');
            } else {
                return asset('images/default-avatar.png');
            }
        }

        /**
         * Returns the URL of the original avatar of the user.
         *
         * If the user has a media file named 'avatar', it returns the full URL of the `original` version of that media
         * file. Otherwise, it returns the URL of the default avatar image.
         *
         * @return string The URL of the original avatar of the user.
         */
        public function getOriginalAvatar(): string
        {
            if ($this->hasMedia('avatar')) {
                return $this->getFirstMedia('avatar')->getFullUrl('original');
            } else {
                return asset('images/default-avatar.jpg');
            }
        }

        /**
         * Saves the user's profile avatar.
         *
         * @param string $file The file to be saved as the profile avatar.
         *
         * @return string The URL of the saved profile avatar.
         *
         * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
         * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
         */
        public function saveProfileAvatar(string $file): string
        {
            $this->clearMediaCollection('avatar');
            $this->addMedia($file)->toMediaCollection('avatar');

            return $this->getFirstMedia('avatar')->getUrl('thumbnail');
        }

        /**
         * Registers media conversions for the user's media.
         *
         * This function defines two media conversions: `thumbnail` and `original`.
         * The 'thumbnail' conversion resizes the image to 96x96 pixels
         * and sharpens it by a factor of 10.
         * The 'original' conversion keeps the original image format
         * and sharpens it by a factor of 10.
         *
         * @param Media|null $media The media object to register conversions for.
         */
        public function registerMediaConversions(?Media $media = null): void
        {
            $this->addMediaConversion('thumbnail')
                ->keepOriginalImageFormat()
                ->width(96)
                ->height(96)
                ->sharpen(10)
                ->nonQueued();

            $this->addMediaConversion('original')
                ->keepOriginalImageFormat()
                ->sharpen(10);
        }
    }
