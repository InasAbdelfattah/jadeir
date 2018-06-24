<?php

$workDays = CompanyWorkDay::where('company_id',$company->id)->get();
        $days = $workDays->pluck('day')->toArray();
        $day = date('D', strtotime($request->order_date));

        if(!in_array($day, $days)){
            
           if($request->lang && $request->lang == 'ar'):
               $msg = 'هذا اليوم خارج نطاق ايام العمل';
            else:
                $msg = 'day out of work days';
            endif;
                
            return response()->json([
                'status' => false,
                'message' => $msg,
                'data' => $day
            ]);
        }

        $time_range = $workDays->where('day',$day)->first();

        if(!( $request->order_time >= $time_range->from && $request->order_time <= $time_range->to )){
            
            if($request->lang && $request->lang == 'ar'):
               $msg = 'الوقت خارج دوام العمل';
            else:
                $msg = 'time out of work day time';
            endif;

            return response()->json([
                'status' => false,
                'message' => $msg,
                'data' => $day
            ]);
        }
