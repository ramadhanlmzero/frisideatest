<?php

namespace App\Services;

use App\Models\School;
use DB;

class SchoolService
{
    public function index()
    {
        $result = School::get();

        return $result;
    }

    public function show($id)
    {
        $result = School::find($id);

        return $result;
    }

    public function store($data)
    {
        $result = School::create($data);

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

    public function getTracerStudy($id)
    {
        $result = DB::select(DB::raw('
            SELECT 
                ue.gpa AS "gpa",
                ue.nim AS "nim",
                ue.date_start AS "date_start",
                ue.date_end AS "date_end",
                ue.degree_id AS "degree_id",
                ue.school_id AS "school_id",
                ue.user_id AS "user_id",
                ue.major_id AS "major_id",
                s.name AS "school_name",
                s.phone AS "school_phone",
                s.email AS "school_email",
                s.fax AS "school_fax",
                s.address AS "school_address",
                s.website AS "school_website",
                s.logo AS "school_logo",
                s.postal_code AS "school_postal_code",
                s.about AS "school_about",
                s.mission AS "school_mission",
                s.vision AS "school_vision",
                uem.name AS "major_name",
                uem.translation AS "major_translation",
                ued.name AS "degree_name",
                ued.translation AS "degree_translation",
                uets.school_id AS "tracerstudy_school_id",
                uets.name AS "tracerstudy_name",
                uets.description AS "tracerstudy_description",
                uets.target_start AS "tracerstudy_target_start",
                uets.target_end AS "tracerstudy_target_end",
                uets.publication_start AS "tracerstudy_publication_start",
                uets.publication_end AS "tracerstudy_publication_end"
            FROM table_user_education AS ue
            JOIN table_school AS s ON s.id = ue.school_id
            JOIN table_user_education_major AS uem ON uem.id = ue.school_id
            JOIN table_user_education_degree AS ued ON ued.id = ue.degree_id
            JOIN table_user_tracer_study AS uets ON uets.school_id = s.id
            WHERE s.id = ' . $id .  '
        '));

        return $result;
    }
}