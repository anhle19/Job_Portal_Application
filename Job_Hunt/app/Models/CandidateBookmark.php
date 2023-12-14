<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateBookmark extends Model
{
    use HasFactory;

    protected $table = 'candidate_bookmarks';

    public function rJob() {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function rCompany() {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
