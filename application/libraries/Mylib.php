<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mylib
{
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
    }

    public function restlogin($user, $pass)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://restsimak.stimiksepnop.ac.id/api/users/login",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\"Username\": \"$user\", \"Password\": \"$pass\"}",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json",
            ),
        ));
        $response = json_decode(curl_exec($curl));
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            if ($response->status) {
                // $response->data->role = $this->getrole($response->data->RoleUser->Role);
                $data = json_decode(json_encode($response->data), true);
                var_dump($data);
                // unset($data['RoleUser']);
                // return $data;
            } else {
                return $response;
            }

        }
    }

    public function restapi($url, $token)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://restsimak.stimiksepnop.ac.id/api/" . $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "content-type: application/json",
                "authorization: $token",
            ),
        ));
        $response = json_decode(curl_exec($curl));
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }

    public function getrole($data)
    {
        $roles = 'Admin';
        foreach ($data as $key => $value) {
            if ($value->Nama == "Mahasiswa") {
                $roles = 'Mahasiswa';
            }
        }
        return $roles;
    }

}

/* End of file LibraryName.php */
