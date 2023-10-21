<?php

namespace App\Models;

use App\Models\Payment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Offer extends Model
{
    use HasFactory;

    protected $casts = [ 'last_day'=>'date'];

    protected $fillable = [
        'title',
        'payment_id',
        'category_id',
        'company',
        'last_day',
        'description',
        'image',
        'user_id'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
    public function candidates()
    {
        return $this->hasMany(Candidate::class)->orderBy('created_at', 'DESC');
    }
    public function recruiter()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
