<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['now'] = date("Y-m-d H:i:s");
		$url = base_url('data/products.json');
		$result = @file_get_contents($url);
		$data['sepatu'] = json_decode($result, true);
		$data['newproduct'] = $data['sepatu'];
		function date_compare($a, $b)
		{
			$t1 = strtotime($a['created_at']);
			$t2 = strtotime($b['created_at']);
			return $t2 - $t1;
		}
		usort($data['newproduct'], 'date_compare');
		$data['newproduct'] = array_slice($data['newproduct'], 0, 10);

		$data['bestseller'] = $data['sepatu'];
		function stock_compare($a, $b)
		{
			$t1 = $a['total_stock'];
			$t2 = $b['total_stock'];
			return $t1 - $t2;
		}
		usort($data['bestseller'], 'stock_compare');
		$data['bestseller'] = array_slice($data['bestseller'], 0, 10);

		$data['men'] = 0;
		$data['women'] = 0;
		$data['sneakers'] = 0;
		$data['sandals'] = 0;
		$data['kategori'] = array();
		$data['kategorifull'] = array();

		// print_r($data['sepatu'][0]['categories'][1]);
		// die;
		foreach ($data['sepatu'] as $key => $d) {
			if ($d['gender'] == 'male') {
				$data['men']++;
			} else if ($d['gender'] == 'female') {
				$data['women']++;
			}
			foreach ($d['categories'] as $k => $c) {
				if ($c == 'Sneakers') {
					$data['sneakers']++;
				} else if ($c == 'Sandals') {
					$data['sandals']++;
				}
				if (!in_array($c, $data['kategorifull'])) {
					$data['kategorifull'][] = $c;
				}
			}
		}
		foreach ($data['newproduct'] as $key => $d) {
			foreach ($d['categories'] as $k => $c) {
				if (!in_array($c, $data['kategori'])) {
					$data['kategori'][] = $c;
				}
			}
		}

		$this->load->view('template/header');
		$this->load->view('home', $data);
		$this->load->view('template/footer');
	}
}
