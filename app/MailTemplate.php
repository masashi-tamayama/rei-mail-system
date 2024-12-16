<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailTemplate extends Model
{
    // データベーステーブル名の明示
    protected $table = 'mail_templates';

    // Mass Assignment を許可するカラム
    protected $fillable = ['name', 'subject', 'body'];
}
