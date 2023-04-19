<?php

namespace App\Http\Controllers;

use App\Http\Resources\School\TracerStudyResource;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Services\SchoolService;

class SchoolController extends Controller
{
    /**
     * I'm using Custom Trait to standarize API response
     */
    use ApiResponser;

    protected $schoolService;

    /**
     * I'm using Service Pattern to centralize code
     */
    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }

    public function getTracerStudy($id)
    {
        $result = TracerStudyResource::collection(
            $this->schoolService->getTracerStudy($id)
        );

        return $this->successResponse($result, 'Berhasil mendapatkan data!');
    }
}
