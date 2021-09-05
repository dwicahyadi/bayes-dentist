<?php

namespace App\Services;

use App\Models\Disease;

class NaiveBayesService
{
    public static function predict(array $symptom_ids)
    {
        $data = [];
        $classes = Disease::with(['symptoms'=>function($q) use ($symptom_ids) {
            return $q->whereIn('symptom_id', $symptom_ids);
        }])
            ->whereHas('symptoms', function($q) use ($symptom_ids) {
                return $q->whereIn('symptom_id', $symptom_ids);
            })
            ->get();
        $class_prior = [];

        foreach ($classes as $class) {
            if ($class->symptoms->count() < count($symptom_ids))
                continue;

            $class_prior[$class->id]['C'] = $class->name;
            $class_prior[$class->id]['P_c'] = $class->value;
            $class_prior[$class->id]['x'] = $class->symptoms->pluck('pivot.value','code');

            foreach ($class->symptoms as $symptom)
            {
                if(isset($class_prior[$class->id]['P_xc']))
                {
                    $class_prior[$class->id]['P_xc'] *= (float) $symptom->pivot->value;
                }else{
                    $class_prior[$class->id]['P_xc'] = (float) $symptom->pivot->value;
                }
            }

            if(isset($data['P_x']))
            {
                $data['P_x'] += (float) $class_prior[$class->id]['P_xc'];
            }else{
                $data['P_x'] = (float) $class_prior[$class->id]['P_xc'];
            }
        }

        if (!$class_prior)
            return $data;

        $temp_bayes = 0;
        foreach ($class_prior as $hypothesis => $result)
        {
            $bayes = $result['P_xc']*$result['P_c']/$data['P_x'];
            $class_prior[$hypothesis]['bayes_value'] = $bayes;

            if ($bayes > $temp_bayes){
                $temp_bayes = $bayes;
                $data['result'] = $hypothesis;
                $data['bayes_final_value'] = $bayes;
            }
        }
        $data['P_CX'] = $class_prior;

        return $data;
    }
}
