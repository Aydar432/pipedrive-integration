<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PipedriveController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'job_type' => 'required|string',
            'job_source' => 'required|string',
            'job_description' => 'nullable|string',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'zip' => 'required|string|max:20',
            'area' => 'required|string',
            'date' => 'required|date',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
            'technician' => 'required|string',
        ]);

        $firstName = $request->input('first_name');
        $lastName = $request->input('last_name');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $jobType = $request->input('job_type');
        $jobSource = $request->input('job_source');
        $jobDescription = $request->input('job_description');
        $address = $request->input('address');
        $city = $request->input('city');
        $state = $request->input('state');
        $zip = $request->input('zip');
        $area = $request->input('area');
        $date = $request->input('date');
        $startTime = $request->input('start_time');
        $endTime = $request->input('end_time');
        $technician = $request->input('technician');

        $personPayload = [
            'name' => $firstName . ' ' . $lastName,
            'email' => $email,
            'phone' => $phone
        ];

        $personResponse = Http::post('https://api.pipedrive.com/v1/persons?api_token=' . env('PIPEDRIVE_API_TOKEN'), $personPayload);

        $personId = $personResponse['data']['id'];

        $dealPayload = [
            'title' => $firstName . ' ' . $lastName . ' - ' . $jobType,
            'person_id' => $personId
        ];

        $dealResponse = Http::post('https://api.pipedrive.com/v1/deals?api_token=' . env('PIPEDRIVE_API_TOKEN'), $dealPayload);

        $dealId = $dealResponse['data']['id'];

        $notePayload = [
            'content' => "Адрес: $address\nГород: $city\nОбласть: $state\nZIP: $zip\nЗона: $area\nДата: $date\nВремя: $startTime – $endTime\nИсточник: $jobSource\nОписание: $jobDescription\nТехник: $technician",
            'deal_id' => $dealId
        ];

        $noteResponse = Http::post('https://api.pipedrive.com/v1/notes?api_token=' . env('PIPEDRIVE_API_TOKEN'), $notePayload);

        if ($noteResponse->successful()) {
            return back()->with('success', 'Контакт, сделка и заметка успешно отправлены в Pipedrive!');
        } else {
            return back()->with('warning', 'Ошибка' . $noteResponse->body());
        }
    }
}
