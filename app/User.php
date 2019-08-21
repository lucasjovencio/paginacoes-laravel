<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
class User extends Authenticatable
{
    use Notifiable;
    // use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    protected $appends = [
        'idade',
        'genero',
        'tipo',
        'status_txt',
    ];

    public function getIdadeAttribute()
    {
        return Carbon::parse($this->date_birth)->age; 
    }

    public function getGeneroAttribute()
    {
        switch ($this->genre) {
            case 'FEMALE':
                return 'Feminino';
            case 'MALE':
                return 'Masculino';
            default:
                return 'Outro';
        }
    }

    public function getTipoAttribute()
    {
        switch ($this->type) {
            case 'MASTER':
                return 'Administrador';
            case 'ADMIN':
                return 'Gerente';
            case 'CLIENT':
                return 'Cliente';
            default:
                return 'Outro';
        }
    }

    public function getStatusTxtAttribute()
    {
        switch ($this->status) {
            case 'ACTIVE':
                return 'Ativo';
            case 'INACTIVE':
                return 'Inativo';
            case 'DISABLED':
                return 'Desabilitado';
            default:
                return 'Outro';
        }
    }
}
