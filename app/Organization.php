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
}
