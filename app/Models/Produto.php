<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'img',
        'price',
        'category_id',
        'user_id',
        'slug'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category()
    {
        return $this->belongsTo(category::class, 'category_id');
    }
    //Caso o nome da tabela seja diferente do nome da classe, é necessário informar o nome da tabela usando -> protected $table = 'nome_da_tabela';
    //Aqui estamos utilizando o nome da tabela no plural e a classe no singular, por isso não é necessário informar o nome da tabela, mas caso o laravel não encontre a tabela, é necessário informar o nome da tabela.
}
