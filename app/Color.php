<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'colors';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code', 'category_id',
    ];

    public function insertColor($data)
    {
        return Color::create($data);
    }
    public function updateColor($id, $data)
    {
        return Color::where('id', '=', $id)->update($data);
    }

    public function getColorById($id)
    {
        return Color::where('id', '=', $id)->first();
    }
    public function getListColorByCategory($catId)
    {
        return Color::orderBy('created_at', 'desc')->get();
    }
    public function getListColorByCate($catId)
    {
        $res = Product::where('category_id', $catId)->distinct()->pluck('color_id')->toArray();
        $res2 = Color::whereIn('id', $res)->get();
        return $res2;
    }
    public function getListColor()
    {
        return Color::orderBy('created_at', 'desc')->get();
    }
    public function deleteColor($id)
    {
        return Color::where('id', '=', $id)->delete();
    }
}
