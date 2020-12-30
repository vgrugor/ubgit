<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Actual_stage;

class AdminActualStageController extends Controller
{
    //--------------------СПИСОК АКТУАЛЬНЫХ СТАДИЙ БУРЕНИЯ----------------------

    public function actualStagesList()
    {
        $actualStages = Actual_stage::getCompleteInformationAboutActualStages();

        return view('admin.actual_stage.list')
            ->with(['actualStagesList' => $actualStages]);
    }

    //--------------------------------------------------------------------------
}
