<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Product extends CI_Controller
{
	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['now'] = date("Y-m-d H:i:s");
		$id = $_GET['id'];
		$url = base_url('data/products.json');
		$result = @file_get_contents($url);
		$data['sepatu'] = json_decode($result, true);
		$data['produk'] = array();
		$data['kategori'] = array();
		$data['warna']['name'] = array();
		$data['warna']['rgb'] = array();
		$data['size'] = array();
		$data['stok'] = array();
		foreach ($data['sepatu'] as $key => $d) {
			// foreach ($d['categories'] as $k => $c) {
			// 	if (!in_array($c, $data['kategori'])) {
			// 		$data['kategori'][] = $c;
			// 	}
			// }
			// foreach ($d['colors'] as $col => $co) {
			// 	if (!in_array($co['name'], $data['warna']['name'])) {
			// 		// $data['warna'][] = array('name' => $co['name'], 'rgb' => $co['rgb']);
			// 		$data['warna']['name'][] = $co['name'];
			// 		$data['warna']['rgb'][] = $co['rgb'];
			// 	}
			// }
			// foreach ($d['variants'] as $vari => $var) {
			// 	foreach ($var['sizes'] as $size => $siz) {
			// 		if (!in_array($siz['size'], $data['size'])) {
			// 			$data['size'][] = $siz['size'];
			// 		}
			// 	}
			// }
			if ($id  == $d['id']) {
				$data['produk'] = $d;
			}
		}

		foreach ($data['produk']['variants'] as $vari => $var) {

			foreach ($var['sizes'] as $size => $siz) {

				$data['stok'][] = array(
					'colorname' => $var['color']['name'],
					'colorrgb' => $var['color']['rgb'],
					'size' => $siz['size'],
					'stok' => $siz['stock']
				);


				if (!in_array($siz['size'], $data['size'])) {
					$data['size'][] = $siz['size'];
				}
			}
		}

		$data['produkjson'] = json_encode($data['stok']);
		// print_r($data['produkjson']);
		// die;
		sort($data['size']);

		// print_r($data['produk']);
		// die;

		$this->load->view('template/header');
		$this->load->view('product', $data);
		$this->load->view('template/footer');
	}
}
