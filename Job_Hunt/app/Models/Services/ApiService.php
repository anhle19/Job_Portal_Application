<?php

namespace App\Models\Services;

use App\Models\CompanyLocation;
use App\Models\JobLocation;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiService extends Model
{
    use HasFactory;

    public function location() {
        $client = new Client();
        $response = $client->get('https://provinces.open-api.vn/api/p/');

        // Xử lý dữ liệu trả về từ API và giả mã joson
        $data = json_decode($response->getBody(), true);

        // Lưu dữ liệu vào cơ sở dữ liệu
        foreach($data as $item) {
            JobLocation::create([
                'name' => $item['name']
            ]);
            CompanyLocation::create([
                'name' => $item['name']
            ]);
        }
    }
}
