<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

use App\Organization;

class Worker extends Model
{
    protected $fillable = [
        'drill_id', 
        'motorcade_id',
        'position_id', 
        'name', 
        'account_ad',
        'phone_number',
        'phone_number2',
        'email', 
        'vpn_status_id',
        'date_refresh',
        'note'
    ];
    
    public function getDateRefreshAttribute($date) 
    {
        if ($date != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d', $date)->format('d.m.Y');
        }
        return '-';
    }
    
    public static function getTranslit($text)
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
            " " => " ",             "." => "."
        ];
        
        $translitText = strtr($text, $converter);
        
        return $translitText;
    }
    

    public static function createAccountAd($workerName)
    {        
        //преобразуем строку в массив
        $dividedWorkerNameArray = explode(' ', $workerName);
        
        //если в массиве есть хотя бы имя и фамилия, разделенный пробелом
        if (count($dividedWorkerNameArray) > 1) {
            
            list($lastName, $firstName) = $dividedWorkerNameArray;
            
            //правильная последовательность: имя фамилия
            $workerNameForTranslit = $firstName . '.' . $lastName;
        
            $translitWorkerName = self::getTranslit($workerNameForTranslit);
            
            return $translitWorkerName;
        }
        
        return false;
    }
    
    /**
     * Автоматическая генерация пароля при создании пользователя в AD
     * @param int $workerId
     * @return string
     */
    public static function createPasswordAd($workerId)
    {
        $worker = Worker::find($workerId);
        
        $workerNameArray = explode(' ', $worker->name);
        
        if (count($workerNameArray) < 3) { 
            return 'Неповне ПІБ';
        }
        
        $password = '';
        
        foreach ($workerNameArray as $workerNameItem) {
            $password .= mb_substr($workerNameItem, 0, 1);
        }
        
        $password .= '-0159';
        
        $password = mb_strtolower($password);
        
        $password = mb_strtoupper(mb_substr($password, 0, 1)) . mb_substr($password, 1);
        
        $englishPassword = self::convertPasswordToEnglish($password);
        
        return $englishPassword;
    }
    
    private static function convertPasswordToEnglish($password)
    {
        $converter = [
            "а" => "f",             "б" => ",",             "в" => "d", 
            "г" => "u",             "ґ" => "u",             "д" => "l", 
            "е" => "t",             "є" => "'",             "ё" => "`", 
            "ж" => ";",             "з" => "p",             "и" => "b", 
            "і" => "s",             "ї" => "]",             "й" => "q", 
            "к" => "r",             "л" => "k",             "м" => "v", 
            "н" => "y",             "о" => "j",             "п" => "g", 
            "р" => "h",             "с" => "c",             "т" => "n", 
            "у" => "e",             "ф" => "a",             "х" => "[", 
            "ц" => "w",             "ч" => "x",             "ш" => "i", 
            "щ" => "o",             "ъ" => "",              "ы" => "s", 
            "ь" => "m",             "э" => "'",             "ю" => ".", 
            "я" => "z",             "і" => "s",             "ї" => "]", 
            "А" => "F",             "Б" => "<",             "В" => "D", 
            "Г" => "U",                                     "Д" => "L", 
            "Е" => "T",             "Ё" => "",              "Ж" => ":", 
            "З" => "P",             "И" => "B",             "Й" => "Q", 
            "К" => "R",             "Л" => "K",             "М" => "V", 
            "Н" => "Y",             "О" => "J",             "П" => "G", 
            "Р" => "H",             "С" => "C",             "Т" => "N", 
            "У" => "E",             "Ф" => "A",             "Х" => "{", 
            "Ц" => "W",             "Ч" => "X",             "Ш" => "I", 
            "Щ" => "O",             "Ъ" => "",              "Ы" => "S", 
            "Ь" => "M",             "Э" => "'",             "Ю" => ">", 
            "Я" => "Z",             "’" => "",              "І" => "S", 
            "Ї" => "}",             "Є" => '"',             "'" => "", 
            " " => " ",             "." => "."
        ];
        
        $englishPassword = strtr($password, $converter);
        
        return $englishPassword;
    }
    
    /**
     * Получить ФИО работника по его ид
     * @param int $workerId
     * @return string
     */
    
    public static function getTranslitWorkerNameById($workerId)
    {
        $worker = self::find($workerId);
        
        $translitWorkerName = self::getTranslit($worker->name);
        
        return $translitWorkerName;
    }
    
    /**
     * Получить фамилию сотрудника по id
     * @param type $workerId
     * @return type
     */
    public static function getWorkerLastNameById($workerId)
    {
        $workerName = self::getTranslitWorkerNameById($workerId);
        
        $workerNameArray = explode(' ', $workerName);
        
        if(count($workerNameArray) > 1) {
            
            return $workerNameArray[0];
        }
    }
    
    public static function getNamePcByWorkerId($workerId)
    {
        $workerLastName = self::getWorkerLastNameById($workerId);
        
        $workerLastNameUpper = mb_strtoupper($workerLastName);
        
        $locationPfefix = self::getWorkerLocationPrefix($workerId);
        
        $pcName = $locationPfefix . $workerLastNameUpper;
        
        return $pcName;
    }
    
    /**
     * Получить префикс для организации, в которой размещен работник, по его ид
     * @param int $workerId
     * @return string
     */
    public static function getWorkerLocationPrefix($workerId)
    {
        
        $worker = self::select('location_id')->where('workers.id', $workerId)
                ->leftJoin('positions', 'positions.id', '=', 'workers.position_id')
                ->first();
        
        $workerLocationId = $worker->location_id;
        
        $organizationPrefix = Organization::getOrganizationPrefixById($workerLocationId);
        
        return $organizationPrefix;
    }
    
    public static function getScriptAddAdByLocation($workerId)
    {
        $worker = self::select('location_id')->where('workers.id', $workerId)
                ->leftJoin('positions', 'positions.id', '=', 'workers.position_id')
                ->first();
        
        $workerLocationId = $worker->location_id;
        
        $organizationAddAd = Organization::getScriptAddAdById($workerLocationId);
        
        return $organizationAddAd;
    }
}
