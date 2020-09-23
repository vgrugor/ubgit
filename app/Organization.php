<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Organization_type;

class Organization extends Model
{
    protected $fillable = ['name', 'type', 'address', 'prefix', 'add_ad', 'add_ad2', 'note'];
    
    public static function getOrganizationType($organizationId)
    {
        if ($organizationId == NULL) return '';
        
        $organization = self::find($organizationId);
        
        $organizationType = Organization_type::find($organization->type);
        
        return $organizationType->name;
    }
    
    public static function organizationTypeIsBu($organizationId)
    {
        $organizationType = self::getOrganizationType($organizationId);
        
        if ($organizationType == 'БУ') {
            return true;
        }
        return false;
    }
    
    public static function getOrganizationNameById($organizationId)
    {
        $organization = self::find($organizationId);
        
        return $organization->name;
    }
    
    public static function organizationTypeIsVbr($organizationId)
    {
        $organizationType = self::getOrganizationType($organizationId);
        
        if ($organizationType == 'ВБР') {
            return true;
        }
        return false;
    }
    
    public static function organizationTypeIsVttist($organizationId)
    {
        $organizationType = self::getOrganizationType($organizationId);
        
        if ($organizationType == 'ВТТіСТ') {
            return true;
        }
        return false;
    }
    
    /**
     * Получить префикс организации для имени ПК, по ее ид
     * @param type $organizationId
     * @return type
     */
    public static function getOrganizationPrefixById($organizationId)
    {
        $organization = Organization::find($organizationId);
        
        return $organization->prefix;
    }
    
    /**
     * Получить скрипты добавления ПК в домен для 2-ух пользователей по ид организации
     * @param int $organizationId
     * @return array
     */
    public static function getScriptAddAdById($organizationId)
    {
        $organization = Organization::find($organizationId);
        
        $add_ad['user1'] = $organization->add_ad;
        $add_ad['user2'] = $organization->add_ad2;
        
        return $add_ad;
    }
}
