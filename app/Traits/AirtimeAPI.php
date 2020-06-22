<?php
  
namespace App\Traits;
use Illuminate\Support\Facades\Http;
use App\Setting;

trait AirtimeAPI {

	protected $host;
	protected $body;
	protected $statusCode;
	protected $status;

	public function __construct()
	{
		session([
            'airtime_api_login' => Setting::pluck('airtime_api_login')->first(),
            'airtime_api_token' => Setting::pluck('airtime_api_token')->first(),
		]);

		$this->host = "https://airtime-api.dtone.com/cgi-bin/shop/topup";

		$login = session('airtime_api_login');
		$token = session('airtime_api_token');
		$nonce = time();
		$md5 = md5($login.$token.$nonce);

		$this->host .= "?login=$login&key=$nonce&token=$token&md5=$md5";
	}

	public function call($method, $params = [])
	{
		$ch = curl_init();
		if($method == 'get')
		{
		    $params = $this->renderParams($params);
		    curl_setopt($ch, CURLOPT_URL, "$this->host&$params");
		}
		else
		{
		    $params = explode('?', $this->host)[1] .'&'. $this->renderParams($params);
			curl_setopt($ch, CURLOPT_URL, "$this->host");
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,
            $params);
		}

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$output = curl_exec($ch);
		$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		#HANDLE API ERROR HERE LATER
		
		return (object)[
			'statusCode' => $status,
			'body' => $this->parseRawOutput($output),
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

	public function parseRawOutput($output)
	{
		$linesArray = array_filter(preg_split('/\R/', $output));

        $craftedArray = array();
        foreach($linesArray as $line) {
          $tempArray = explode("=", $line);
          $craftedArray[$tempArray[0]] = $tempArray[1];
        }

        return (object)$craftedArray;
	}

	public function ping()
	{
		return $this->call('get', [
			'action' => 'ping'
		]);
	}

	public function countries()
	{
		if(!empty(session('airtime_countries')))
			return session('airtime_countries');

		$response = $this->call('get', [
			'action' => 'pricelist',
			'info_type' => 'countries'
		]);

		$countries = explode(',', $response->body->country);
		$countryIds = explode(',', $response->body->countryid);

		$list = [];
		for($i=0;$i<sizeof($countries);$i++)
		{
			$list[] = (object)[
				'country_id' => $countryIds[$i],
				'country' => $countries[$i]
			];
		}

		session(['airtime_countries' => $list]);
		return $list;
	}

	public function getCountryName($country_id)
	{
		foreach (session('airtime_countries') as $c) {
			if($country_id == $c->country_id)
				return $c->country;
		}
	}

	public function operators($country_id)
	{
		$response = $this->call('get', [
			'action' => 'pricelist',
			'info_type' => 'country',
			'content' => $country_id
		]);

		$operators = explode(',', $response->body->operator);
		$operatorIds = explode(',', $response->body->operatorid);

		$list = [];
		for($i=0;$i<sizeof($operators);$i++)
		{
			$list[] = (object)[
				'operator_id' => $operatorIds[$i],
				'operator' => $operators[$i]
			];
		}
		
		return $list;
	}

	public function products($data)
	{
		$response = $this->call('post', $data);
		
		$data = $response->body;
		$products = explode(',', $response->body->product_list);
    	$retail_prices = explode(',', $response->body->retail_price_list);
    	$wholesale_prices = explode(',', $response->body->wholesale_price_list);

        return compact('data', 'products', 'retail_prices', 'wholesale_prices');
	}

	public function createAirtimeTransaction($data)
	{
		return $this->call('post', $data);
	}
}