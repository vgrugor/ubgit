<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Organization_type;

class Organization extends Model
{
    protected $fillable = ['name', 'type', 'address', 'note'];
    
    public static function getOrganizationType($organizationId)
    {
        if ($organizationId == NULL) return '';
        
        $organization = self::find($organizationId);
        
        $organizationType = Organization_type::find($organization->type);
        
        return $organizationType->name;
    }
}
