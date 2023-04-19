<?php

namespace App\Services;

use App\Models\UserTracerStudy;

class TracerStudyService 
{
    public function index()
    {
        $result = UserTracerStudy::get();

        return $result;
    }

    public function show($id)
    {
        $result = UserTracerStudy::find($id);

        return $result;
    }

    public function store($data)
    {
        $result = UserTracerStudy::create($data);

        return $result;
    }

    public function update($id, $data)
    {
        $result = $this->show($id);

        if ($result) {
            $result->update($data);
        }
        else {
            $result = false;
        }

        return $result;
    }

    public function delete($id)
    {
        $result = $this->show($id);

        if ($result) {
            $result = $result->delete();
        } 
        else {
            $result = false;
        }

        return $result;
    }
}