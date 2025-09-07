<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Filament\Models\Contracts\HasName;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\DashboardUrlTrait;

class User extends Authenticatable implements FilamentUser, HasName, HasAvatar
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;
    use DashboardUrlTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'country',
        'region',
        'city',
        'address',
        'website',
        'avatar',
        'bio',
        'phone_verified_at'
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
            'phone_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * تحقق من إمكانية وصول المستخدم إلى لوحة التحكم بناءً على دوره.
     *
     * @param Panel $panel
     * @return bool
     */
    public function canAccessPanel(Panel $panel): bool
    {
        $panelId = $panel->getId();

        if ($panelId === 'admin' && $this->hasRole('admin')) {
            return true;
        }

        if ($panelId === 'vendor' && $this->hasRole('vendor')) {
            return true;
        }

        if ($panelId === 'donor' && $this->hasRole('donor')) {
            return true;
        }

        if ($panelId === 'association' && $this->hasRole('organization')) {
            return true;
        }

        return false;
    }


    /**
     * جلب رابط الصورة الرمزية (avatar) المستخدم في Filament.
     *
     * @return string|null
     */
    public function getFilamentAvatarUrl(): ?string
    {
        return $this->avatar_url;
    }

    /**
     * جلب اسم المستخدم المستخدم في Filament.
     *
     * @return string
     */
    public function getFilamentName(): string
    {
//        return "{$this->first_name} {$this->last_name}";
        return $this->name;
    }

    /**
     * علاقة المستخدم مع نموذج المانح.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
//    public function donor()
//    {
//        return $this->hasOne(Donor::class, 'user_id');
//    }
    public function donors(): BelongsToMany
    {
        return $this->belongsToMany(
            Donor::class,
            'donor_user'
        )->withPivot('is_owner')->withTimestamps();
    }
    public function getDonorAttribute(): ?Donor
    {
        return $this->donors()->first();
    }
    public function donor()
    {
        return $this->donors()->limit(1);
    }

    public function providers(): BelongsToMany
    {
        return $this->belongsToMany(
            Provider::class,
            'provider_user'
        )->withPivot('is_owner')->withTimestamps();
    }
    public function getProviderAttribute(): ?Provider
    {
        return $this->providers()->first();
    }
    public function provider()
    {
        return $this->providers()->limit(1);
    }

    /**
     * علاقة المستخدم مع نموذج المنظمة.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function organizations(): BelongsToMany
    {
        return $this->belongsToMany(
            \App\Models\Organization::class,
            'organization_user'
        )->withPivot('is_owner')->withTimestamps();
    }
    public function getOrganizationAttribute(): ?Organization
    {
        return $this->organizations()->first();
    }
    public function organization()
    {
        return $this->organizations()->limit(1);
    }

    public function isOwner(): bool
    {
        // تأكد من علاقته مع الجهة المختصة

        if ($this->provider) {
            return (bool) $this->provider->pivot->is_owner;
        }

        if ($this->organization) {
            return (bool) $this->organization->pivot->is_owner;
        }

        if ($this->donor) {
            return (bool) $this->donor->pivot->is_owner;
        }

        return false;
    }



    /**
     * علاقة المستخدم مع المحفظة.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
//    public function wallet()
//    {
//        return $this->hasOne(Wallet::class, 'user_id');
//    }
    /**
     * علاقة المستخدم مع الملف الشخصي.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    /**
     * تحقق أن المستخدم لا يمكن أن يكون له أكثر من دور (admin, donor, provider, organization).
     *
     * @param array $roles
     * @return bool
     */
    public function hasSingleRole(array $roles): bool
    {
        return count($this->getRoleNames()) === 1 && in_array($this->getRoleNames()->first(), $roles);
    }

    /**
     * تحقق أن الكيان مرتبط بالدور الصحيح (مثل: كيان donor مرتبط بمستخدم لديه صلاحية donor).
     *
     * @return bool
     */
    public function validateEntityAndRole(): bool
    {
        if ($this->donor && !$this->hasRole('donor')) {
            return false;
        }

        if ($this->provider && !$this->hasRole('provider')) {
            return false;
        }

        if ($this->organization && !$this->hasRole('organization')) {
            return false;
        }

        return true;
    }

    /**
     * منع ارتباط المستخدم بأكثر من كيان واحد.
     *
     * @return bool
     */
    public function hasSingleEntity(): bool
    {
        return ($this->donor && !$this->provider && !$this->organization)
            || (!$this->donor && $this->provider && !$this->organization)
            || (!$this->donor && !$this->provider && $this->organization);
    }

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($user) {
            // التحقق من أن المستخدم لا يمتلك أكثر من دور
            if ($user->roles()->count() > 1) {
                session()->flash('error', 'المستخدم لا يمكن أن يمتلك أكثر من دور واحد.');
                return false;  // إيقاف الحفظ
            }

            // تحقق إضافي للتأكد من أنه لا يمتلك أكثر من كيان مرتبط
            if ($user->donor && $user->provider || $user->donor && $user->organization || $user->provider && $user->organization) {
                session()->flash('error', 'المستخدم لا يمكن أن يرتبط بأكثر من كيان واحد.');
                return false;  // إيقاف الحفظ
            }

            // التحقق من توافق الدور مع الكيان
            if ($user->hasRole('donor') && !$user->donor) {
                session()->flash('error', 'يجب ربط المستخدم بكيان donor عند تعيين دور donor.');
                return false;  // إيقاف الحفظ
            }

            if ($user->hasRole('provider') && !$user->provider) {
                session()->flash('error', 'يجب ربط المستخدم بكيان provider عند تعيين دور provider.');
                return false;  // إيقاف الحفظ
            }

            if ($user->hasRole('organization') && !$user->organization) {
                session()->flash('error', 'يجب ربط المستخدم بكيان organization عند تعيين دور organization.');
                return false;  // إيقاف الحفظ
            }
        });
    }

}
