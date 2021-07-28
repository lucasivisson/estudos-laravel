<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    // protected $table ='products'
    // precisaria desse código acima caso o nosso model fosse products e a migration fosse products também, pq o laravel sempre pega o model e adiciona um s no final então ficaria productss, essa linha de código diz explicitamente qual é o nome do model corretamente.
    protected $fillable = ['name', 'number', 'active', 'category', 'description'];
    // essa linha acima serve para permitir que o usuário edite determinados atributos
    // protected $guarded = ['admin'];
    // essa linha acima serve para não permitir que o usuário edite o atributo admin, por exemplo
    /*
    public $rules = [
        'name' => 'required|min:3|max:100|',
        'number' => 'required|numeric',
        'category' => 'required',
        'description' => 'required|min:3|max:1000' // O usuário não é obrigado a colocar nada, mas se ele preencher, a quantidade minima é 3 e a máxima é 1000.
    ];
    */
}
