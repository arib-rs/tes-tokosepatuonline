<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Catalog extends CI_Controller
{
	public function index()
	{
		date_default_timezone_set('Asia/Jakarta');
		$data['now'] = date("Y-m-d H:i:s");
		$data['fgender'] = isset($_GET['gender']) ? $_GET['gender'] : array();
		$data['fkategori'] = isset($_GET['category']) ? $_GET['category'] : array();
		$data['fsize'] = isset($_GET['size']) ? $_GET['size'] : array();
		$data['fwarna'] = isset($_GET['color']) ? $_GET['color'] : array();
		$data['fmin'] = isset($_GET['min']) ? $_GET['min'] : 0;
		$data['fmax'] = isset($_GET['max']) ? $_GET['max'] : 10000000;
		$data['keyword'] = '';
		$data['arrkeyword'] = '';
		if (isset($_GET['keyword'])) {
			$data['keyword'] = $_GET['keyword'];
			$data['arrkeyword'] = explode(' ', strtolower($_GET['keyword']));
		}
		// print_r($data['keyword']);
		// print_r($data['arrkeyword']);die;

		$url = base_url('data/products.json');
		$result = @file_get_contents($url);
		$data['sepatu'] = json_decode($result, true);

		$data['sepatubytgl'] = $data['sepatu'];
		function date_compare($a, $b)
		{
			$t1 = strtotime($a['created_at']);
			$t2 = strtotime($b['created_at']);
			return $t2 - $t1;
		}
		usort($data['sepatubytgl'], 'date_compare');

		$data['kategori'] = array();
		$data['warna']['name'] = array();
		$data['warna']['rgb'] = array();
		$data['size'] = array();
		foreach ($data['sepatu'] as $key => $d) {
			foreach ($d['categories'] as $k => $c) {
				if (!in_array($c, $data['kategori'])) {
					$data['kategori'][] = $c;
				}
			}
			foreach ($d['colors'] as $col => $co) {
				if (!in_array($co['name'], $data['warna']['name'])) {
					// $data['warna'][] = array('name' => $co['name'], 'rgb' => $co['rgb']);
					$data['warna']['name'][] = $co['name'];
					$data['warna']['rgb'][] = $co['rgb'];
				}
			}
			foreach ($d['variants'] as $vari => $var) {
				foreach ($var['sizes'] as $size => $siz) {
					if (!in_array($siz['size'], $data['size'])) {
						$data['size'][] = $siz['size'];
					}
				}
			}
		}
		sort($data['size']);
		// print_r($data['size']);
		// die;

		// $data['fkategori'] = isset($_GET['category']) ? $_GET['category'] : $data['kategori'];
		// $data['fgender'] = isset($_GET['gender']) ? $_GET['gender'] : array('male', 'female');
		// $data['fsize'] = isset($_GET['size']) ? $_GET['size'] : $data['size'];
		// $data['fwarna'] = isset($_GET['color']) ? $_GET['color'] : $data['warna']['name'];
		// $data['fmin'] = isset($_GET['min']) ? $_GET['min'] : 0;
		// $data['fmax'] = isset($_GET['max']) ? $_GET['max'] : 10000000;



		$this->load->view('template/header');
		$this->load->view('catalog', $data);
		$this->load->view('template/footer');
	}
}
