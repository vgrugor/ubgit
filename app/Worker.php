<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Worker extends Model
{
    protected $fillable = ['name', 'email', 'phone_number'];
    
    public function getDateRefreshAttribute($date) 
    {
        if ($date != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d', $date)->format('d.m.Y');
        }
        return '-';
    }
    
    public static function getTranslitName($workerName)
    {
        $converter = [
            "а" => "a",             "б" => "b",             "в" => "v", 
            "г" => "h",             "ґ" => "g",             "д" => "d", 
            "е" => "e",             "є" => "ie",            "ё" => "jo", 
            "ж" => "zh",            "з" => "z",             "и" => "y", 
            "і" => "i",             "ї" => "i",             "й" => "i", 
            "к" => "k",             "л" => "l",             "м" => "m", 
            "н" => "n",             "о" => "o",             "п" => "p", 
            "р" => "r",             "с" => "s",             "т" => "t", 
            "у" => "u",             "ф" => "f",             "х" => "kh", 
            "ц" => "ts",            "ч" => "ch",            "ш" => "sh", 
            "щ" => "shch",          "ъ" => "",              "ы" => "y", 
            "ь" => "",              "э" => "e",             "ю" => "iu", 
            "я" => "ia",            "і" => "i",             "ї" => "i", 
            "А" => "A",             "Б" => "B",             "В" => "V", 
            "Г" => "H",             "Ґ" => "G",             "Д" => "D", 
            "Е" => "E",             "Ё" => "Jo",            "Ж" => "Zh", 
            "З" => "Z",             "И" => "Y",             "Й" => "Y", 
            "К" => "K",             "Л" => "L",             "М" => "M", 
            "Н" => "N",             "О" => "O",             "П" => "P", 
            "Р" => "R",             "С" => "S",             "Т" => "T", 
            "У" => "U",             "Ф" => "F",             "Х" => "Kh", 
            "Ц" => "Ts",            "Ч" => "Ch",            "Ш" => "Sh", 
            "Щ" => "Shch",          "Ъ" => "",              "Ы" => "Y", 
            "Ь" => "",              "Э" => "E",             "Ю" => "Yu", 
            "Я" => "Ya",            "’" => "",              "І" => "I", 
            "Ї" => "Yi",            "Є" => "Ye",            "'" => "", 
            " " => ".",             "." => "."
        ];
        
        //преобразуем строку в массив
        $dividedWorkerNameArray = explode(' ', $workerName);
        
        //если в массиве есть хотя бы имя и фамилия, разделенный пробелом
        if (count($dividedWorkerNameArray) > 1) {
            list($lastName, $firstName) = $dividedWorkerNameArray;
            
            //правильная последовательность: имя фамилия
            $workerNameForTranslit = $firstName . ' ' . $lastName;
        
            $translitWorkerName = strtr($workerNameForTranslit, $converter);
            
            return $translitWorkerName;
        }
        
        return false;
    }
}
