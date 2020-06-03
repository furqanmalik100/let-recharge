<?php
  
namespace App\Traits;

trait ServicesAPI 
{
	private $headers;

	protected $host;
	protected $body;
	protected $statusCode;
	protected $status;

	public function __construct()
	{
		$this->host = 'https://gs-api.dtone.com/v1.1';

		$key = '080a9b5c-3a71-406f-bb6e-4aa414cff6ee';
		$secret = 'b7a993b3-5677-490e-9975-628baf25e6fe';
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
		curl_setopt($ch, CURLOPT_URL, "$this->host/$uri");
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

	public function countries()
	{
		if(session('countries'));
			return session('countries');

		$response = $this->call("countries", "get");
		$countries = $response->body->countries;
		session(['countries' => $countries]);
		return $countries;
	}

	public function services($country_id)
	{
		$response = $this->call("services?country_id=$country_id", "get");
		return $response->body->services;
	}

	public function operators($country_id, $service_id)
	{
		$response = $this->call("operators?country_id=$country_id&service_id=7", "get");
		return $response->body->operators;
	}

	public function products($operator_id)
	{
		$response = $this->call("operators/$operator_id/products", "get");
		return $response->body;
	}
}