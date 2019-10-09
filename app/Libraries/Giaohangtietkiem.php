<?php
namespace App\Library;
use Illuminate\Support\Facades\Cache;

use App\District as District;
use App\Province as Province;

class Giaohangtietkiem
{
	public static function calculateServiceFee($data) {
        $return = ['message' => '', 'success' => false];
		$ch = curl_init();
		curl_setopt_array($ch, array(
		    CURLOPT_URL => env('GHTK_URL') . "services/shipment/fee?" . http_build_query($data),
		    CURLOPT_RETURNTRANSFER => true,
		    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		    CURLOPT_HTTPHEADER => array(
		        "Token: " . env('GHTK_TOKEN'),
		    ),
		));

        $tmp = json_decode(curl_exec($ch), 1);

        if (curl_getinfo($ch, CURLINFO_HTTP_CODE) <> 200) {
            $return['message'] = json_encode($tmp);
            return $return;
        }

        if (!$tmp['success']) {
            $return['message'] = $tmp['message'];
            return $return;
        }

        if (!$tmp['fee']['delivery']) {
            $return['message'] = "Giao hàng Tiết kiệm chưa hỗ trợ địa chỉ này.";
            return $return;
        }

        $return['success'] = true;
        $return['message'] = $tmp['fee'];

        return $return;
    }

    public static function createShippingOrder($data) {
        $return = ['message' => '', 'success' => false];
        $ch = curl_init(env('GHTK_URL') . 'services/shipment/order');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                "Token: " . env('GHTK_TOKEN'),
                'Content-Length: ' . strlen($data)
        ));

        $tmp = json_decode(curl_exec($ch), 1);

        if (curl_getinfo($ch, CURLINFO_HTTP_CODE) <> 200) {
            $return['message'] = json_encode($tmp);
        }

        if (!$tmp['success']) {
            $return['message'] = $tmp['message'];
            return $return;
        }

        $return['success'] = true;
        $return['message'] = $tmp['order'];

        return $return;
    }

    public static function getDistrictProvinceData() {
        $return = ['message' => '', 'success' => false];
        // Cache::forget('districts_provinces');
        if (!Cache::has('districts_provinces')) {
            // get from database
            $provinces = Province::get()->toArray();
            if (count($provinces)) {
                for ($i=0; $i < count($provinces); $i++) {
                    $provinces[$i]['districts'] = District::where('province_id', $provinces[$i]['id'])->orderBy('name')->get()->toArray();
                }
                $return['message'] = $provinces;
                $return['success'] = true;
                Cache::put('districts_provinces', json_encode($return['message']), \App\Define\Constant::TTL);
                return $return;
            }

            // get from GHTK
            $return = ['message' => '', 'success' => false];
            $ch = curl_init();
            curl_setopt_array($ch, array(
                CURLOPT_URL => env('GHTK_LOCATION_URL'),
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1
            ));

            $tmp = json_decode(curl_exec($ch), 1);

            if (curl_getinfo($ch, CURLINFO_HTTP_CODE) <> 200) {
                $return['message'] = json_encode($tmp);
                return $return;
            }
            // store to db
            foreach ($tmp as $t) {
                $province = Province::where('code', $t['id'])->first();
                if (is_null($province)) {
                    $province = Province::create(['name' => $t['name'], 'code' => $t['id']]);
                }
                // district
                $ch = curl_init();
                curl_setopt_array($ch, array(
                    CURLOPT_URL => env('GHTK_LOCATION_URL') . '?parentId=' . $t['id'],
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1
                ));

                $districts = json_decode(curl_exec($ch), 1);
                if (curl_getinfo($ch, CURLINFO_HTTP_CODE) <> 200) {
                    $return['message'] = "Loi khi thanh Quan/huyen cua: " . $t['name'];
                    return $return;
                }

                foreach ($districts as $d) {
                    $district = District::where('code', $d['id'])->first();
                    if (is_null($district)) {
                        District::create(['name' => $d['name'], 'code' => $d['id'], 'province_id' => $province->id]);
                    }
                }
            }
            // catch it get from database
            $provinces = Province::get()->toArray();

            for ($i=0; $i < count($provinces); $i++) {
                $provinces[$i]['districts'] = District::where('province_id', $provinces[$i]['id'])->get()->toArray();
            }
            $return['message'] = $provinces;

            Cache::put('districts_provinces', json_encode($return['message']), \App\Define\Constant::TTL);
            $return['success'] = true;
        } else {
            $districtProvinces = Cache::get('districts_provinces');
            $return['success'] = true;
            $return['message'] = json_decode($districtProvinces, 1);

        }

        return $return;
    }

    public static function getDistrictByProvince($provinceId) {
        $return = self::getDistrictProvinceData();
        if (!$return['success'])
            return $return;

        foreach ($return['message'] as $province) {
            if ($province['id'] == $provinceId) {
                $return['message'] = $province['districts'];
                break;
            }
        }

        return $return;
    }

    public static function getProvince() {
        $provinces = [];
        $return = self::getDistrictProvinceData();
        if (!$return['success'])
            return $return;

        foreach ($return['message'] as $province) {
            $provinces[$province['id']] = $province['name'];
        }
        krsort($provinces);
        $return['message'] = $provinces;

        return $return;
    }

    public static function getActiveProvince() {
        $provinces = [];
        $return = self::getDistrictProvinceData();
        if (!$return['success'])
            return $return;

        foreach ($return['message'] as $province) {
            if ($province['status'])
                $provinces[$province['id']] = $province['name'];
        }
        krsort($provinces);
        $return['message'] = $provinces;

        return $return;
    }

    public static function getActiveDistrictByProvince($provinceId) {
        $return = self::getDistrictProvinceData();
        if (!$return['success'])
            return $return;

        foreach ($return['message'] as $province) {
            if ($province['id'] == $provinceId) {
                $return['message'] = $province['districts'];
                break;
            }
        }

        $districts = [];
        foreach ($return['message'] as $tmp) {
            if ($tmp['status']) {
                $districts[$tmp['id']] = $tmp['name'];
            }
        }
        $return['success'] = 1;
        $return['message'] = $districts;
        return $return;
    }

    public static function getArrayDistrictByProvince($provinceId) {
        $return = self::getDistrictProvinceData();
        if (!$return['success'])
            return $return;

        foreach ($return['message'] as $province) {
            if ($province['id'] == $provinceId) {
                $return['message'] = $province['districts'];
                break;
            }
        }

        $districts = [];
        foreach ($return['message'] as $tmp) {
            $districts[$tmp['id']] = $tmp['name'];
        }
        $return['success'] = 1;
        $return['message'] = $districts;
        return $return;
    }
}
?>