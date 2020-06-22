<?php
  
namespace App\Traits;
use App\Setting;
trait ServicesAPI 
{
	private $headers;

	protected $host;
	protected $body;
	protected $statusCode;
	protected $status;

	public function __construct()
	{
		session([
            'services_api_key' => Setting::pluck('services_api_public_key')->first(),
            'services_api_secret' => Setting::pluck('services_api_secret_key')->first(),
		]);
		$this->host = 'https://gs-api.dtone.com/v1.1';

		$key = session('services_api_key');
		$secret = session('services_api_secret');
		$nonce = gettimeofday(true);
		$hmac = base64_encode(hash_hmac('sha256', $key.$nonce, $secret, true ));

		$this->headers = array(
			"X-TransferTo-apikey: $key",
			"X-TransferTo-nonce: $nonce",
			"X-TransferTo-hmac: $hmac",
		);
	}

	public function call($uri, $method, $params = [])
	{
		$ch = curl_init();	
		
		if($method == 'get')
		{
			curl_setopt($ch, CURLOPT_URL, "$this->host/$uri");
		}
		else
		{
			$params = $this->renderParams($params);
			curl_setopt($ch, CURLOPT_URL, "$this->host/$uri");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,
            $params);
		}

		curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec($ch);
		$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		#HANDLE API ERROR HERE LATER

		return (object)[
			'statusCode' => $status,
			'body' => json_decode($output),
			'status' => $status == 200
		];
	}

	public function renderParams($params)
	{
		$result = '';
		foreach ($params as $key => $value)
			$result .= $key . '=' . $value . '&';

		return rtrim($result, '&');
	}

	public function serviceEnabled($country_id)
	{
		return $this->getCountryName($country_id) != '';
	}

	public function getCountryName($country_id)
	{
		foreach (session('countries') as $c) {
			if($country_id == $c->country_id)
				return $c->country;
		}
		return '';
	}

	public function countries()
	{
		if(session('countries'))
			return session('countries');

		$response = $this->call("countries", "get");
		$countries = $response->body->countries;
		session(['countries' => $countries]);
		return $countries;
	}

	public function services($country_id)
	{
		$response = $this->call("services?country_id=$country_id", "get");
// 		dd($response);
		return $response->body->services;
	}

	public function operators($country_id, $service_id)
	{
		$response = $this->call("operators?service_id=7&country_id=$country_id", "get");
		return $response->body->operators;
	}

	public function products($operator_id)
	{
		$response = $this->call("operators/$operator_id/products", "get");
		return $response->body->fixed_value_recharges;
	}

	public function createFixedValueTransaction($data)
	{
		$response = $this->call('transactions/fixed_value_recharges', 'post', $data);
		return $response;
	}
}