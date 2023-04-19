<?php

namespace App\Http\Controllers;

use App\Http\Requests\TracerStudyRequest;
use App\Services\TracerStudyService;
use App\Traits\ApiResponser;

class TracerStudyController extends Controller
{
    /**
     * I'm using Custom Trait to standarize API response
     */
    use ApiResponser;

    protected $tracerStudyService;

    /**
     * I'm using Service Pattern to centralize code
     */
    public function __construct(TracerStudyService $tracerStudyService)
    {
        $this->tracerStudyService = $tracerStudyService;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TracerStudyRequest $request)
    {
        $data = $request->validated();

        $result = $this->tracerStudyService->store($data);

        return $this->successResponse($result, "Data berhasil disimpan!");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TracerStudyRequest $request, $id)
    {
        $data = $request->validated();

        $result = $this->tracerStudyService->update($id, $data);

        if ($result) {
            return $this->successResponse($result, "Data berhasil diubah!");
        }
        else {
            return $this->errorResponse("Data tidak ditemukan!");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $result = $this->tracerStudyService->delete($id);

        if ($result) {
            return $this->successResponse($result, "Data berhasil dihapus!");
        }
        else {
            return $this->errorResponse("Data tidak ditemukan!");
        }
    }
}
